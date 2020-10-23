<?php
     namespace DAO;

     use Models\Cinema as Cinema;

     interface ICinemasDAO
     {
          function Add(Cinema $cinema);
          function GetAll(); //from JSON  
     }        
?>