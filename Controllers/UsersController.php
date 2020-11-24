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

        public function ShowEditView()
        {
            require_once(VIEWS_PATH."edit-user.php");
        }

        
        public function viewArray($parameters)
        {
            echo('<pre>');
            var_dump($parameters);
            echo('</pre>');  
        }

        
        public function setSession($user)
        {
            $_SESSION["userLogedIn"] = $user;
            //$this->viewArray($_SESSION["userLogedIn"]);
            //echo($_SESSION["userLogedIn"];
        }

        public function checkSession(){

            if(!isset($_SESSION['userLogedIn'])){

                require_once(VIEWS_PATH."login.php");
            }

        }

        public function logIn($email, $password)
        {
            $user= $this->userDAO->read($email);   
            
            if(strcmp($user->getEmail(), $email) == 0){
                
                if(strcmp($user->getPassword(), $password)== 0){
                    
                    $this->setSession($user);
                    if($user->getUserRoleId() == 1){

                        $movieController = new MoviesController();                        
                        $movieController->ShowListView();
                    }elseif ($user->getUserRoleId() == 2) {    

                        $movieController = new MoviesController();                        
                        $movieController->ShowListView();                        
                    }
                }else{

                    require_once(VIEWS_PATH."login.php");
                }
            }else {
                echo "<script> alert('No estas registrado, hazlo ahora mientras que es gratis!'); </script>";
                require_once(VIEWS_PATH."login.php");
            }          
        }


        public function logOut(){
            
            session_destroy();
            $this->setSession(null);
            
            echo "<script> alert('Se cerro la sesión con éxito.') </script>";

            $moviesController = new MoviesController();
            $moviesController->ShowListView();            
        }
        
        public function Edit($currentEmail, $name, $lastName,$gender, $dni, $email, $password)
        {
            try{
            $user = $this->userDAO->read($currentEmail);
            $id = $user->getId();
            $rol = $user->getUserRole();
            $user = new User($name, $lastName,$gender, $dni, $email, $password);
            $user->setId($id);
            $user->setUserRole($rol);
            $this->userDAO->Edit($currentEmail,$user);
            $this->setSession($user);   
            require_once(VIEWS_PATH."login.php");
            }
            catch(Exception $ex){
                echo "<script> alert('Se produjo un error al querer modificar la informacion.'); </script>";
            }  
           
        }

        public function SignUp($name, $lastName, $gender, $dni, $email, $password)
        {
            $exist= $this->userDAO->read($email);           
            
            ///PREGUNTA SI ESTA SETTEADO O ES DISTINTA DE NULL LA VARIABLE EXIST
            if($exist->getEmail() == NULL){
             
                $roleArray= $this->userRole->retrieveAll();//TRAIGO EL ARREGLO DE ROLES, NECESARIO PARA AGREGAR ROL AL USUARIO
                $flag= $this->userDAO->checkUserList(); ///RETORNA EL LA CANTIDAD DE USUARIOS (quantity)                

                $user = new User($name, $lastName, $gender, $dni, $email, $password);

                if($flag==0){

                    $user->setUserRole($roleArray[0]);
                }
                else{

                    $user->setUserRole($roleArray[1]);
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