<?php
    namespace Models;

    class Cinema{

        private $name;
        private $capacity;
        private $address;
        private $ticketPrice;

        public function __construct($name = '', $capacity = ''){

            $this->setName($name);
            $this->setCapacity($capacity);
        }

        public function setName($name){$this->name = $name;}
        public function getName(){return $this->name;}

        public function setCapacity($capacity){$this->capacity = $capacity;}
        public function getCapacity(){return $this->capacity;}

        public function setAddress($address){$this->address = $address;}
        public function getAddress(){return $this->address;}

        public function getTicketPrice() {return $this->ticketPrice;}
        public function setTicketPrice($ticketPrice){$this->ticketPrice = $ticketPrice;}
             
    }
