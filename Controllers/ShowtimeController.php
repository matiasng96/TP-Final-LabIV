<?php
namespace Controllers;

use DAO\ShowtimePDO as ShowtimeDAO;
use Models\Showtime as Showtime;

class ShowtimeController{

    private $showtimeDAO;



    public function __construct()
    {
        $this->showtimeDAO = new ShowtimeDAO();
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