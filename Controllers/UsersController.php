<?php
    namespace Controllers;
    //use DAO\UserDAO as UserDao;

    use Models\User as User;
    use Models\Rol as Rol;
    use DAO\UsersPDO as UserDAO;
    use DAO\UserRolePDO as RolePDO;
    use Exception as Exception;

   class UsersController{
       
        private $userDAO;
        private $userRole;
        private $messege;

        public function __construct()
        {
            $this->userDAO = new UserDAO();
            $this->userRole = new RolePDO();
        }

        public function ShowLogInView()
        {
            require_once(VIEWS_PATH ."login.php");
        }

        public function ShowSignUpView()
        {
            require_once (VIEWS_PATH ."registry.php");
        }

        public function ShowEditView($name, $lastName, $gender, $dni, $email, $password){

            require_once(VIEWS_PATH."edit-user.php");
        }

        
        public function setSession($user)
        {
            $_SESSION["userLogedIn"] = $user;
        }

        public function logIn($email, $password)
        {
            $user= $this->userDAO->read($email);   
         
            if(strcmp($user->getEmail(), $email) == 0)
            {
                if(strcmp($user->getPassword(), $password)== 0)
                {
                    
                    $this->setSession($user);
                    if($user->getUserRoleId() == 1 )
                    {
                        require_once(VIEWS_PATH . "administrator.php");
                    }elseif ($user->getUserRoleId() == 2) {
                        echo($user->getUserRoleId());
                        require_once(VIEWS_PATH . "movies-list.php");
                    }
                }else
                {
                    require_once(VIEWS_PATH . "login.php");
                }
            }else {
                echo("holaaa");

                require_once(VIEWS_PATH . "login.php");
            }
          
        }

        public function logOut()
        {
            session_destroy();
            require_once(VIEWS_PATH . "login.php");
        }
    
        public function Edit($currentEmail, $name, $lastName, $gender, $dni, $email, $password ){

            try{
                $user = new User($name, $lastName, $gender, $dni, $email, $password);
                $userEdited = $this->userDAO->Edit($currentEmail, $user);
                var_dump($userEdited);
            }
            catch(Exception $ex){

                echo "<script> Se produjo un error al querer modificar la informacion. </script>";
            }
            //$user = $this->userDAO->read($email);
            //$this->userDAO->Add($user);
        }      

        public function SignUp($name, $lastName, $gender, $dni, $email, $password)
        {
            $exist= $this->userDAO->read($email);           
            
            ///PREGUNTA SI ESTA SETTEADO O ES DISTINTA DE NULL LA VARIABLE EXIST
            if($exist->getEmail() == NULL){
             
                $roleArray= $this->userRole->retrieveAll();//TRAIGO EL ARREGLO DE ROLES, NECESARIO PARA AGREGAR ROL AL USUARIO
                $flag= $this->userDAO->checkUserList(); ///RETORNA EL LA CANTIDAD DE USUARIOS (quantity)

                

                $user = new User($name, $lastName, $gender, $dni, $email, $password);
                $rol = new Rol();
                
                var_dump($roleArray);

                if($flag==0){

                    $rol->setRol($roleArray[0]);
                    $user->setUserRole($rol);
                }
                else{
                    $rol->setRol($roleArray[1]);
                    $user->setUserRole($rol);
                }

                $this->userDAO->Add($user);

                require_once(VIEWS_PATH."login.php");  // VISTA DE LOGGEO
           }
           else{

                require_once(VIEWS_PATH."registry.php"); /// VISTA DE REGISTRO
           }    
        }           
    }        
?>