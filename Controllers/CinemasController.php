<?php 
     namespace Controllers;

use DAO\CinemasDAO;
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

    
    }
}

?>