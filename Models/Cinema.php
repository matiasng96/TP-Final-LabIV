<?php
    namespace Models;

    class Cinema{

        private $name;
        private $capacity;
        private $address;     
<<<<<<< HEAD
        private $rooms;   
=======
        private $ticketPrice;   
>>>>>>> 475915e3304058e1caf49b3c8f59e46bdc53ba95

        public function __construct($name = '', $capacity = '', $address = '', $ticketPrice = ''){

            $this->setName($name);
            $this->setCapacity($capacity);
            $this->setAddress($address);
            $this->setTicketPrice($ticketPrice);
        }

      

        public function setName($name){$this->name = $name;}
        public function getName(){return $this->name;}

        public function setCapacity($capacity){$this->capacity = $capacity;}
        public function getCapacity(){return $this->capacity;}

        public function setAddress($address){$this->address = $address;}
        public function getAddress(){return $this->address;}
        
<<<<<<< HEAD
        public function setRooms($rooms){$this->rooms = $rooms;}
        public function getRooms(){return $this->rooms;}
=======
        public function setTicketPrice($ticketPrice){$this->ticketPrice = $ticketPrice;}
        public function getTicketPrice(){return $this->ticketPrice;}
>>>>>>> 475915e3304058e1caf49b3c8f59e46bdc53ba95
    }
?>