<?php

    namespace DAO;

    use DAO\IMoviesDAO as IMoviesDAO;
    use Models\Movie as Movie;
    use \Exception as Exception;

    class MoviesPDO implements IMoviesDAO
    {
        private $moviesList = array();
        private $connection;
        private $tableName= "movies";

        public function Add(Movie $movie)
        {
            try{
            $sql= "INSERT INTO ". $this->tableName. "(Id_movie, Poster_path, Title) 
                                                    VALUE (:id, :poster_path, :title);";
                                                    
            $parameters["id"]= $movie->getId(); 
            $parameter["genero"]= 
            $parameters["poster_path"]= $movie->getPoster_path();
            $parameters["title"]= $movie->getTitle();

            $this->connection = Connection :: GetInstance();

            $this->connection->ExecuteNonQuery($sql , $parameters);
            
            }catch(Exception $ex){
                throw $ex;
            }
        }

        



        public function GetAll()
        {
            try{
            $sql= "SELECT * FROM ".$this->tableName.";";
                        
                $this->connection= Connection::getInstance();
                $result = $this->connection->Execute($sql);
               
                
                foreach ($result as $value)
                {
                    $movie = new Movie();
                    $movie->setId($value["Id_movie"]);
                    $movie->setPoster_path($value["Poster_path"]);
                    $movie->setTitle($value["Title"]);

                    array_push($this->moviesList, $movie);

                }

                return $this->moviesList;

            }catch(Exception $ex){
                                
                throw $ex;
            }

        }

        public function GetNowPlayingAPI(){
            
            $url = API_PATH_NOW;
            $json = file_get_contents($url);
            $json_data = json_decode($json,true);
            
            return $json_data;
        }

        public function delete($id){
            
        }

        public function APItoMoviesArray(){

            $nowPlayingArray = $this->GetNowPlayingAPI();
            $moviesArray = array();
        
            foreach($nowPlayingArray["results"] as $data){
            
                $movie = new Movie();
                $movie->setPoster_path($data['poster_path']);
                $movie->setId($data['id']);
               // $movie->setGenre_ids($data['genre_ids']);
                $movie->setTitle($data['title']);
            
                array_push($moviesArray, $movie);
            };
            
            return $moviesArray;
        }


}
?>