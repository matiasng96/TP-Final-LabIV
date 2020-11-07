<?php

namespace DAO;

use \PDOException as Exception;
use DAO\Connection as Connection;
use Models\Cinema as Cinema;

class CinemasPDO implements ICinemasDAO
{
    private $connection;
    private $tableName = "cinemas";

    public function Add(Cinema $cinema)
    {
        try {
            $query = "INSERT INTO " . $this->tableName . " (CinemaName, TotalCapacity, CinemaAddress) VALUES (:CinemaName, :TotalCapacity, :CinemaAddress);";

            $parameters["CinemaName"] = $cinema->getName();
            $parameters["TotalCapacity"] = $cinema->getTotalCapacity();
            $parameters["CinemaAddress"] = $cinema->getAddress();
            

            $this->connection = Connection::GetInstance();

            $this->connection->ExecuteNonQuery($query, $parameters);
        } catch (Exception $ex) {
            throw $ex;
        }
    }


    //Si encuentra al Cine retorna True sino False, se usa en al controladora para validar que no se repita el nombre de Cine.
    public function SearchCinemaByName($CinemaName)
    {
        try {

            $query = "SELECT * FROM " . $this->tableName . " WHERE (CinemaName = :CinemaName);";

            $parameters['CinemaName'] = $CinemaName;

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
            " SET CinemaName = :CinemaName , TotalCapacity = :TotalCapacity, CinemaAddress = :CinemaAddress WHERE (CinemaName = :currentName);";

            $parameters["CinemaName"] = $newCinema->getName();
            $parameters["TotalCapacity"] = $newCinema->getTotalCapacity();
            $parameters["CinemaAddress"] = $newCinema->getAddress();
            $parameters["currentName"] = $currentName;

            $this->connection = Connection::GetInstance();

            $deletedCount = $this->connection->ExecuteNonQuery($query, $parameters);

            return $deletedCount;

        } catch (Exception $ex) {

            throw $ex;
        }
    }

    public function Delete($CinemaName)
    {
        try {

            $query = "DELETE FROM  " . $this->tableName . " WHERE (CinemaName = :CinemaName);";

            $parameters['CinemaName'] = $CinemaName;

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
                $cinema->setName($row['CinemaName']);
                $cinema->setTotalCapacity($row['TotalCapacity']);
                $cinema->setAddress($row['CinemaAddress']);

                array_push($cinemasList, $cinema);
            }

            return $cinemasList;

        } catch (Exception $ex) {

            throw $ex;
        }
    }
}
