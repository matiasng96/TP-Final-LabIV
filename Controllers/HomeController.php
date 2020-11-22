<?php
    namespace Controllers;

use Exception;

class HomeController
    {
        public function Index($message = "")
        {
<<<<<<< HEAD
            require_once(VIEWS_PATH."login.php");  
=======
            $moviesController = new MoviesController();
            $moviesController->ShowListView();     
>>>>>>> Alex
        }        
    }
?>