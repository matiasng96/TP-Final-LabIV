<?php
    namespace Controllers;

    class HomeController
    {
        public function Index($message = "")
        {
            //require_once(VIEWS_PATH."add-cinema.php");
           require_once(VIEWS_PATH."login.php");
        }        
    }
?>