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
                $sql = "INSERT INTO ".$this->userTable."(U_name ,U_email, U_lastName, U_password, U_gender, U_dni)  VALUES(:U_name, :U_email, :U_lastName, :U_password, :U_gender, :U_dni);";

                $parameters ["U_name"]= $user->getName();
                $parameters ["U_email"]= $user->getEmail();
                $parameters ["U_lastName"]= $user->getLastName();
                $parameters ["U_password"]= $user->getPassword();
                $parameters ["U_gender"]= $user->getGender();
                $parameters ["U_dni"]= $user->getDni();
                
                $this->connection= Connection::GetInstance();
                return $this->connection->ExecuteNonQuery($sql, $parameters);
            }
            catch(Exception $ex){

                throw $ex;
            }        
        }

        public function read ($email)
        {
            $sql= "SELECT * FROM ". $this->userTable ." WHERE U_email = :email";

            $parameters["U_email"] = $email;
            
            try {
                
                $this->connection= Connection::getInstance();
                $result = $this->connection->Execute($sql, $parameters);

            }catch(Exception $ex){
                                
                throw $ex;
            }

            if(!empty($result))
            {
                return $this->mapear($result);
            }
            else
            {
                return false;
            }
        }
        
        protected function mapear($value)
        {
            $value= is_array($value) ? $value :[];
        
            $resp= array_map(function($p){
                return new User ($p ["email"],$p ["password"], $p ["name"], $p ["lastName"], $p ["gener"], $p ["dni"]
            );
            }, $value);
            return count ($resp) > 1 ? $resp : $resp['0'];
        }

        public function getAll(){}
    }
?>