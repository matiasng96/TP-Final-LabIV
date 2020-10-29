<?php
    namespace Controllers;
<<<<<<< HEAD
    //use DAO\UserDAO;
=======
    //use DAO\UserDAO as UserDao;
>>>>>>> nicolas

    use Model\User as User;
    use DAO\UserPDO as UserDAO;

   class UsersController{

        private $userDAO;

        public function __construct()
        {
            $this->userDAO = new UserDAO();
        }
<<<<<<< HEAD

        public function ShowSingUpView()
        {
            require_once(VIEWS_PATH."registry.php");
        }
        
=======

        public function ShowSingUpView()
        {
            require_once(VIEWS_PATH."registry.php");
        }

>>>>>>> nicolas
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
<<<<<<< HEAD
            $D_user= new UserDAO();

=======
>>>>>>> nicolas
            try {
                $this->userDao->Add($user);
                return true;

            } catch (Throwable $ex) {
                throw $ex;
            }
        }
        
        public function SignUp($name, $lastName, $gender, $dni, $email, $password){

<<<<<<< HEAD
        public function SingUp($name, $lastName, $gender, $dni, $email, $password){

=======
>>>>>>> nicolas
            $user = new User();
            $user->setName($name);
            $user->setLastName($lastName);
            $user->setGender($gender);
            $user->setDni($dni);
            $user->setEmail($email);
            $user->setPassword($password);

<<<<<<< HEAD
            $this->userDAO->Add($user);
            
            echo "ya estas registrado felicifdades";
        }
=======
            try {
                $this->userDao->Add($user);
                return true;

            } catch (Throwable $ex) {
                throw $ex;
            }
        }        
>>>>>>> nicolas
    }
?>