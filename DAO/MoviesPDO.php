<?php

    namespace DAO;

    use DAO\IMoviesDAO as IMoviesDAO;
    use Models\Movie as Movie;

    class MoviesPDO implements IMoviesDAO
    {
        private $moviesList = array();

        public function Add(Movie $movie)
        {

          
        }


        public function GetAll()
        {

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
                $movie->setGenre_ids($data['genre_ids']);
                $movie->setTitle($data['title']);
            
                array_push($moviesArray, $movie);
            };

        
            
            return $moviesArray;
        }


        public function SaveData($moviesList)
        {
          
        }

}
?>