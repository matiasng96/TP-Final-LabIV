<?php
    namespace Controllers;
    //use DAO\UserDAO as UserDao;

    use Models\User as User;
    use DAO\UsersPDO as UserDAO;

   class UsersController{
       
        private $userDAO;

        public function __construct()
        {
            $this->userDAO = new UserDAO();
        }

        public function ShowSignUpView()
        {
            require_once(VIEWS_PATH."registry.php");
        }

        public function ShowLoginView()
        {
            require_once(VIEWS_PATH."login.php");
        }

        public function ShowAdminView(){
            require_once(VIEWS_PATH. "administrator.php");
        }
        
        public function setSession($user)
        {
            $_SESSION["userLogedIn"] = $user;
        }

        public function logIn($email, $password)
        {
            

            $user = $this->userDAO->read($email);
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

        /*public function Add ($user)
        {
            $D_user= new UserDAO();

            try {
                $this->userDao->Add($user);
                return true;

            } catch (Throwable $ex) {
                throw $ex;
            }
        }*/
        
        public function ShowLoggedView($email, $password){

            $this->logIn($email, $password);
        }
    

        public function ShowLogInViews(){

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
            $this->ShowLoginView();    
        }           
    }        
?>