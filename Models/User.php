<?php
    namespace Models;

    class User{

        private $email;
        private $password;            
        private $name;
        private $lastName;        
        private $gender;
        private $dni;

        function __construct ($email='', $password='', $name='', $lastName='', $gener='', $dni=''){

            $this->setEmail($email);
            $this->setPassword($password);
            $this->setName($name);
            $this->setLastName($lastName);
            $this->setGender($gener);
            $this->setDni($dni);
        }

        public function setEmail($email){$this->email = $email;}
        public function getEmail(){return $this->email;}

        public function setPassword($password){$this->password = $password;}
        public function getPassword(){return $this->password;}     

        public function setName($name){$this->name=$name;}
        public function getName(){return $this->name;}
        
        public function setLastName($lastName){ $this->lastName=$lastName;}
        public function getLastName(){return $this->lastName;}

        public function setGender($gender){$this->gender = $gender;}
        public function getGender(){return $this->gender;}
        
        public function setDni($dni){$this->dni=$dni;}
        public function getDni(){return $this->dni;}        
    }
?>