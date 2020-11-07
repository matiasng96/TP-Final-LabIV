<?php
    namespace Controllers;
    use DAO\RoomsPDO as RoomsPDO;
use Exception;
use Models\Room as Room;

    class RoomsController{

        private $rooomPDO;

        public function __construct(){$this->rooomPDO = new RoomsPDO;}

        public function ShowListView(){

            try{                
                $roomList = $this->rooomPDO->getAll();
                //echo "<hr><br> ACA MUESTRO ROOMLIST<br>"; //" EL ERROR ESTA EN ROOMPDO ";
                //echo '<pre>' , var_dump($roomList) , '</pre>';     
                require_once(VIEWS_PATH."rooms-list.php");
            }
            catch(Exception $ex){
                echo "<script> Error: $ex </script>";
            }           
        }

        public function ShowAddView($cinemaName){

            require_once(VIEWS_PATH."add-rooms.php");
        }

        public function Add($cinemaName, $name, $price, $capacity){

            try{
                $room = new Room($cinemaName, $name, $price, $capacity);            
                $this->rooomPDO->Add($room);                
                $this->ShowListView();
            }
            catch(Exception $ex){
                echo "<script> Error: $ex </script>";
            }           
        }
    }
?>