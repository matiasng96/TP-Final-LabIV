<?php

namespace Models;

class User
{

    private $nombre;
    private $apellido;
    private $dni;

        function __construct ()
        {
         $this->nombre = null;
         $this->apellido = null;
         $this->dni = null;

        }

        /////////////////////// SETTERS //////////////////////

        public function setApellido($a)
        {
                $this->apellido=$a;
        }

        public function setNombre($a)
        {
                $this->nombre=$a;
        }

        public function setDni($a)
        {
                $this->dni=$a;
        }

        /////////////////// GETTERS //////////////////////////

        public function getApellido()
        {
                return $this->apellido;
        }

        public function getNombre()
        {
                return $this->nombre;
        }

        public function getDni()
        {
                return $this->dni;
        }

        
}
?>