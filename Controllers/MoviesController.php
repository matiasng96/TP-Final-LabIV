<?php

namespace Controllers;

//use DAO\MoviesDAO as MoviesDAO;
use DAO\MoviesPDO as MoviesDAO;
use DAO\GenresPDO as GenresDAO;
use Models\Genre as Genre;


class MoviesController
{
    private $moviesDAO;

    public function __construct()
    {

        $this->moviesDAO = new MoviesDAO;
    }


    public function Add()
    {
        $moviesArray =  $this->moviesDAO->APItoMoviesArray();
        foreach ($moviesArray as $movie) {
            $this->moviesDAO->Add($movie);
            foreach ($movie->getGenresArray() as $genre)
                $this->moviesDAO->AddGenresXmovie($movie->getId(), $genre->getId());
        }
    }

    public function ShowListByGenre($genre)
    {
        $moviesList = $this->moviesDAO->FilterByGenre($genre);

        require_once(VIEWS_PATH . "movies-list.php");
    }


    public function ShowListView()
    {
        $this->Add();
        $moviesList = $this->moviesDAO->GetAll();

        require_once(VIEWS_PATH . "movies-list.php");
    }
}
