<?php
    namespace Controllers;

use Exception;

class HomeController
    {
        public function Index($message = "")
        {
            $moviesController = new MoviesController();
            $moviesController->ShowListView();          
        }        
    }
?>