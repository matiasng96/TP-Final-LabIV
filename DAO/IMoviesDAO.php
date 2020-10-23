<?php
     namespace DAO;

     use Models\Movie as Movie;

     interface IMoviesDAO{
          
          public function Add(Movie $movie);
          public function GetAll(); //from JSON
          public function delete($id);
     }        
?>