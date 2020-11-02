<?php 
     namespace Controllers;

/*Si usamos este namespace accedemos al DAO con JSON. */
//use DAO\CinemasDAO as CinemasDAO;
/*Si usamos este namespace accedemos al DAO con PDO. */
use DAO\CinemasPDO as CinemasDAO;   
use Models\Cinema;

class CinemasController
{
    private $cinemasDAO;

    public function __construct()
    {
        $this->cinemasDAO = new CinemasDAO;
    }
 
    public function ShowAddView()
    {
        require_once(VIEWS_PATH."add-cinema.php");
    }

    public function ShowEditView($cinemaName, $cinemaCapacity, $cinemaAddress)
    {
        require_once(VIEWS_PATH."edit-cinema.php");
    }

    public function ShowListView()
    {
        $cinemasList = $this->cinemasDAO->GetAll();

        require_once(VIEWS_PATH."cinemas-list.php");
    }

    public function Add($name, $TotalCapacity, $address)
    {
        $exists = $this->cinemasDAO->SearchCinemaByName($name);
 

        if(!$exists){
        $cinema = new Cinema();
        $cinema->setName($name);
        $cinema->setTotalCapacity($TotalCapacity);
        $cinema->setAddress($address);

        $this->cinemasDAO->Add($cinema);

        $this->ShowAddView();
        }
        else{
            echo "Ya existe un cine con ese nombre.";
            $this->ShowAddView();
        }
    }

    public function Delete($cinemaName){

        $deleted = $this->cinemasDAO->Delete($cinemaName);

        if($deleted > 0){

            $this->ShowListView();

        }else{
            echo "Error al Eliminar el Cine";
        }
    }

    public function Edit($currentName,$name, $capacity, $address){

        $newCinema = new Cinema($name,$capacity,$address);

        $this->cinemasDAO->Edit($currentName,$newCinema);

        $this->ShowListView();

    }
}
