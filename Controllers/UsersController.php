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
            //echo('<pre>');
            //var_dump($user);
            //echo('</pre>');    
            
            
            
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
    
        public function Edit($name, $lastName, $gender, $dni, $email, $password ){

            $user = $this->userDAO->read($email);
            $user = new User($user->getId(), $email, $password, $name, $lastName, $gender, $dni);
            $this->userDAO->Add($user);


        }

        public function setUser ($name, $lastName, $gender, $dni, $email, $password)
        {
            $aux= new User();
            $aux->setEmail($email);
            $aux->setPassword($password);
            $aux->setName($name);
            $aux->setLastName($lastName);
            $aux->setGender($gender);
            $aux->setDni($dni);

            return $aux;
        }

        public function SignUp($name, $lastName, $gender, $dni, $email, $password)
        {

            $exist= $this->userDAO->read($email);
           
            
            ///PREGUNTA SI ESTA SETTEADO O ES DISTINTA DE NULL LA VARIABLE EXIST
            if($exist->getEmail() == NULL)
            {
             
            $roleArray= $this->userRole->retrieveAll();//TRAIGO EL ARREGLO DE ROLES, NECESARIO PARA AGREGAR ROL AL USUARIO
            $flag= $this->userDAO->checkUserList(); ///RETORNA EL LA CANTIDAD DE USUARIOS (quantity)

            $user = new User();
             
            $user= $this->setUser($name, $lastName, $gender, $dni, $email, $password);

            if($flag==0)
            {
                $user->setUserRole($roleArray[0]);
            }else
            {
                $user->setUserRole($roleArray[1]);
            }
            $this->userDAO->Add($user);

            require_once(VIEWS_PATH."login.php");  // VISTA DE LOGGEO
           }else
            {
            
            require_once(VIEWS_PATH."registry.php"); /// VISTA DE REGISTRO
            }
         
        }           
    }        
?>