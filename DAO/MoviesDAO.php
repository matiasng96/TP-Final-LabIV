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
    
        foreach($nowPlayingArray["results"] as $key=>$value){
         
            
            $movie = new Movie();
            $movie->setPoster_path($nowPlayingArray["results"][$key]['poster_path']);
            $movie->setId($nowPlayingArray["results"][$key]['id']);
            $movie->setGenre_ids($nowPlayingArray["results"][$key]['genre_ids']);
            $movie->setTitle($nowPlayingArray["results"][$key]['title']);
          
            array_push($moviesArray, $movie);
        };

    
        
        return $moviesArray;
    }


    public function SaveData($moviesList) // Toma un arreglo de objetos Movie y los guarda en formato JSON en Data/movies.json
    {
        $arrayToEncode = array();
        

        foreach ($moviesList as $movie) {

            $valuesArray["results"]["poster_path"] = $movie->getPoster_path();
            $valuesArray["results"]["id"] = $movie->getId();
            $valuesArray["results"]["genre_ids"] = $movie->getGenre_ids();
            $valuesArray["title"] = $movie->getTitle();
        
            array_push($arrayToEncode, $valuesArray);
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

            foreach ($arrayToDecode as $valuesArray) {
                //Results
                $movie = new Movie();
                $movie->setPoster_path($valuesArray["results"]["poster_path"]);
                $movie->setId($valuesArray["results"]["id"]);
                $movie->setGenre_ids($valuesArray["results"]["genre_ids"]);
                $movie->setTitle($valuesArray["title"]);
              
                array_push($this->moviesList, $movie);
            }
        }
    }
}
