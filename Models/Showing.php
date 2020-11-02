<?php
    namespace Models;

    //Esta clase corresponde al modelado de la función (en referencia a la proyección de la película). Tenemos la sala correspondiente,
    // la peli, fecha y horario. 
    class Showing {

        private $room;
        private $movie;
        private $date;
        private $time;


        
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
    }
