<?php 
    namespace Controllers;

    /*Si usamos este namespace accedemos al DAO con JSON. */
    //use DAO\CinemasDAO as CinemasDAO;
    /*Si usamos este namespace accedemos al DAO con PDO. */
    use DAO\CinemasPDO as CinemasDAO;   
    use Models\Cinema;
    use DAO\RoomsPDO as RoomsPDO;

    class CinemasController
    {
        private $cinemasDAO;

        public function __construct(){$this->cinemasDAO = new CinemasDAO;}
    
        public function ShowAddView(){require_once(VIEWS_PATH."add-cinema.php");}

        public function ShowEditView($cinemaName, $cinemaCapacity, $cinemaAddress){
            
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
                
                $cinema = new Cinema($name, $TotalCapacity, $address);                
                $this->cinemasDAO->Add($cinema);
                $this->ShowListView();
            }
            else{

                echo "<script> alert('El cine que intenta registrar con el nombre $name fue registrado anteriormente, ya existe. Le sugerimos registrar un nuevo cine.');</script>";
                $this->ShowAddView();
            }
        }

        public function Delete($cinemaName){

            $deleted = $this->cinemasDAO->Delete($cinemaName);

            if($deleted > 0){
                $this->ShowListView();
            }else{
                echo "<script> alert('Ha ocurrido un error inesperado al intentar Eliminar dicho Cine, por favor intente nuevamente.');</script>";
                $this->ShowListView();
            }
        }

        public function Edit($currentName,$name, $capacity, $address){

            $newCinema = new Cinema($name,$capacity,$address);
            $this->cinemasDAO->Edit($currentName,$newCinema);
            $this->ShowListView();
        }

        public function ShowBuyTicketView(){
                    
            require_once(VIEWS_PATH."BuyTickets.php");
        }

        public function setSession(){

            $_SESSION[""];
            var_dump($_SESSION);
        }

        public function checkSessionStart($cinema, $tickets){

            $this->setSession();
        }
    }
?>