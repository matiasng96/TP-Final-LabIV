<?php
    namespace Controllers;

    use Model\User as User;
    use DAO\UserPDO as UserDao;

   class UsersController{

        public function ShowAddView(){

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
            $D_user= new UserDao();

            try {
                $D_user->Add($user);
                return true;

            } catch (Throwable $ex) {
                throw $ex;
            }
        }


        public function SingUp($name, $lastName, $gender, $dni, $email, $password){

            echo "$name, $lastName, $gender, $dni, $email, $password";
            //require_once(VIEWS_PATH."login.php");

        }
    }

?>