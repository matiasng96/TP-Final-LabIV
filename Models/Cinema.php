<?php
    namespace Models;

    class Cinema{

        //Acá cambio lo de Ticket Price, se agregaron las salas (Rooms) en cada cine. Room es una clase y entre sus atributos está el precio de 
        //la entrada. Esto es un requisito que agregaron. Se cambió la estructura de los cines.
        private $name;
        private $totalCapacity; //La suma de la capacidad de cada sala.
        private $address;     
        private $rooms;   

        public function __construct($name = '', $TotalCapacity = '', $address = '', $rooms = array()){

            $this->setName($name);
            $this->setTotalCapacity($TotalCapacity);
            $this->setAddress($address);
            $this->$rooms = array();
        }  

        public function setName($name){$this->name = $name;}
        public function getName(){return $this->name;}

        public function setTotalCapacity($TotalCapacity){$this->TotalCapacity = $TotalCapacity;}
        public function getTotalCapacity(){return $this->TotalCapacity;}

        public function setAddress($address){$this->address = $address;}
        public function getAddress(){return $this->address;}
        
        public function getRooms(){return $this->rooms;}
        public function setRooms($rooms){$this->rooms = $rooms;}
    }
?>