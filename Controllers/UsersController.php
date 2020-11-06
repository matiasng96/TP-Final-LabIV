<?php
    namespace Controllers;
    //use DAO\UserDAO as UserDao;

    use Models\User as User;
    use Models\Rol as Rol;
    use DAO\UsersPDO as UserDAO;
    use DAO\UserRolePDO as RolePDO;
    

   class UsersController{
       
        private $userDAO;
        private $userRole;
        private $messege;

        public function __construct()
        {
            $this->userDAO = new UserDAO();
            $this->userRole = new RolePDO();
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

            require_once(VIEWS_PATH."login.php");
        }

        public function SignUp($name, $lastName, $gender, $dni, $email, $password)
        {

            $exist= $this->userDAO->read($email);
            if(!$exist)
            {
            $roleArray= $this->userRole->retrieveAll();//TRAIGO EL ARREGLO DE ROLES, NECESARIO PARA AGREGAR ROL AL USUARIO
            $flag= $this->userDAO->checkUserList(); ///RETORNA EL LA CANTIDAD DE USUARIOS (quantity)

            $user = new User();
            $user->setEmail($email);
            $user->setPassword($password);
            $user->setName($name);
            $user->setLastName($lastName);
            $user->setGender($gender);
            $user->setDni($dni);

            if($flag==0)
            {
                $user->setUserRole($roleArray[0]);
            }else
            {
                $user->setUserRole($roleArray[1]);
            }

            $this->userDAO->Add($user);

            $this->ShowLogInView();  
           }else
            {
            $this->ShowSignUpView();
            }
        

        }           
    }        
?>