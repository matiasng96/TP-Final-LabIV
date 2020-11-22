<?php
    namespace Models;

    //Esta clase corresponde al modelado de la Función (en referencia a la proyección de la película). Tenemos la sala correspondiente,
    // la peli, fecha y horario y cantidad de tickets. 
    class Showing {

        private $room;
        private $movie;
        private $date;
        private $time;
        private $tickets;


        
        public function getRoom()
        {
                return $this->room;
        }

        public function setRoom($room)
        {
                $this->room = $room;

               
        }

      
        public function getMovie()
        {
                return $this->movie;
        }

      
        public function setMovie($movie)
        {
                $this->movie = $movie;

               
        }

    
        public function getDate()
        {
                return $this->date;
        }

        public function setDate($date)
        {
                $this->date = $date;

       
        }

     
        public function getTime()
        {
                return $this->time;
        }

     
        public function setTime($time)
        {
                $this->time = $time;

        }

    
        public function getTickets()
        {
                return $this->tickets;
        }


        public function setTickets($tickets)
        {
                $this->tickets = $tickets;

                return $this;
        }
    }
