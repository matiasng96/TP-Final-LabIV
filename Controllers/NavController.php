<?php
    namespace Controllers;

    class NavController{

        private $nameSession;
        private $rol;

        public function __construct() {

            $this->nameSession = 'userLogedIn';
            $this->rol = 0;
        }

        public function selectNav(){            
            
            if(isset($_SESSION['userLogedIn'])){

                $rol = $_SESSION['userLogedIn']->getUserRoleId();
                switch($rol){
                    case 1: require_once(VIEWS_PATH."nav-admin.php"); break;
                    case 2: require_once(VIEWS_PATH."nav-logged.php"); break;
                }  
            }      
            else{
                require_once(VIEWS_PATH."nav-notLogged.php");
            } 
        }

        public function getNameSession(){return $this->nameSession;}

        public function getRol(){return $this->rol;}
    }
?>