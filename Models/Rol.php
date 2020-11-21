<?php
    namespace Models;

    class Rol{

        private $id;
        private $rol;

        function __construct($rol = ''){$this->setRol($rol);}
      
        public function setRol($rol){$this->rol = $rol;}
        public function getRol(){return (string)$this->rol;} 

        public function setId($id){$this->id= $id;}             
        public function getId(){return $this->id;}
    }
?>