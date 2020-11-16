<?php
namespace Controllers;

use Models\Showing as Showing;
use DAO\ShowingPDO as ShowingDAO;

class ShowingController{

    private $showingDAO;



    public function __construct()
    {
        $this->moviesDAO = new ShowingDAO;
    }


    public function Add($date, $time, $Id_room, $Id_movie){
        
        $showing = new Showing(" ", " ", $date, $time);
        $this->showingDAO->Add($showing,$Id_room,$Id_movie);
        
    }

}





?>