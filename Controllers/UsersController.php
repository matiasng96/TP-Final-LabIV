<?php
    namespace Controllers;
    //use DAO\UserDAO as UserDao;

    use Model\User as User;
    use DAO\UserPDO as UserDao;

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
            $D_user = new UserDao();

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
            try {
                $this->userDao->Add($user);
                return true;

            } catch (Throwable $ex) {
                throw $ex;
            }
        }
        
        public function SignUp($name, $lastName, $gender, $dni, $email, $password){

            $user = new User();
            $user->setName($name);
            $user->setLastName($lastName);
            $user->setGender($gender);
            $user->setDni($dni);
            $user->setEmail($email);
            $user->setPassword($password);

            try {
                $this->userDao->Add($user);
                return true;

            } catch (Throwable $ex) {
                throw $ex;
            }
        }        
    }
?>