<?php
    namespace DAO;
    use Models\Room as Room;
    use Models\Cinema as Cinema;
    use DAO\CinemasPDO as CinemasPDO;
    use DAO\Connection as Connection;
    use Exception as RoomPDOException;
use FFI\Exception;

class RoomsPDO implements IRoomsPDO{

        private $connection;
        private $tableName = "rooms";

        public function Add(Room $room)
        {
            try {

                $query = "INSERT INTO ".$this->tableName." (CinemaName, RoomName, TicketPrice, Capacity) 
                VALUES (:CinemaName, :RoomName, :TicketPrice, :Capacity);";

                $parameters["CinemaName"] = $room->getCinemaName();
                $parameters["RoomName"] = $room->getName();
                $parameters["TicketPrice"] = $room->getTicketPrice();
                $parameters["Capacity"] = $room->getCapacity();
                
                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query, $parameters);
            } 
            catch(RoomPDOException $ex) {
                throw $ex;
            }
        }

        public function Delete($room){

            try{

                $query = "DELETE FROM".$this->tableName."WHERE (RoomName = :RoomName);";
                $parameters['RoomName'] = $room;
                $this->connection = Connection::GetInstance();
                $deletedCount = $this->connection->ExecuteNonQuery($query, $parameters);
                return $deletedCount;
            }
            catch(RoomPDOException $ex){

                throw $ex;
            }
        }

        public function Edit($currentName, Room $newRoom){

            try{
                $query = "UPDATE".$this->tableName.
                "SET RoomName = :RoomName, Capacity = :Capacity, TicketPrice = :TicketPrice WHERE (RoomName = :currentName);";

                $parameters['RoomName'] = $newRoom->getName();
                $parameters['TicketPrice'] = $newRoom->getTicketPrice();
                $parameters['Capacity'] = $newRoom->getCapacity();
                $parameters['currentName'] = $currentName;

                $this->connection = Connection ::GetInstance();

                $deletedCount = $this->connection->ExecuteNonQuery($query, $parameters);
                return $deletedCount;
            
            }catch(RoomPDOException $ex){

                throw $ex;
            }
        }


        public function getRoomsCinema($cinemaName){

            try{
                $parameters['CinemaName'] = $cinemaName;
                $query = "SELECT * FROM ".$this->tableName." WHERE (CinemaName = :cinemaName);";
                $this->connection = Connection ::GetInstance();

                $result = $this->connection->Execute($query, $parameters);
                $roomList = array();

                foreach($result as $value){

                    $room = new Room();
                    $room->setCinemaName($value['CinemaName']);
                    $room->setName($value['RoomName']);
                    $room->setTicketPrice($value['TicketPrice']);
                    $room->setCapacity($value['Capacity']);

                    array_push($roomList, $room);
                }
                return $roomList;
            }
            catch(Exception $ex){

                echo $ex;
            }
        }

        public function getAll(){

            try{
                
                $roomList = array();
                $query = "SELECT * FROM ".$this->tableName;
                $this->connection = Connection::GetInstance();
                $roomsResults = $this->connection->Execute($query);

                //echo '<pre>' , var_dump($roomsResults) , '</pre>';               

                $cinemaPDO = new CinemasPDO();
                

                foreach($roomsResults as $row){

                    //echo "<br>PRIMER FOREACH";

                    foreach($row as $room){
                        
                        $room = new Room();                                              
                        //$cinema = $$cinemaPDO->getOneCinema($row["CinemaName"]);
                        //$room->setCinemaName($cinema->getName());
                        $room->setCinemaName($cinemaPDO->getOneCinema($row["CinemaName"]));
                        $room->setName($row['RoomName']);
                        $room->setTicketPrice($row['TicketPrice']);
                        $room->setCapacity($row['Capacity']);
                    }
                    
                       
                    array_push($roomList, $room);
                }
                return $roomList;        
            }
            catch(RoomPDOException $ex){
                throw $ex;
            }
        }
    }
?>