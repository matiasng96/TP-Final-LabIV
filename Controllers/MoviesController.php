<?php

namespace Controllers;

//use DAO\MoviesDAO as MoviesDAO;
use DAO\MoviesPDO as MoviesDAO;
use DAO\GenresPDO as GenresDAO;
use Controllers\GenresController as GenresController;
use PDOException as Exception;

class MoviesController
{
    private $moviesDAO;
    private $genresController;

    public function __construct()
    {
        $this->moviesDAO = new MoviesDAO;
        $this->genresController = new GenresController;
    }


    public function Add()
    {
        $this->genresController->SaveAllGenres();
        try {
            $moviesArray =  $this->moviesDAO->APItoMoviesArray();
            foreach ($moviesArray as $movie) {
                $this->moviesDAO->Add($movie);
                foreach ($movie->getGenresArray() as $genre) {
                    $this->moviesDAO->AddGenresXmovie($movie->getId(), $genre->getId());
                }
            }
        } catch (Exception $ex) {
            $error = $ex->getMessage();
        }

        $this->ShowListView();
    }

    public function ShowListByGenre($genre)
    {
        try {
            if ($genre == "All") {
                $moviesList = $this->moviesDAO->GetAll();
            } else {
                $moviesList = $this->moviesDAO->FilterByGenre($genre);
                if (empty($moviesList)) {
                    $ResultsNotFound = "Actualmente no hay películas de ese género disponibles.";
                }                
            }
            require_once(VIEWS_PATH . "movies-list.php");
        } catch (Exception $ex) {
            $error = $ex->getMessage();
        }        
    }


    public function ShowListView()
    {
        try {
            $moviesList = $this->moviesDAO->GetAll();
        } catch (Exception $ex) {

            echo $ex->getMessage();
        }

        require_once(VIEWS_PATH . "movies-list.php");
    }
}
?>