<?php
    namespace Controllers;

use DAO\CinemasPDO as CinemasPDO;
use DAO\RoomsPDO as RoomsPDO;
use PDOException as Exception;
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
        public function ShowEditView($currentName,$name, $capacity, $ticketPrice)
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
            $room= new Room("","",$name, $ticketPrice, $capacity);
            //$this->viewArray($room);
            $this->rooomPDO->Edit($currentName,$room);


        }

    }
?>