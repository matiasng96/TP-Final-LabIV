<?php
<<<<<<< HEAD
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
=======
// <!-- Al igual que el MoviesDAO va a tener los métodos encargados de traer y guardar los datos del JSON. -->
// <!-- Va a implementar la Interfaz ICinemasDAO.php -->

namespace DAO;

use Models\Cinema;

class CinemasDAO implements ICinemasDAO
{
    private $cinemasList = array();
    
    public function Add(Cinema $cinema)
    {
        $this->RetrieveData();

        array_push($this->cinemasList, $cinema);

        $this->SaveData($this->cinemasList);
    }

    public function Delete($cinemaName){

        $this->RetrieveData();

        foreach($this->cinemasList as $key => $cinema){
            if($cinema->getName() == $cinemaName){
               
                unset($this->cinemasList[$key]);
            }
        }

        $this->SaveData($this->cinemasList);
    }

    public function GetAll()
    {
        $this->RetrieveData();

        return $this->cinemasList;
    }


    public function SaveData($cinemasList) // Toma un arreglo de objetos Cinema y los guarda en formato JSON en Data/cinemas.json
    {
        $arrayToEncode = array();

      
        foreach ($cinemasList as $cinema) {

            $dataArray["name"] = $cinema->getName();
            $dataArray["capacity"] = $cinema->getCapacity();
            $dataArray["address"] = $cinema->getAddress();
            $dataArray["ticketPrice"] = $cinema->getTicketPrice();
            
            array_push($arrayToEncode, $dataArray);
        }
        
        $jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);
        
        file_put_contents('Data/cinemas.json', $jsonContent);
    }

    

    public function RetrieveData()  //Pasa las películas del JSON a un arreglo de objetos Cinema.
    {
        
        $this->cinemasList = array();


        if (file_exists('Data/cinemas.json')) {
            $jsonContent = file_get_contents('Data/cinemas.json');

            $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();

            foreach ($arrayToDecode as $valuesArray) {
                
                $cinema = new Cinema();
                $cinema->setName($valuesArray["name"]);
                $cinema->setCapacity($valuesArray["capacity"]);
                $cinema->setAddress($valuesArray["address"]);
                $cinema->setTicketPrice($valuesArray["ticketPrice"]);
              
                array_push($this->cinemasList, $cinema);
            }
        }
    }
}
>>>>>>> 475915e3304058e1caf49b3c8f59e46bdc53ba95
