<?php

namespace DAO;

use \Exception as Exception;
use DAO\Connection as Connection;
use Models\Cinema as Cinema;

class CinemasPDO implements ICinemasDAO
{
    private $connection;
    private $tableName = "cinemas";

    public function Add(Cinema $cinema)
    {
        try {
            $query = "INSERT INTO " . $this->tableName . " (C_name, Capacity, C_address, TicketPrice) VALUES (:C_name, :Capacity, :C_address, :TicketPrice);";

            $parameters["C_name"] = $cinema->getName();
            $parameters["Capacity"] = $cinema->getCapacity();
            $parameters["C_address"] = $cinema->getAddress();
            $parameters["TicketPrice"] = $cinema->getTicketPrice();

            $this->connection = Connection::GetInstance();

            $this->connection->ExecuteNonQuery($query, $parameters);
        } catch (Exception $ex) {
            throw $ex;
        }
    }


    //Si encuentra al Cine retorna True sino False, se usa en al controladora para validar que no se repita el nombre de Cine.
    public function SearchCinemaByName($C_Name)
    {
        try {

            $query = "SELECT * FROM " . $this->tableName . " WHERE (C_name = :C_name);";

            $parameters['C_name'] = $C_Name;

            $this->connection = Connection::GetInstance();

            $cinemaResults = $this->connection->Execute($query, $parameters);

            if (!empty($cinemaResults)) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function Edit($currentName, Cinema $newCinema)
    {
        try {

            $query = "UPDATE " . $this->tableName . 
            " SET C_name=:C_name , Capacity=:Capacity, C_address=:C_address, TicketPrice=:TicketPrice WHERE (C_name=:currentName);";

            $parameters["C_name"] = $newCinema->getName();
            $parameters["Capacity"] = $newCinema->getCapacity();
            $parameters["C_address"] = $newCinema->getAddress();
            $parameters["TicketPrice"] = $newCinema->getTicketPrice();
            $parameters["currentName"] = $currentName;

            $this->connection = Connection::GetInstance();

            $deletedCount = $this->connection->ExecuteNonQuery($query, $parameters);

            return $deletedCount;
        } catch (Exception $ex) {

            throw $ex;
        }
    }


    public function Delete($C_Name)
    {
        try {

            $query = "DELETE FROM  " . $this->tableName . " WHERE (C_name = :C_name);";

            $parameters['C_name'] = $C_Name;

            $this->connection = Connection::GetInstance();

            $deletedCount = $this->connection->ExecuteNonQuery($query, $parameters);

            return $deletedCount;
        } catch (Exception $ex) {

            throw $ex;
        }
    }

    public function GetAll()
    {
        try {
            //Creo un arreglo de cines.

            $cinemasList = array();

            //Creo una query Seleccionando todos lso cines de la tabla Cinemas.

            $query = "SELECT * FROM " . $this->tableName;

            //Creo una instancia de Connection.

            $this->connection = Connection::GetInstance();

            //Guardo los cines que provienen de la Base de Datos, está acción la realiza el execute, que a su vez llama al fetchAll()

            $cinemasResults = $this->connection->Execute($query);

            //Recorro el arreglo de Cines(dela base de datos) y tomo los datos de cada fila para crear un objeto Cinema y guardo cada objeto en $cinemasList.

            foreach ($cinemasResults as $row) {
                $cinema = new Cinema();
                $cinema->setName($row["C_name"]);
                $cinema->setCapacity($row["Capacity"]);
                $cinema->setAddress($row["C_address"]);
                $cinema->setTicketPrice($row["TicketPrice"]);

                array_push($cinemasList, $cinema);
            }

            return $cinemasList;
        } catch (Exception $ex) {

            throw $ex;
        }
    }
}
