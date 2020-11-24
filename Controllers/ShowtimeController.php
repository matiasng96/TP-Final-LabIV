<?php
namespace Controllers;

use DAO\CinemasPDO as CinemasPDO;
use DAO\MoviesPDO as MoviesPDO;
use DAO\ShowtimePDO as ShowtimeDAO;
use DAO\RoomsPDO as RoomsDAO;

use Models\Showtime as Showtime;

class ShowtimeController{

    private $showtimeDAO;
    private $roomsDAO;
    private $movieDAO;
    private $cinemasPDO;

    public function __construct()
    {
        $this->showtimeDAO = new ShowtimeDAO();
        $this->roomsDAO = new RoomsDAO();
        $this->movieDAO= new MoviesPDO();
        $this->cinemasPDO = new CinemasPDO();
    }


    public function Add($Id_room,$date ,$time , $Id_movie){
        $datoRoom = $this->roomsDAO->getOneRoom($Id_room);
        $datoMovie= $this->movieDAO->GetOne($Id_movie);
        $showtime = new Showtime($datoRoom,$datoMovie , $date, $time);
        $showtime->setTickets($datoRoom->getCapacity());
        $showtime->setIsAvailable("0");
        $this->showtimeDAO->Add($showtime);
        
        require_once(VIEWS_PATH . "showtime-list.php");
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

    public function ShowAddView($id)
    {
        //echo($id);
        $movie= $this->movieDAO->GetOne($id);
        $cinemaList= $this->cinemasPDO->GetAll();
        //$this->viewArray($cinemas);
        $roomsList = $this->roomsDAO->getAll();
        require_once(VIEWS_PATH . "add-showtime.php");

    }





}





?>