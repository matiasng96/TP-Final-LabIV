<?php
    namespace Controllers;

    class UsersController{

        public function ShowAddView(){

            require_once(VIEWS_PATH."registry.php");
        }

        public function logIn($email, $password){

            echo $email;
            echo $password;



        }


        public function singUp($name, $lastName, $gender, $dni, $email, $password){


        }
    }

?>