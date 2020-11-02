<?php

namespace Controllers;

use DAO\GenresPDO as GenresDAO;

class GenresController
{

    private $genresDAO;

    public function __construct()
    {
        $this->genresDAO = new GenresDAO;
    }

    public function SaveAllGenres(){
        $genresList = $this->genresDAO->APItoGenresArray(); 
        var_dump($genresList);

        foreach($genresList as $genre){
            $this->genresDAO->Add($genre);
        }
    }
}

?>