<?php
namespace DAO;
use \Exception as Exception;

class GenresPDO {

    public function GetGenresAPI(){
            
        $url = API_PATH_GENRES;
        $json = file_get_contents($url);
        $json_data = json_decode($json,true);
        
        return $json_data;
    }

}


?>