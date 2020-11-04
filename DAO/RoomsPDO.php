<?php
    namespace DAO;
    use Models\Room as Room;
    use DAO\Connection as Connection;
    use \Exception as Exception;

    class RoomsPDO implements IRoomsPDO{

        private $connection;
        private $tableName = "rooms";

        public function Add(Room $room)
        {
            try {
                $query = "INSERT INTO " . $this->tableName . " (RoomName, TicketPrice, Capacity) VALUES (:RoomName, :TicketPrice, :Capacity);";

                $parameters["RoomName"] = $room->getName();
                $parameters["TicketPrice"] = $room->getTicketPrice();
                $parameters["Capacity"] = $room->getCapacity();
                
                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query, $parameters);

            } catch (Exception $ex) {
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
            }catch(Exception $ex){

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
            
            }catch(Exception $ex){

                throw $ex;
            }
        }

        public function getAll(){

            try{
                
                $roomList = array();
                $query = "SELECT * FROM".$this->tableName;
                $this->connection = Connection::GetInstance();
                $roomsResults = $this->connection->Execute($query);

                foreach($roomsResults as $row){

                    $room = new Room();
                    $room->setName($row['RoomName']);
                    $room->setTicketPrice($row['TicketPrice']);
                    $room->setCapacity($row['Capacity']);

                    array_push($roomList, $room);
                }
                return $roomList;
            
            }catch(Exception $ex){

                throw $ex;
            }
        }
    }
?>