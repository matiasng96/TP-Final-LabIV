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
    public function viewArray($value)
    {
        echo('<pre>');
        var_dump($value);
        echo('</pre>');
    }


    public function ShowListShowtime()
    {
        $result=$this->showtimeDAO->getAll();
        require_once(VIEWS_PATH . "showtime-list.php");

    }

    public function ShowAddView($idMovie)
    {
        var_dump($idMovie);
        echo($idMovie);
        //$this->viewArray($movie);
        $rooms = $this->roomsDAO->getAll();
        require_once(VIEWS_PATH . "add-showtime.php");

    }





}





?>