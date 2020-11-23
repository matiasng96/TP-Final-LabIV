<?php
namespace DAO;

use \PDOException as Exception;
use Models\Showtime as Showtime;
use DAO\Connection as Connection;




 class ShowingPDO {

    private $connection;
    private $tableName = "showtime";


    
    public function Add(Showtime $showtime, $Id_room, $Id_movie)
    {
        try {
            
            $query = "INSERT INTO " . $this->tableName . " (Date_showing, Time_showing, Tickets, Id_room, Id_movie, Is_available) 
            VALUES (:Date_showing, :Time_showing, :Tickets, :Id_room, :Id_movie, :Is_available);";

            $parameters["Date_showtime"] = $showtime->getDate();
            $parameters["Time_showtime"] = $showtime->getTime();
            $parameters["Tickets"] = $showtime->getTickets();
            $parameters["Id_room"] = $Id_room;           
            $parameters["Id_movie"] = $Id_movie;           
            $parameters["Is_available"] = 0;
            $this->connection = Connection::GetInstance();
            $this->connection->ExecuteNonQuery($query, $parameters);
        } 
        catch(Exception $ex) {
            throw $ex;
        }
    }
 

    private function read($row) {
        $showtime = new Showtime();

        $showtime->setId($row["Id_showtime"]);
        $showtime->setTime($row["Time_showtime"]);
        $showtime->setDate($row["Date_showtime"]);
        $showtime->setTickets($row["Tickets"]);
        $showtime->setMovie($row["Id_movie"]);
        $showtime->setRoom($row["Id_room"]);
        $showtime->setIsAvailable($row["Is_available"]);

        return $showtime;
    }

    public function viewArray($value)
    {
        echo('<pre>');
        var_dump($value);
        echo('</pre>');
    }

    public function getAll()
    {
        $showtimeList= array();

        $query= "SELECT * FROM ". $this->tableName;

        $this->connection = Connection::GetInstance();

        $result= $this->connection->Execute($query);

        foreach ($result as $value) {
            $showtime = $this->read($value);

            $idMovie = $value["Id_movie"];
            $idRoom = $value["Id_room"];
            $roomDao = new RoomsPDO();
            $room= $roomDao->getOneRoom($idRoom);//TRAIGO LA ROOM CORRESPONDIENTE AL ID
            $movieDao= new MoviesPDO();
            $movie= $movieDao->GetOne($idMovie); //TRAIGO LA MOVIE CORRSPONDIENTE AL ID 
            //$this->viewArray($movie);

            $showtime->setMovie($movie);
            $showtime->setRoom($room);
            array_push($showtimeList, $showtime);
        }

        return $showtimeList;
    }
}




?>