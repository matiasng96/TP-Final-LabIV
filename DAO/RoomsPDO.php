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

                $query = "INSERT INTO ".$this->tableName." (Id_cinema ,CinemaName, RoomName, TicketPrice, Capacity) 
                VALUES (:Id_cinema, :CinemaName, :RoomName, :TicketPrice, :Capacity);";
                
                $parameters["Id_cinema"] = $room->getIdCinema();
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

        public function viewArray($parameters)
        {
            echo('<pre>');
            var_dump($parameters);
            echo('</pre>');  
        }

        public function Delete($RoomName){

            try{

                $query = "DELETE FROM ".$this->tableName." WHERE (RoomName = :RoomName);";
                $parameters['RoomName'] = $RoomName;
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
                $query = "UPDATE ".$this->tableName.
                " SET RoomName = :RoomName, Capacity = :Capacity, TicketPrice = :TicketPrice WHERE (RoomName = :currentName);";
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
        public function getRoomsCinema($Id_cinema)
        {
            try{
                $parameters['Id_cinema'] = $Id_cinema;
                $query = "SELECT * FROM ".$this->tableName." WHERE (Id_cinema = :Id_cinema);";
                $this->connection = Connection ::GetInstance();

                $result = $this->connection->Execute($query, $parameters);
                $roomList = array();

                foreach($result as $value){

                    $aux=$this->create($value);
                    array_push($roomList, $aux);
                }
                return $roomList;
            }
            catch(Exception $ex){

                echo $ex;
            }
        }


        private function create($value)
	{
		$room = new Room();
		$room->setIdCinema($value['Id_cinema']);
		$room->setName($value['RoomName']);
		$room->setCapacity($value['Capacity']);
		$room->setTicketPrice($value['TicketPrice']);
		$room->setCinemaName($value['CinemaName']);

		return $room;
	}

        public function getAll(){  ///RETORNA TODAS LAS ROOM CORRESPONDIENTES A UNA SALA

            try{
                $roomList = array();

                $query="SELECT r.Id_cinema,r.RoomName,r.Capacity,r.TicketPrice,c.CinemaName 
                FROM rooms r INNER JOIN cinemas c ON c.Id_cinema=r.Id_cinema;";

                $this->connection = Connection::GetInstance();

                $result = $this->connection->Execute($query);

                    foreach($result as $value)
                    {
                        if(!empty($result))
                        {

                            $cinema= $this->create($value);
                            array_push($roomList, $cinema);
                        }
                    
                    }
                return $roomList;        
            }
            catch(RoomPDOException $ex){
                throw $ex;
            }
        }
    }
