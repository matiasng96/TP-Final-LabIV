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


        public function SingUp($name, $lastName, $gender, $dni, $email, $password){

            echo "$name, $lastName, $gender, $dni, $email, $password";
            require_once(VIEWS_PATH."login.php");

        }
    }

?>