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

    public function ShowEditView($cinemaName)
    {
        require_once(VIEWS_PATH."edit-cinema.php");
    }

    public function ShowListView()
    {
        $cinemasList = $this->cinemasDAO->GetAll();

        require_once(VIEWS_PATH."cinemas-list.php");
    }

    public function Add($name, $capacity, $address, $ticketPrice)
    {
        $cinema = new Cinema();
        $cinema->setName($name);
        $cinema->setCapacity($capacity);
        $cinema->setAddress($address);
        $cinema->setTicketPrice($ticketPrice);

        $this->cinemasDAO->Add($cinema);

        $this->ShowAddView();
    }

    public function Delete($cinemaName){

        
        $this->cinemasDAO->Delete($cinemaName);

        $this->ShowListView();
    }

    public function Edit($oldName,$name, $capacity, $address, $ticketPrice){

        $newCinema = new Cinema($name,$capacity,$address,$ticketPrice);

        $this->cinemasDAO->Edit($oldName,$newCinema);

        $this->ShowListView();

    }
}
