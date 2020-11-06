<?php
    namespace Models;

    use Models\Rol as Rol;

    class User{
       
        private $id;
        private $lastName;
        private $name;
        private $dni;
        private $gender;
        private $email;
        private $password; 

        function __construct ($id = '', $email='', $password='', $name='', $lastName='', $gender='', $dni=''){

            $this->setId($id);
            $this->setEmail($email);
            $this->setPassword($password);
            $this->setName($name);
            $this->setLastName($lastName);
            $this->setGender($gender);
            $this->setDni($dni);
        }

        public function setEmail($email){$this->email = $email;}
        public function getEmail(){return $this->email;}

        public function setPassword($password){$this->password = $password;}
        public function getPassword(){return $this->password;}      

        public function getId(){return $this->id;}
        public function setId($id){$this->id = $id;}

        public function setLastName($a)
        {
            $this->lastName = $a;
        }

        public function setName($n)
        {
            $this->name = $n;
        }
        
        public function setDni($d)
        {
            $this->dni = $d;
        }

        public function setGender($gender)
        {
            $this->gender = $gender;
        }

        public function getLastName()
        {
            return $this->lastName;
        }

        public function getName()
        {
            return $this->name;
        }
        
        public function getDni()
        {
            return $this->dni;
        }

        public function getGender()
        {
            return $this->gender;
        }

        public function setUserRole(Rol $userRole) {
            $this->userRole = $userRole;
        }
    
        public function getUserRoleId() {
            $userRole = $this->userRole;
            $id = $userRole->getId();
            return $id;
        }
    
        public function getUserRoleDescription() {
            $userRole = $this->userRole;
            $descripcion = $userRole->getRol();
            return $descripcion;
        }
        
    }
