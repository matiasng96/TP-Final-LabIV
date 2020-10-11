<?php
    namespace DAO;

    use Models\Cinema as Cinema;

    class CinemasDAO{

        private $cinemasList = array();
        private $fileName = ROOT."Data/cinemas.json";

        public function Add(Cinema $newCinema){

            $this->RetrieveData();
            $newCinema->setId($this->getNextId());
            array_push($cinemasList, $newCinema);
            $this->SaveData($this->cinemasList);
        }

        public function getNextId(){

            return 1;
        }

        public function getAll(){

            $this->RetrieveData();
            return $this->cinemasList;
        }

        public function RetrieveData(){

            $this->cinemasList = array();

            if(file_exists($this->fileName)){

                $jsonToDecode = file_get_contents($this->fileName);
                $contentArray = ($jsonToDecode) ? json_decode($jsonToDecode, true) : array();
                
                foreach($contentArray as $content){

                    $cinema = new Cinema();
                    $cinema->setId($content['id']);
                    $cinema->setName($content['name']);
                    $cinema->setCapacity($content['capacity']);
                    $cinema->setAddress($content['address']);                   
                    $cinema->setRooms($content['rooms']);

                    array_push($cinemasList, $cinema);
                }
            }
        }

        public function SaveData(){

        }

    }

?>