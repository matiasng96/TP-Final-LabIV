<?php

namespace Controllers;

//use DAO\MoviesDAO as MoviesDAO;
use DAO\MoviesPDO as MoviesDAO;


class MoviesController
{

    private $moviesDAO;

    public function __construct()
    {

        $this->moviesDAO = new MoviesDAO;
    }

    /*public function ShowListView()
    {

        $moviesList = $this->moviesDAO->APItoMoviesArray();
        $this->moviesDAO->SaveData($moviesList);
        require_once(VIEWS_PATH . "movies-list.php");
    }*/

    public function Add ()
    {
        $moviesArray =  $this->moviesDAO->APItoMoviesArray();
        foreach ($moviesArray as $movie){
            $this->moviesDAO->Add($movie);
        }
    }


    public function ShowListView()
    {
        $moviesList = $this->moviesDAO->GetAll();
        if(!$moviesList){
             $this->Add();
        }else {
            require_once(VIEWS_PATH. "movies-list.php");
        } 
    }

}
