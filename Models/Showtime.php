<?php
    namespace Models;

    //Esta clase corresponde al modelado de la Función (en referencia a la proyección de la película). Tenemos la sala correspondiente,
    // la peli, fecha y horario y cantidad de tickets. 
    class Showtime {
        private $id;
        private $room;
        private $movie;
        private $date;
        private $time;
        private $tickets;
        private $isAvailable;

        public function __construct($room = " ", $movie = " ", $date = " ", $time = " ")
        {
            $this->setRoom($room);
            $this->setMovie($movie);
            $this->setDate($date);
            $this->setTime($time);
        }


        public function getId()
        {
                return $this->room;
        }

        public function setId($id)
        {
                $this->id = $id;
        }
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

        public function getIsAvailable()
        {
                return $this->isAvailable;
        }

        public function setIsAvailable($isAvailable)
        {
                $this->isAvailable = $isAvailable;

                return $this->isAvailable;
        }
    }
