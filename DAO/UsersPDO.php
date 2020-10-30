<?php
    namespace DAO;

    use DAO\IUserDAO as IuserDAO;
    use Models\User as User;
    use DAO\Connection as Connection;
    use \Exception as Exception;

    class UsersPDO implements IuserDAO
    {
        private $connection;
        private $userTable = "users";
        
        public function Add (User $user)
        {
            try
            {
                $sql = "INSERT INTO ".$this->userTable."(UserName,UserEmail,UserLastName,UserPassword,UserGender,UserDni) VALUES(:UserName, :UserEmail, :UserLastName, :UserPassword, :UserGender, :UserDni);";

                $parameters ["UserName"]= $user->getName();
                $parameters ["UserEmail"]= $user->getEmail();
                $parameters ["UserLastName"]= $user->getLastName();
                $parameters ["UserPassword"]= $user->getPassword();
                $parameters ["UserGender"]= $user->getGender();
                $parameters ["UserDni"]= $user->getDni();
                
                $this->connection= Connection::GetInstance();
                return $this->connection->ExecuteNonQuery($sql, $parameters);
            }
            catch(Exception $ex){

                throw $ex;
            }        
        }

        public function read ($email)
        {
            $sql= "SELECT * FROM ". $this->userTable ." WHERE UserEmail = :email LIMIT 1";

            $parameters["UserEmail"] = $email;
            
            try {
                
                $this->connection= Connection::getInstance();

                $result = $this->connection->Execute($sql, $parameters);
                
                $user2 = new User();

                foreach ($result as $value)
                {
                    $user2->setId($value["Id_users"]);
                    $user2->setName($value["UserName"]);
                    $user2->setEmail($value["U_email"]);
                    $user2->setLastName($value["U_lastName"]);
                    $user2->setPassword($value["U_password"]);
                    $user2->setGender($value["U_gender"]);
                    $user2->setDni($value["U_dni"]);

                }
                return $user2;

            }catch(Exception $ex){
                                
                throw $ex;
            }
            /*
            if(!empty($result))
            {
                return $this->mapear($result);
            }
            else
            {
                return false;
            }
            */
        }
       /* 
        protected function mapear($value)
        {
            $value= is_array($value) ? $value :[];
        
            $resp= array_map(function($p){
                return new User ($p ["email"],$p ["password"], $p ["name"], $p ["lastName"], $p ["gener"], $p ["dni"]
            );
            }, $value);
            return count ($resp) > 1 ? $resp : $resp['0'];
        }
        */

        public function getAll(){}
    }
?>