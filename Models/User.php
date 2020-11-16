<?php
    namespace Models;
    use Models\Rol as Rol;

    class User{
       
        private $name;
        private $lastName;
        private $gender;
        private $dni;        
        private $email;
        private $password;
        private $rol;


        function __construct ($name='', $lastName='', $gender='', $dni='', $email='', $password=''){

            $this->setName($name);
            $this->setLastName($lastName);
            $this->setGender($gender);
            $this->setDni($dni);           
            $this->setEmail($email);
            $this->setPassword($password);
        }
        
        public function setLastName($lastName){$this->lastName = $lastName;}
        public function getLastName(){return $this->lastName;}
        
        public function setName($name){$this->name = $name;}
        public function getName(){return $this->name;}

        public function setEmail($email){$this->email = $email;}
        public function getEmail(){return $this->email;}

        public function setPassword($password){$this->password = $password;}
        public function getPassword(){return $this->password;}      

        public function setDni($dni){ $this->dni = $dni;}
        public function getDni(){ return $this->dni;}

        public function setGender($gender){$this->gender = $gender;}
        public function getGender(){return $this->gender;}
        
        public function setUserRole(Rol $rol) {$this->rol = $rol;}
        public function getUserRole(){return $this->rol;}       
    
        public function getUserRoleId() {
            $rol = $this->rol;
            $id = $rol->getId();
            return $id;
        }
    
        public function getUserRoleDescription() {
            $rol = $this->rol;
            $descripcion = $rol->getRol();
            return $descripcion;
        }        
    }
?>