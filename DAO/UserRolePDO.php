<?php
    namespace DAO;

    use Models\Rol as Rol;
    use PDOException as PDOException;
    use DAO\Connection as Connection;


    class UserRolePDO 
    {
        private $connection;


        private function read($row) {
            $userRole = new Rol($row["RoleDescrip"]);
            $userRole->setId($row["Id_role"]);
            return $userRole;
        }
    
        public function retrieveAll() {
            $userRoleList = array();
    
            try
            {
                $sql = "SELECT * FROM userRole;";
                $this->connection = Connection::getInstance();
    
                $resultSet = $this->connection->Execute($sql);
                
                //SI LA VARIABLE NO ESTA VACIA, SETTEA LOS ROLES Y LOS CARGA A UN ARREGLO 
                if(!empty($resultSet)) {
                    foreach ($resultSet as $row) {
                        $userRole = $this->read($row);
                        array_push($userRoleList, $userRole);
                    }
                }
            }
            catch (PDOException $ex)
            {
                throw $ex;
            }
            
            return $userRoleList;
        }
    


    }


?>