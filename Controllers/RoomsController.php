<?php
    namespace Controllers;
    use DAO\RoomsPDO as RoomsPDO;
    use Models\Room as Room;

    class RoomsController{

        private $rooomPDO;

        public function __construct(){$this->rooomPDO = new RoomsPDO;}

        public function ShowListView(){

            $roomList = $this->rooomPDO->getAll();
            require_once(VIEWS_PATH."rooms-list.php");
        }

        public function ShowAddView($cinemaName){

            require_once(VIEWS_PATH."add-rooms.php");
        }

        public function Add($cinemaName, $name, $price, $capacity){

            $room = new Room($cinemaName, $name, $price, $capacity);            
            $this->rooomPDO->Add($room);
            $this->ShowListView();
        }
    }
?>