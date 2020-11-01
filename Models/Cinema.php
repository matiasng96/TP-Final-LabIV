<?php
    namespace Models;

    class Cinema{

        //Acá cambio lo de Ticket Price, se agregaron las salas (Rooms) en cada cine. Room es una clase y entre sus atributos está el precio de 
        //la entrada. Esto es un requisito que agregaron. Se cambió la estructura de los cines.
        private $name;
        private $capacity;
        private $address;     
        private $rooms;   

        public function __construct($name = '', $capacity = '', $address = '', $rooms = array()){

            $this->setName($name);
            $this->setCapacity($capacity);
            $this->setAddress($address);
            $this->$rooms = array();
        }  

        public function setName($name){$this->name = $name;}
        public function getName(){return $this->name;}

        public function setCapacity($capacity){$this->capacity = $capacity;}
        public function getCapacity(){return $this->capacity;}

        public function setAddress($address){$this->address = $address;}
        public function getAddress(){return $this->address;}
        
        public function getRooms(){return $this->rooms;}
        public function setRooms($rooms){$this->rooms = $rooms;}
    }
?>