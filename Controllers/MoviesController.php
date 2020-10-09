<?php 
     namespace Controllers;

    use DAO\MoviesDAO;
    use Models\Movie;

    class MoviesController{

        private $moviesDAO;

        public function __construct(){

            $this->moviesDAO = new MoviesDAO;
        }

        public function ShowListView(){

            $moviesList = $this->moviesDAO->APItoMoviesArray();
            $this->moviesDAO->SaveData($moviesList);    
            require_once(VIEWS_PATH."movies-list.php");
        }
    }
?>