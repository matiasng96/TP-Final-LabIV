<?php
namespace Controllers;

use DAO\ShowtimePDO as ShowtimeDAO;
use DAO\RoomsPDO as RoomsDAO;
use Models\Showtime as Showtime;

class ShowtimeController{

    private $showtimeDAO;
    private $roomsDAO;





    public function __construct()
    {
        $this->showtimeDAO = new ShowtimeDAO();
        $this->roomsDAO = new RoomsDAO();
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

    public function ShowAddView()
    {

        $rooms = $this->roomsDAO->getAll();
        require_once(VIEWS_PATH . "add-showtime.php");

    }





}





?>