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


    public function Add ()
    {
        $moviesArray =  $this->moviesDAO->APItoMoviesArray();
        foreach ($moviesArray as $movie){
            $this->moviesDAO->Add($movie);
        }
    }


    public function ShowListView()
    {
        //$this->Add();
        $moviesList = $this->moviesDAO->GetAll();

        require_once(VIEWS_PATH."movies-list.php");
    }

}
