<?php

namespace DAO;

use DAO\IMoviesDAO as IMoviesDAO;
use Models\Movie as Movie;

class MoviesDAO implements IMoviesDAO
{
    private $moviesList = array();

    public function Add(Movie $movie)
    {

        $this->RetrieveData();

        array_push($this->moviesList, $movie);

        $this->SaveData($this->moviesList);
    }


    public function GetAll() // Retorna la lista de películas en un array de objetos Movie
    {

        $this->RetrieveData();

        return $this->moviesList;
    }

    public function GetNowPlayingAPI(){
        
        $url ="https://api.themoviedb.org/3/movie/now_playing?api_key=4041fc4595ac01692342a78793dba935&language=en-US&page=1";
        $json = file_get_contents($url);
        $json_data = json_decode($json,true);
        
        return $json_data;
    }

    

    public function APItoMoviesArray(){

        $nowPlayingArray = $this->GetNowPlayingAPI();
        $moviesArray = array();
    
        foreach($nowPlayingArray["results"] as $data){
         
            $movie = new Movie();
            $movie->setPoster_path($data['poster_path']);
            $movie->setId($data['id']);
            $movie->setGenre_ids($data['genre_ids']);
            $movie->setTitle($data['title']);
          
            array_push($moviesArray, $movie);
        };

    
        
        return $moviesArray;
    }


    public function SaveData($moviesList) // Toma un arreglo de objetos Movie y los guarda en formato JSON en Data/movies.json
    {
        $arrayToEncode = array();

      
        foreach ($moviesList as $movie) {

            $dataArray["results"]["poster_path"] = $movie->getPoster_path();
            $dataArray["results"]["id"] = $movie->getId();
            $dataArray["results"]["genre_ids"] = $movie->getGenre_ids();
            $dataArray["results"]["title"] = $movie->getTitle();
        
            array_push($arrayToEncode, $dataArray);
        }

        
        $jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);
        


        file_put_contents('Data/movies.json', $jsonContent);
    }

    

    public function RetrieveData()  //Pasa las películas del JSON a un arreglo de objetos Movie.
    {
        
        $this->moviesList = array();


        if (file_exists('Data/movies.json')) {
            $jsonContent = file_get_contents('Data/movies.json');

            $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

            foreach ($arrayToDecode["results"] as $valuesArray) {
                //Results
                $movie = new Movie();
                $movie->setPoster_path($valuesArray["poster_path"]);
                $movie->setId($valuesArray["id"]);
                $movie->setGenre_ids($valuesArray["genre_ids"]);
                $movie->setTitle($valuesArray["title"]);
              
                array_push($this->moviesList, $movie);
            }
        }
    }
}
