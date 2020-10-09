<?php 
     namespace Controllers;

use DAO\CinemasDAO;
use Models\Cinema;

class MoviesController
{
    private $cinemasDAO;

    public function __construct()
    {
        $this->cinemasDAO = new CinemasDAO;
    }

    public function ShowListView()
        {
            

          
         
            require_once(VIEWS_PATH."movies-list.php");
        }
}

?>