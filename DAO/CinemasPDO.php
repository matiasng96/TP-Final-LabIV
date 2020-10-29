<?php
namespace DAO;

use \Exception as Exception;
use DAO\Connection as Connection;
use Models\Cinema as Cinema;

class CinemasPDO implements ICinemasDAO
{
    private $connection;
    private $tableName = "cinemas";
    
    public function Add(Cinema $cinema){
        try
        {
            $query = "INSERT INTO ".$this->tableName." (C_name, Capacity, C_address, TicketPrice) VALUES (:C_name, :Capacity, :C_address, :TicketPrice);";
            
            $parameters["C_name"] = $cinema->getName();
            $parameters["Capacity"] = $cinema->getCapacity();
            $parameters["C_address"] = $cinema->getAddress();
            $parameters["TicketPrice"] = $cinema->getTicketPrice();

            $this->connection = Connection::GetInstance();

            $this->connection->ExecuteNonQuery($query, $parameters);
        }
        catch(Exception $ex)
        {
            throw $ex;
        }


    }
    
    
    
    public function GetAll(){
        
        try
        {
            $query = "SELECT * FROM ".$this->tableName;
            

        }
        catch(Exception $ex)
        {
            throw $ex;
        }






    } //from DataBase 






}