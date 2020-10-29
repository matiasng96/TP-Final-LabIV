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
        
        public function Add ($user)
        {
            $sql = "INSERT INTO" .$this->userTable. "(email ,name, password, lastName,  gender, dni)  VALUES (:email, :name, :password, :lastName, :gender, :dni);";

            $parameters ["email"]= $user->getEmail();
            $parameters ["name"]= $user->getName();
            $parameters ["password"]= $user->getPassword();
            $parameters ["lastName"]= $user->getLastName();
            $parameters ["gender"]= $user->getGender();
            $parameters ["dni"]= $user->getDni();
            
            try
            {
                $this->connection= Connection::GetInstance();
                return $this->connection->ExecuteNonQuery($sql, $parameters);

            } catch (Exception $ex) {
                throw $ex;
            }
        
        }

        public function read ($email)
        {
            $sql= "SELECT * FROM users WHEARE email = :email";

            $parameters["email"] = $email;
            
            try {
                $this->connection= $connection :: getInstance();
                $result = $this->connection->Execute(sql, $parameters);

            } catch (Excepcion $ex) {
                throw $ex;
            }

            if(!empty($result))
            {
                return $this->mapear($result);
            }else
            {
                return false;
            }


        }
        
        protected function mapear($value)
        {
            $value= $is_array($value) ? $value :[];
        
            $resp= array_map(function($p){
                return new M_User ($p ["email"],$p ["password"], $p ["name"], $p ["lastName"], $p ["gener"], $p ["dni"]
            );
            }, $value);
            return count ($resp) > 1 ? $resp : $resp['0'];
        }

        public function getAll(){}
    }

?>