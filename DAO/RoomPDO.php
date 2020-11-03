<?php
    namespace DAO;
    use Models\Room as Room;
    use \Exception as Exception;

    class RoomPDO {

        private $connection;
        private $tableName = "rooms";


        public function Add(Room $room)
        {
            try {
                $query = "INSERT INTO " . $this->tableName . " (R_name, TicketPrice, Capacity) VALUES (:R_name, :TicketPrice, :Capacity);";

                $parameters["R_name"] = $room->getName();
                $parameters["TicketPrice"] = $room->getTicketPrice();
                $parameters["Capacity"] = $room->getCapacity();
                
                $this->connection = Connection::GetInstance();

                $this->connection->ExecuteNonQuery($query, $parameters);

            } catch (Exception $ex) {
                throw $ex;
            }
        }
    }
?>