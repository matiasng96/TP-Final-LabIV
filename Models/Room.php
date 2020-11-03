<?php
    namespace Models;
    
    //Clase de modelado de Salas de Cine. El ADMIN puede agregar las salas al cine
    class Room{

        private $name;
        private $ticketPrice;
        private $capacity;

        public function __construct($name='', $ticketPrice='', $capacity=''){
          
            $this->setName($name);
            $this->setTicketPrice($ticketPrice);
            $this->setCapacity($capacity);                
        }

        public function getName(){return $this->name;}
        public function setName($name){$this->name = $name;}

        public function getTicketPrice(){return $this->ticketPrice;}
        public function setTicketPrice($ticketPrice){$this->ticketPrice = $ticketPrice;}

        public function getCapacity(){return $this->capacity;}
        public function setCapacity($capacity){$this->capacity = $capacity;}
    }
?>