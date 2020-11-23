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
                $genre = new Genre($row['Id_genre'], $row['GenreName']);

                array_push($genresArray, $genre);
            }

            return $genresArray;
        } catch (Exception $ex) {

            throw $ex;
        }
    }

    public function FilterByGenre($genreName)
    { //revisar

        try {
            $query = "SELECT m.*
            FROM " . " $this->tableMovies m " .

                "INNER JOIN " . " $this->tableGxM gXm " .
                "ON (m.Id_movie = gXm.Id_movie)" .

                "INNER JOIN " . " $this->tableGenres g " .
                "ON (g.Id_genre = gXm.Id_genre)
            WHERE(g.GenreName = '$genreName');";

            $this->connection = Connection::getInstance();
            $result = $this->connection->Execute($query);


            foreach ($result as $value) {
                $movie = new Movie(
                    $value["Id_movie"],
                    $value["Poster_path"],
                    $value["Runtime"],
                    $this->GetGenresXmovies($value["Id_movie"]),
                    $value["Original_language"],
                    $value["Title"]
                );

                array_push($this->moviesList, $movie);
            }

            return $this->moviesList;
        } catch (Exception $ex) {

            throw $ex;
        }
    }

    public function GetOne($movieTitle)
    {
        try {
            $query = "SELECT * FROM " . " $this->tableMovies m " . "WHERE(m.Title = '$movieTitle');";

            $this->connection = Connection::getInstance();
            $result = $this->connection->Execute($query);

            $movie = new Movie(
                $result["Id_movie"],
                $result["Poster_path"],
                $result["Runtime"],
                $this->GetGenresXmovies($result["Id_movie"]),
                $result["Original_language"],
                $result["Title"]
            );

            return $movie;

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
                $movie = new Movie(
                    $value["Id_movie"],
                    $value["Poster_path"],
                    $value["Runtime"],
                    $this->GetGenresXmovies($value["Id_movie"]),
                    $value["Original_language"],
                    $value["Title"]
                );

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

    //A veces la duración está en 0 en la API, entonces asignamos por defecto 120 minutos. Retorna el valor de Runtime de la API según el Movie ID.
    public function CheckAndGetRuntime($movieID)
    {
        if ($this->GetMoviesRuntimeFromAPI($movieID) > 0) {
            return $this->GetMoviesRuntimeFromAPI($movieID);
        } else {
            return 120; // En caso de no tener el dato en la API lo seteamos en 120 minutos.
        }
    }


    //Paso los datos de la API a un arreglo de objetos Movie, 
    //también llamo al método GetGenresIDsArray de GenresPDO para crear Objectos Genre y añadirlos como un arreglo de generos en el Objeto Movie
    public function APItoMoviesArray()
    {

        $nowPlayingArray = $this->GetNowPlayingAPI();
        $moviesArray = array();

        foreach ($nowPlayingArray["results"] as $data) {

            $movie = new Movie(
                $data['id'],
                $data['poster_path'],
                $this->CheckAndGetRuntime($data['id']),
                $this->genresDAO->GetGenresIDsArray($data['genre_ids']),
                $data['original_language'],
                $data['title']
            );

            array_push($moviesArray, $movie);
        };

        return $moviesArray;
    }
}
