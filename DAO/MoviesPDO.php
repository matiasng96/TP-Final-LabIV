<?php

namespace DAO;

use DAO\GenresPDO as GenresDAO;
use Models\Genre as Genre;

use DAO\IMoviesDAO as IMoviesDAO;
use Models\Movie as Movie;

use \PDOException as Exception;


class MoviesPDO implements IMoviesDAO
{
    private $moviesList = array();
    private $connection;
    private $tableMovies = "movies";
    private $tableGxM = "genresXmovies";
    private $tableGenres = "genres";
    private $genresDAO;

    public function __construct()
    {
        $this->genresDAO = new GenresDAO;
    }


    public function Add(Movie $movie)
    {
        try {
            $query = "INSERT INTO " . $this->tableMovies . "(Id_movie, Poster_path, Runtime, Original_language, Title) 
                                                      VALUE (:Id_movie, :Poster_path, :Runtime, :Original_language, :Title);";

            $parameters["Id_movie"] = $movie->getId();
            $parameters["Poster_path"] = $movie->getPoster_path();
            $parameters["Runtime"] = $movie->getRuntime();
            $parameters["Original_language"] = $movie->getLanguage();
            $parameters["Title"] = $movie->getTitle();

            $this->connection = Connection::GetInstance();

            $this->connection->ExecuteNonQuery($query, $parameters);
        } catch (Exception $ex) {

            throw $ex;
        }
    }

    public function AddGenresXmovie($IdMovie, $IdGenre)
    {
        try {
            $query = "INSERT INTO " . $this->tableGxM . "(Id_movie, Id_genre) 
                                                      VALUE (:Id_movie, :Id_genre);";

            $parameters["Id_movie"] = $IdMovie;
            $parameters["Id_genre"] = $IdGenre;

            $this->connection = Connection::GetInstance();

            $this->connection->ExecuteNonQuery($query, $parameters);
        } catch (Exception $ex) {

            throw $ex;
        }
    }

    public function GetGenresXmovies($IdMovie)
    {

        try {

            $genresArray = array();

            $query = "SELECT g.Id_genre, g.GenreName
            FROM " . " $this->tableMovies m " .

                "INNER JOIN " . " $this->tableGxM gXm " .
                "ON (m.Id_movie = gXm.Id_movie)" .

                "INNER JOIN " . " $this->tableGenres g " .
                "ON (g.Id_genre = gXm.Id_genre)

            WHERE(m.Id_movie = '$IdMovie');";

            $this->connection = Connection::GetInstance();

            $genresResults = $this->connection->Execute($query);

            foreach ($genresResults as $row) {
                $genre = new Genre();
                $genre->setId($row['Id_genre']);
                $genre->setName($row['GenreName']);

                array_push($genresArray, $genre);
            }

            return $genresArray;
        } catch (Exception $ex) {

            throw $ex;
        }
    }

    public function FilterByGenre($genreName){

        try {
            $query = "SELECT *
            FROM " . " $this->tableMovies m " .

                "INNER JOIN " . " $this->tableGxM gXm " .
                "ON (m.Id_movie = gXm.Id_movie)" .

                "INNER JOIN " . " $this->tableGenres g " .
                "ON (g.Id_genre = gXm.Id_genre)

            WHERE(g.GenreName = '$genreName');";

            $this->connection = Connection::getInstance();
            $result = $this->connection->Execute($query);


            foreach ($result as $value) {
                $movie = new Movie();
                $movie->setId($value["Id_movie"]);
                $movie->setPoster_path($value["Poster_path"]);
                $movie->setRuntime($value["Runtime"]);
                $movie->setGenresArray($this->GetGenresXmovies($value["Id_movie"]));
                $movie->setLanguage($value["Original_language"]);
                $movie->setTitle($value["Title"]);

                array_push($this->moviesList, $movie);
            }

            return $this->moviesList;
            
        } catch (Exception $ex) {

            throw $ex;
        }



    }


    public function GetAll()
    {
        try {
            $query = "SELECT * FROM " . $this->tableMovies . ";";

            $this->connection = Connection::getInstance();
            $result = $this->connection->Execute($query);


            foreach ($result as $value) {
                $movie = new Movie();
                $movie->setId($value["Id_movie"]);
                $movie->setPoster_path($value["Poster_path"]);
                $movie->setRuntime($value["Runtime"]);
                $movie->setGenresArray($this->GetGenresXmovies($value["Id_movie"]));
                $movie->setLanguage($value["Original_language"]);
                $movie->setTitle($value["Title"]);

                array_push($this->moviesList, $movie);
            }

            return $this->moviesList;
        } catch (Exception $ex) {

            throw $ex;
        }
    }

    public function GetMoviesRuntimeFromAPI($movieID)  //Busca la duración(runtime) de la película y la retorna.
    {
        $url = str_replace("{movie_id}", $movieID, API_GET_DETAILS); //Se reemplaza {movie_id} con el ID de la película correspondiente de NowPlaying.
        $json = file_get_contents($url);
        $json_data = json_decode($json, true);

        return $json_data["runtime"];
    }

    public function GetNowPlayingAPI()
    {

        $url = API_PATH_NOW;
        $json = file_get_contents($url);
        $json_data = json_decode($json, true);

        return $json_data;
    }


    //Paso los datos de la API a un arreglo de objetos Movie, 
    //también llamo al método GetGenresIDsArray de GenresPDO para crear Objectos Genre y añadirlos como un arreglo de generos en el Objeto Movie
    public function APItoMoviesArray()
    {

        $nowPlayingArray = $this->GetNowPlayingAPI();
        $moviesArray = array();

        foreach ($nowPlayingArray["results"] as $data) {

            $movie = new Movie();
            $movie->setId($data['id']);
            $movie->setPoster_path($data['poster_path']);
            //A veces la duración está en 0 en la API, entonces asignamos por defecto 120 minutos.
            if ($this->GetMoviesRuntimeFromAPI($data['id']) > 0) {
                $movie->setRuntime($this->GetMoviesRuntimeFromAPI($data['id']));
            } else {
                $movie->setRuntime(120);
            }
            //El atributo name dentro del objeto Genre va a estar vacío, otro método se encargará de cargarlo.
            $movie->setGenresArray($this->genresDAO->GetGenresIDsArray($data['genre_ids']));
            $movie->setLanguage($data['original_language']);
            $movie->setTitle($data['title']);

            array_push($moviesArray, $movie);
        };

        return $moviesArray;
    }
}
