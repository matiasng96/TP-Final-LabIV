<?php
    namespace Controllers;

    class HomeController
    {
        public function Index($message = "")
        {
            require_once(VIEWS_PATH."add-cinema.php");
           //require_once(VIEWS_PATH."buyTickets.php");
           
           //require_once(VIEWS_PATH."cinemas-list.php");
           //require_once(VIEWS_PATH."rooms-list.php");
        }        
    }
?>