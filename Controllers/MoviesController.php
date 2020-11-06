<?php

namespace Controllers;

//use DAO\MoviesDAO as MoviesDAO;
use DAO\MoviesPDO as MoviesDAO;
use DAO\GenresPDO as GenresDAO;


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
            foreach($movie->getGenres_ids() as $IdGenre){
                $this->moviesDAO->AddGenresXmovie($movie->getId(),$IdGenre);
            }
        }
    }


    public function ShowListView()
    {
        $this->Add();
        $moviesList = $this->moviesDAO->GetAll();

        require_once(VIEWS_PATH."movies-list.php");
    }

}
