<?php
    namespace Models;

    class Rol
    {
        private $id;
        private $rol;

        function __construct($rol)
        {
            $this->setRol($rol);
        }
         //////////////////////////////// SETTERS ///////////////////////////////

        public function setRol($d)
        {
            $this->rol = $d;
        }
        public function setId($id)
        {
            $this->id= $id;
        }
          //////////////////////////////// GETTERS ///////////////////////////////

        public function getRol()
        {
            return (string)$this->rol;
        }
        
        public function getId()
        {
            return $this->id;
        }



    }

?>