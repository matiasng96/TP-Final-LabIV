<?php
    namespace Models;

    class User{

        private $user;
        private $password;    
        private $id;
        private $nombre;
        private $apellido;
        private $genero;
        private $dni;

        function __construct ($user='', $password='', $id='', $nombre='', $apellido='', $dni=''){

            $this->setUser($user);
            $this->setPassword($password);
            $this->setId($id);
            $this->setNombre($nombre);
            $this->setApellido($apellido);
            $this->setDni($dni);
        }

        public function setUser($user){$this->user = $user;}
        public function getUser(){return $this->user;}

        public function setPassword($password){$this->password = $password;}
        public function getPassword(){return $this->password;}

        public function setId($id){$this->id = $id;}
        public function getId(){return $this->id;}

        public function setApellido($a){ $this->apellido=$a;}
        public function getApellido(){return $this->apellido;}

        public function setNombre($a){$this->nombre=$a;}
        public function getNombre(){return $this->nombre;}

        public function setGenero($genero){$this->genero = $genero;}
        public function getGenero(){return $this->genero;}
        
        public function setDni($a){$this->dni=$a;}
        public function getDni(){return $this->dni;}        
}
?>