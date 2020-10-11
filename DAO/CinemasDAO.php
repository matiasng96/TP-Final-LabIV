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
            }

        }

        public function SaveData(){

        }

    }

?>