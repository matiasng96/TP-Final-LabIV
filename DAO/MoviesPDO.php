<?php

namespace DAO;

use DAO\IMoviesDAO as IMoviesDAO;
use Models\Movie as Movie;
use \Exception as Exception;

class MoviesPDO implements IMoviesDAO
{
    private $moviesList = array();
    private $connection;
    private $tableName = "movies";

    public function Add(Movie $movie)
    {
        try {
            $sql = "INSERT INTO " . $this->tableName . "(Id_movie, Poster_path, Runtime, Original_language, Title) 
                                                      VALUE (:Id_movie, :Poster_path, :Runtime, :Original_language, :Title);";

            $parameters["Id_movie"] = $movie->getId();
            $parameters["Poster_path"] = $movie->getPoster_path();
            $parameters["Runtime"] = $movie->getRuntime();
            $parameters["Original_language"] = $movie->getLanguage();
            $parameters["Title"] = $movie->getTitle();

            $this->connection = Connection::GetInstance();

            $this->connection->ExecuteNonQuery($sql, $parameters);

        } catch (Exception $ex) {

            throw $ex;
        }
    }


    public function GetAll()
    {
        try {
            $sql = "SELECT * FROM " . $this->tableName . ";";

            $this->connection = Connection::getInstance();
            $result = $this->connection->Execute($sql);


            foreach ($result as $value) {
                $movie = new Movie();
                $movie->setId($value["Id_movie"]);
                $movie->setPoster_path($value["Poster_path"]);
                $movie->setRuntime($value["Runtime"]);
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
            $movie->setLanguage($data['original_language']);
            $movie->setTitle($data['title']);

            array_push($moviesArray, $movie);
        };

        return $moviesArray;
    }
}
