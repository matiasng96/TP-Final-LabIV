<?php namespace Config;

    define("ROOT", dirname(__DIR__) . "/");
    //ROOT del Proyecto LOCAL
    define("FRONT_ROOT", "/TP-Final-LabIV/");
    //define("FRONT_ROOT", "/TPFinal/MoviePass/");
    //Vistas , CSS y JS
    define("VIEWS_PATH", "Views/");
    define("CSS_PATH", FRONT_ROOT.VIEWS_PATH . "css/");
    define("JS_PATH", FRONT_ROOT.VIEWS_PATH . "js/");
    //Constante API
    define("API_PATH_NOW", "https://api.themoviedb.org/3/movie/now_playing?api_key=4041fc4595ac01692342a78793dba935&language=en-US&page=1");
    define("API_PATH_GENRES","https://api.themoviedb.org/3/genre/movie/list?api_key=4041fc4595ac01692342a78793dba935&language=en-US");
    define("API_GET_DETAILS", "https://api.themoviedb.org/3/movie/{movie_id}?api_key=4041fc4595ac01692342a78793dba935&language=en-US");
    //Constantes para la Base de datos
    define("DB_HOST", "localhost");
    define("DB_NAME", "Moviepass");
    define("DB_USER", "root");
    define("DB_PASS", "");
?>
