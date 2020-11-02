<?php

namespace DAO;
use Models\Room;
use \Exception as Exception;

class RoomPDO {

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

}

?>