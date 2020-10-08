<?php
    namespace Models;

    class Movie
    {
        
        private $poster_path; //image url
        private $id;
        private $genre_ids; //array
        private $title;  
     

    
        public function getPoster_path()
        {
                return $this->poster_path;
        }

        
        public function setPoster_path($poster_path)
        {
                $this->poster_path = $poster_path;
        }

      
        public function getId()
        {
                return $this->id;
        }

       
        public function setId($id)
        {
                $this->id = $id;
        }

        
        public function getGenre_ids()
        {
                return $this->genre_ids;
        }

      
        public function setGenre_ids($genre_ids)
        {
                $this->genre_ids = $genre_ids;     
        }

       
        public function getTitle()
        {
                return $this->title;
        }

        
        public function setTitle($title)
        {
                $this->title = $title;    
        }

        
      
    }
