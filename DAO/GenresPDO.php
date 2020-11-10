<?php

namespace DAO;

use Models\Genre as Genre;
use \PDOException as Exception;

class GenresPDO
{

    //Hay que traer los Géneros de la API, en la clase Movies hay un arreglo de géneros que tiene las IDS de cada uno. Entonces para poder usarlos
    //hay que traerlos de la API y cargarlos en la Base de Datos. Osea que tendriamos la tabla de generos con su nombre y ID para despues relacionarlos
    // con la tabla de peliculas.

    private $connection;
    private $tableName = "genres";
    

    

    public function GetGenresAPI()
    {

        $url = API_PATH_GENRES;
        $json = file_get_contents($url);
        $json_data = json_decode($json, true);

        return $json_data;
    }


    //Esta función retorna un array de objectos Genre, recibe los IDS del request NOW PLAYING de la API, sirve para implementarse en el MoviesPDO
    public function GetGenresIDsArray($genresIDS)
    {
        $genresArray = array();

        foreach ($genresIDS as $ID) {

            $genre = new Genre($ID);
            array_push($genresArray, $genre);
        }

        return $genresArray;
    }

    public function GetGenresByMovie()
    {
        try {

            $genresList = array();

            $query = "SELECT * FROM " . $this->tableName;

            $this->connection = Connection::GetInstance();

            $genresResults = $this->connection->Execute($query);

            foreach ($genresResults as $row) {
                
                $genre = new Genre($row['Id_genre'], $row['GenreName']);
             
                array_push($genresList, $genre);
            }

            return $genresList;

        } catch (Exception $ex) {

            throw $ex;
        }
    }

    public function APItoGenresArray()
    {

        $genresAPIArray = $this->GetGenresAPI();
        $genresArray = array();

        foreach ($genresAPIArray['genres'] as $data) {

            $genre = new Genre($data['id'], $data['name']);
            
            array_push($genresArray, $genre);
        };

        return $genresArray;
    }

    public function Add(Genre $genre)
    {
        try {
            $query = "INSERT INTO " . $this->tableName . " (Id_genre, GenreName) VALUES (:Id_genre, :GenreName);";

            $parameters["Id_genre"] = $genre->getId();
            $parameters["GenreName"] = $genre->getName();


            $this->connection = Connection::GetInstance();

            $this->connection->ExecuteNonQuery($query, $parameters);
        } catch (Exception $ex) {
            throw $ex;
        }
    }
}
