<?php

namespace Controllers;

use DAO\GenresPDO as GenresDAO;
use PDOException as Exception;

class GenresController
{

    private $genresDAO;

    public function __construct()
    {
        $this->genresDAO = new GenresDAO;
    }

    public function SaveAllGenres()
    {
        try {
            $genresList = $this->genresDAO->APItoGenresArray();

            foreach ($genresList as $genre) {
                $this->genresDAO->Add($genre);
            }
        } catch (Exception $ex) {

            //$error = $ex->getMessage();
            echo $ex->getMessage();
        }
    }
}
?>