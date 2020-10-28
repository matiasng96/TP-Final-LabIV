<?php
    namespace Controllers;
    //use DAO\UserDAO;

    use Model\User as User;
    use DAO\UserPDO as UserDAO;

   class UsersController{

        private $userDAO;

        public function __construct()
        {
            $this->userDAO = new UserDAO();
        }

        public function ShowSingUpView()
        {
            require_once(VIEWS_PATH."registry.php");
        }
        
        public function setSession($user)
        {
            $_SESSION["userLogedIn"] = $user;
        }

        public function logIn($email, $password)
        {
            $D_user = new UserDAO();

            $user= $D_user->read($email);
            //FUNCION READ DEL DAOUSER (EMAIL) 

            if($user)
            {
                if($user->getPassword() == $password)
                {
                    $this->setSession($user);
                    return $user;
                }
            }
            return false;
        }

        public function Add ($user)
        {
            $D_user= new UserDAO();

            try {
                $D_user->Add($user);
                return true;

            } catch (Throwable $ex) {
                throw $ex;
            }
        }

        public function SingUp($name, $lastName, $gender, $dni, $email, $password){

            $user = new User();
            $user->setName($name);
            $user->setLastName($lastName);
            $user->setGender($gender);
            $user->setDni($dni);
            $user->setEmail($email);
            $user->setPassword($password);

            $this->userDAO->Add($user);
            
            echo "ya estas registrado felicifdades";
        }
    }
?>