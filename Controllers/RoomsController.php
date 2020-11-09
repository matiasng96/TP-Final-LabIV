<?php
    namespace Controllers;

use DAO\CinemasPDO as CinemasPDO;
use DAO\RoomsPDO as RoomsPDO;
use Exception;
use Models\Room as Room;

    class RoomsController{

        private $rooomPDO;

        public function __construct(){$this->rooomPDO = new RoomsPDO;}

        public function ShowListView(){

            try{                
                $roomList = $this->rooomPDO->getAll();  
                require_once(VIEWS_PATH."rooms-list.php");
            }
            catch(Exception $ex){
                echo "<script> Error: $ex </script>";
            }           
        }
        public function ShowEditView($name, $capacity, $ticketPrice)
        {
            require_once(VIEWS_PATH."room-edit.php");
        }

        public function viewArray($value)
        {
            echo('<pre>');
            var_dump($value);
            echo('</pre>');
        }

        public function ShowAddView($cinemaName){

            require_once(VIEWS_PATH."add-rooms.php");
        }

        public function Add($cinemaName, $name, $price, $capacity)
        {
            $cinema= new CinemasPDO();
            $aux=$cinema->getOneCinema($cinemaName);
            
            
            try
            {
                $room = new Room($aux->getId(),$cinemaName, $name, $price, $capacity);     
                $this->rooomPDO->Add($room); 
                $this->ShowListView();
            }
            catch(Exception $ex){
                echo "<script> Error: $ex </script>";
            }           
        }

        public function Edit($currentName,$name, $capacity, $ticketPrice)
        {
            $room= new Room(" "," ",$name, $ticketPrice, $capacity);
            $this->rooomPDO->Edit($currentName,$room);
            $cienmasPDO= new CinemasController();
            $cienmasPDO->ShowListView();
        }

        public function Delete($roomName)
        {
            $deleted = $this->rooomPDO->Delete($roomName);
            if ($deleted > 0)
            {
                $this->ShowListView();
            }else
            {
                echo "<script> alert('Ha ocurrido un error inesperado al intentar Eliminar dicha sala, por favor intente nuevamente.');</script>";
                $this->ShowListView();
            }
        }

    }
?>