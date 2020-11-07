<?php

        namespace Models;
        
        class Movie{



                private $id;
                private $poster_path; //image url
                private $runtime;
                private $genresArray;
                private $language;
                private $title;  


                public function __construct($id = '', $poster_path = '', $runtime = '', $genresArray = array(), $language = '', $title = ''){

                        $this->setId($id);
                        $this->setPoster_path($poster_path);
                        $this->setRuntime($runtime);
                        $this->setGenresArray($genresArray);
                        $this->setLanguage($language);
                        $this->setTitle($title);
                    }  
               
                
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

                public function getGenresArray(){return $this->genresArray;}
                public function setGenresArray($genresArray){$this->genresArray = $genresArray;}
        }
?>