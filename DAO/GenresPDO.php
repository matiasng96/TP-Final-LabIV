<?php
namespace DAO;
use \Exception as Exception;

class GenresPDO {

    //Hay que traer los Géneros de la API, en la clase Movies hay un arreglo de géneros que tiene las IDS de cada uno. Entonces para poder usarlos
    //hay que traerlos de la API y cargarlos en la Base de Datos. Osea que tendriamos la tabla de generos con su nombre y ID para despues relacionarlos
    // con la tabla de peliculas.

    public function GetGenresAPI(){
            
        $url = API_PATH_GENRES;
        $json = file_get_contents($url);
        $json_data = json_decode($json,true);
        
        return $json_data;
    }

}


?>