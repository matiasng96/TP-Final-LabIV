<?php
namespace Controllers;

use DAO\ShowtimePDO as ShowtimeDAO;
use Models\Showtime as Showtime;

class ShowingController{

    private $showtimeDAO;



    public function __construct()
    {
        $this->showtimeDAO = new ShowtimeDAO();
    }


    public function Add($date, $time, $Id_room, $Id_movie){
        
        $showtime = new Showtime(" ", " ", $date, $time);
        $this->showtimeDAO->Add($showtime,$Id_room,$Id_movie);
        
    }


    public function ShowListShowtime()
    {
        $result=$this->showtimeDAO->getAll();
        require_once(VIEWS_PATH . "showtime-list.php");

    }

}





?>