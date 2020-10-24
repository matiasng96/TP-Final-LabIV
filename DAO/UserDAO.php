<?php
    namespace DAO;

    use DAO\IUserDAO as IUserDAO;
    use Models\User;

    class UserDAO implements IUserDAO{

        private $userList;
        private $fileName = "Data/users.json";

        public function __construct(){

          
        }

        public function Add(User $newUser){

            $this->retrieveData();
            array_push($this->userList, $newUser);
            $this->saveData();
        }

        public function getAll(){

            $this->retrieveData();
            return $this->userList;
        }

        public function saveData(){

        }

        public function retrieveData(){

            $this->userList = array();

        }

    }
?>