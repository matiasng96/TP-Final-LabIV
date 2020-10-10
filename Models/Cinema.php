<?php
    namespace Models;

    class Cinema{

        private $id;
        private $name;
        private $capacity;
        private $address;     
        private $rooms;   

        public function __construct($name = '', $capacity = ''){

            $this->setName($name);
            $this->setCapacity($capacity);
        }

        public function setId($id){$this->id = $id;}
        public function getId(){return $this->id;}

        public function setName($name){$this->name = $name;}
        public function getName(){return $this->name;}

        public function setCapacity($capacity){$this->capacity = $capacity;}
        public function getCapacity(){return $this->capacity;}

        public function setAddress($address){$this->address = $address;}
        public function getAddress(){return $this->address;}
        
        public function setRooms($rooms){$this->rooms = $rooms;}
        public function getRooms(){return $this->rooms;}
    }
?>