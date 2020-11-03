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
                $sql = "INSERT INTO ".$this->userTable.
                "(UserName, UserEmail, UserLastName ,UserPassword ,UserGender , UserDni, UserAdmin) 
                VALUES(:UserName, :UserEmail, :UserLastName, :UserPassword, :UserGender, :UserDni , :UserAdmin);";

                $parameters ["UserName"]= $user->getName();
                $parameters ["UserEmail"]= $user->getEmail();
                $parameters ["UserLastName"]= $user->getLastName();
                $parameters ["UserPassword"]= $user->getPassword();
                $parameters ["UserGender"]= $user->getGender();
                $parameters ["UserDni"]= $user->getDni();
                $parameters ["UserAdmin"]= $user->getAdmin();

                //var_dump($parameters);

                $this->connection= Connection::GetInstance();
                return $this->connection->ExecuteNonQuery($sql, $parameters);
            }
            catch(Exception $ex){

                throw $ex;
            }        
        }

        public function read ($UserEmail)
        {
            try{
                
                $sql= "SELECT * FROM ".$this->userTable." WHERE (UserEmail = :UserEmail) LIMIT 1;";

                $parameters ["UserEmail"] = $UserEmail;            
            
                $this->connection= Connection::getInstance();
                $result = $this->connection->Execute($sql, $parameters);
               
                
                $user2 = new User();

                foreach ($result as $value)
                {
                    $user2->setId($value["UserId"]);
                    $user2->setName($value["UserName"]);
                    $user2->setEmail($value["UserEmail"]);
                    $user2->setLastName($value["UserLastName"]);
                    $user2->setPassword($value["UserPassword"]);
                    $user2->setGender($value["UserGender"]);
                    $user2->setDni($value["UserDni"]);
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