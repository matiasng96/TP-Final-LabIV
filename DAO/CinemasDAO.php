<?php
// <!-- Al igual que el MoviesDAO va a tener los métodos encargados de traer y guardar los datos del JSON. -->
// <!-- Va a implementar la Interfaz ICinemasDAO.php -->

namespace DAO;

use Models\Cinema;

class CinemasDAO implements ICinemasDAO
{
    private $cinemasList = array();
    
    public function Add(Cinema $cinema)
    {
        
    }

    public function GetAll()
    {
        
    }



}
?>