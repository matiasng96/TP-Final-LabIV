<?php
    namespace Models;

    class Cinema{

        //Acá cambio lo de Ticket Price, se agregaron las salas (Rooms) en cada cine. Room es una clase y entre sus atributos está el precio de 
        //la entrada. Esto es un requisito que agregaron. Se cambió la estructura de los cines.
        private $name;
        private $totalCapacity; //La suma de la capacidad de cada sala.
        private $address;     
        private $rooms = array();   

        public function __construct($name = '', $totalCapacity = '', $address = ''){

            $this->setName($name);
            $this->setTotalCapacity($totalCapacity);
            $this->setAddress($address);
        }  

        public function setName($name){$this->name = $name;}
        public function getName(){return $this->name;}

        public function setTotalCapacity($totalCapacity){$this->totalCapacity = $totalCapacity;}
        public function getTotalCapacity(){return $this->totalCapacity;}

        public function setAddress($address){$this->address = $address;}
        public function getAddress(){return $this->address;}
        
        public function getRooms(){return $this->rooms;}
        public function setRooms($rooms){$this->rooms = $rooms;}
    }
?>