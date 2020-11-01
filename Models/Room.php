<?php
    namespace Models;
    
    //Clase de modelado de Salas de Cine. El ADMIN puede agregar las salas al cine
    class Room {

        private $name;
        private $ticketPrice;
        private $capacity;


        public function getCapacity()
        {
                return $this->capacity;
        }

        public function setCapacity($capacity)
        {
                $this->capacity = $capacity;
        }
    }
