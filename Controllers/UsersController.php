<?php
    namespace Controllers;
    use DAO\UserDAO;
    use Models\User;

    class UsersController{

        private $userDAO;

        public function __construct(){$this->userDAO = new UserDAO();}

        public function ShowSingUpView(){require_once(VIEWS_PATH."registry.php");}

        public function LogIn($email, $password){

            echo $email;
            echo $password;



        }

        public function ShowLogInView(){

            require_once(VIEWS_PATH."registry.php");
        }

        public function SignUp($name, $lastName, $gender, $dni, $email, $password){

            $user = new User();
            $user->setName($name);
            $user->setLastName($lastName);
            $user->setGender($gender);
            $user->setDni($dni);
            $user->setEmail($email);
            $user->setPassword($password);

            $this->userDAO->Add($user);
            
            require_once(VIEWS_PATH."add-cinema.php");
        }
    }
?>