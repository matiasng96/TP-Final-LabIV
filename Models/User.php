<?php
    namespace Models;

    class User{
       
        private $id;
        private $email;
        private $password;            
        private $name;
        private $lastName;        
        private $gender;
        private $dni;
        private $admin;

        function __construct ($id = '', $email='', $password='', $name='', $lastName='', $gender='', $dni=''){

            $this->setId($id);
            $this->setEmail($email);
            $this->setPassword($password);
            $this->setName($name);
            $this->setLastName($lastName);
            $this->setGender($gender);
            $this->setDni($dni);
            $this->setAdmin();
        }
        public function setAdmin(){$this->admin = false;}
        public function getAdmin(){return $this->admin;}

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

        public function getId(){return $this->id;}
        public function setId($id){$this->id = $id;}
    }
