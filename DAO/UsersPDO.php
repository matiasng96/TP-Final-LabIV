<?php
    namespace DAO;

    use DAO\IUserDAO as IuserDAO;
    use Models\User as User;
    use DAO\Connection as Connection;
    use \PDOException as PDOException;

    class UsersPDO implements IuserDAO
    {
        private $connection;
        private $userTable = "users";
        
        public function Add (User $user)
        {
        
            try
            {
                $sql = "INSERT INTO ".$this->userTable.
                "(UserName, UserEmail, UserLastName ,UserPassword ,UserGender , UserDni, Id_userRole) 
                VALUES(:UserName, :UserEmail, :UserLastName, :UserPassword, :UserGender, :UserDni , :Id_userRole);";

                $parameters ["UserName"]= $user->getName();
                $parameters ["UserEmail"]= $user->getEmail();
                $parameters ["UserLastName"]= $user->getLastName();
                $parameters ["UserPassword"]= $user->getPassword();
                $parameters ["UserGender"]= $user->getGender();
                $parameters ["UserDni"]= $user->getDni();
                $parameters["Id_userRole"]= $user->getUserRoleId();


                /*echo('<pre>');
                var_dump($parameters);
                echo('</pre>');
                */
                $this->connection= Connection::GetInstance();
                return $this->connection->ExecuteNonQuery($sql, $parameters);
            }
            catch(PDOException $ex){

                throw $ex;
            }        
        }

        public function read ($UserEmail)
        {
            try
            {
                
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

            }catch(PDOException $ex){
                                
                throw $ex;
            }
        }

    ///FUNCION QUE RETORNA LA LISTA DE USERS, NECESARIA PARA AGREGAR ROL A LOS USUARIOS
        public function checkUserList()
        {
            try
            {
                $query = "SELECT COUNT(*) as quantity FROM " . $this->userTable ;

                $this->connection = Connection::getInstance();

                $resultSet = $this->connection->execute($query);

            }
            catch (PDOException $e)
            {
            throw $e;
            }
        
            return $resultSet[0]['quantity'];
        } 

        public function getAll(){}
    }
?>