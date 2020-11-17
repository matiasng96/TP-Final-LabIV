<?php
namespace DAO;

use \PDOException as Exception;
use Models\Showing as Showing;
use DAO\Connection as Connection;




 class ShowingPDO {

    private $connection;
    private $tableName = "showing";


    
    public function Add(Showing $showing, $Id_room, $Id_movie)
    {
        try {
            
            $query = "INSERT INTO " . $this->tableName . " (Date_showing, Time_showing, Id_room, Id_movie) 
            VALUES (:Date_showing, :Time_showing, :Id_room, :Id_movie);";

            $parameters["Date_showing"] = $showing->getDate();
            $parameters["Time_showing"] = $showing->getTime();
            $parameters["Id_room"] = $Id_room;           
            $parameters["Id_movie"] = $Id_movie;           

            $this->connection = Connection::GetInstance();
            $this->connection->ExecuteNonQuery($query, $parameters);
        } 
        catch(Exception $ex) {
            throw $ex;
        }
    }

   






 }




?>