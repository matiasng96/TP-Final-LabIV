<?php
namespace Controllers;

use DAO\ShowingPDO as ShowingDAO;
use Models\Showtime as Showtime;

class ShowingController{

    private $showtimeDAO;



    public function __construct()
    {
        $this->showtimeDAO = new ShowingDAO();
    }


    public function Add($date, $time, $Id_room, $Id_movie){
        
        $showing = new Showtime(" ", " ", $date, $time);
        $this->showtimeDAO->Add($showing,$Id_room,$Id_movie);
        
    }


    public function ShowListShowtime()
    {
        $result=$this->showtimeDAO->getAll();
        require_once(VIEWS_PATH . "showtime-list.php");

    }

}





?>