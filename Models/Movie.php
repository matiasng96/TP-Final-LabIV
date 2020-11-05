<?php

        namespace Models;
        
        class Movie{

                private $id;
                private $poster_path; //image url
                private $runtime;
                private $genres_ids;
                private $language;
                private $title;  
               
                
                public function getId(){return $this->id; }
                public function setId($id){$this->id = $id;}

                public function getPoster_path(){return $this->poster_path;}        
                public function setPoster_path($poster_path){$this->poster_path = $poster_path;}
                
                public function getTitle(){return $this->title;}
                public function setTitle($title){ $this->title = $title;}

                public function getRuntime(){return $this->runtime;}
                public function setRuntime($runtime){$this->runtime = $runtime;}

                public function getLanguage(){return $this->language;}
                public function setLanguage($language) {$this->language = $language;}

                public function getGenres_ids(){return $this->genres_ids;}
                public function setGenres_ids($genres_ids){$this->genres_ids = $genres_ids;}
        }
?>