<?php
    namespace Models;

    class User{

        private $email;
        private $password;    
        private $id;
        private $name;
        private $lastName;
        private $gender;
        private $dni;

        function __construct ($email='', $password='', $id='', $name='', $lastName='', $gener='', $dni=''){

            $this->setUser($email);
            $this->setPassword($password);
            $this->setId($id);
            $this->setName($name);
            $this->setLastName($lastName);
            $this->setGender($gener);
            $this->setDni($dni);
        }

        public function setUser($email){$this->email = $email;}
        public function getUser(){return $this->email;}

        public function setPassword($password){$this->password = $password;}
        public function getPassword(){return $this->password;}

        public function setId($id){$this->id = $id;}
        public function getId(){return $this->id;}

        public function setLastName($a){ $this->lastName=$a;}
        public function getLastName(){return $this->lastName;}

        public function setName($a){$this->name=$a;}
        public function getName(){return $this->name;}

        public function setGender($gender){$this->gender = $gender;}
        public function getGender(){return $this->gender;}
        
        public function setDni($dni){$this->dni=$dni;}
        public function getDni(){return $this->dni;}        
}
?>