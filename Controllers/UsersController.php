<?php
    namespace Controllers;
    //use DAO\UserDAO as UserDao;

    use Models\User as User;
    use DAO\UsersPDO as UserDAO;

   class UsersController{
       
        private $userDAO;
        private $messege;

        public function __construct()
        {
            $this->userDAO = new UserDAO();
        }

        public function ShowSignUpView( $messege = '')
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
            $user= $this->userDAO->read($email);
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
        
        public function ShowLoggedView($email, $password){

            $this->logIn($email, $password);
        }
    

        public function ShowLogInViews(){

            require_once(VIEWS_PATH."registry.php");
        }

        public function SignUp($name, $lastName, $gender, $dni, $email, $password){

            $exist= $this->userDAO->read($email);
            $messege = "MAIL YA ASOCIADO A OTRO USUARIO";
            if(!$exist)
            {

            $user = new User();
            $user->setName($name);
            $user->setLastName($lastName);
            $user->setGender($gender);
            $user->setDni($dni);
            $user->setEmail($email);
            $user->setPassword($password);

            $this->userDAO->Add($user);            
            $this->ShowLoginView();    
            }else {
            //echo '<script>swal({title: "El email con el que intentas loguearte ya esta asociado a otra cuenta.",icon: "warning",showCancelButton: true})</script>';
            $this->ShowSignUpView($messege);
            }

        }           
    }        
?>