<?php namespace Config;

    define("ROOT", dirname(__DIR__) . "/");
    //Path to your project's root folder
    define("FRONT_ROOT", "/TP-Final-LabIV/");
    //define("FRONT_ROOT", "/TPFinal/MoviePass/");
    define("VIEWS_PATH", "Views/");
    define("CSS_PATH", FRONT_ROOT.VIEWS_PATH . "css/");
    define("JS_PATH", FRONT_ROOT.VIEWS_PATH . "js/");
    define("API_PATH", "https://api.themoviedb.org/3/movie/now_playing?api_key=4041fc4595ac01692342a78793dba935&language=en-US&page=1");
?>