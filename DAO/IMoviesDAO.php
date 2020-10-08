<?php
     namespace DAO;

     use Models\Movie as Movie;

     interface IMoviesDAO
     {
          function Add(Movie $movie);
          function GetAll(); //from JSON
  
     }
        
?>