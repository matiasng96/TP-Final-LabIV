<?php
    namespace DAO;
    use DAO\IUserDAO as IUserDAO;
    use Models\User as User;

    class UserDAO implements IUserDAO{

        private $userList; 
        private $fileName;

        public function __construct(){

            $this->fileName = "Data/users.json";
            $this->userList = array();
        }

        public function Add(User $newUser){

            $this->retrieveData();
            $newUser->setId($this->getNextId());
            array_push($this->userList, $newUser);
            $this->saveData($this->userList);
        }

        public function getNextId(){

            $id = 0;
            foreach($this->userList as $user){

                $id = ($user->getId() > $id)? $user->getId() : $id;
            }
            return $id+1;
        }

        public function getAll(){

            $this->retrieveData();
            return $this->userList;
        }

        public function saveData($userList){

            $arrayToEncode = array();

            foreach($userList as $user){

                $valueArray['email'] = $user->getEmail();
                $valueArray['password'] = $user->getPassword();
                $valueArray['id'] = $user->getId();
                $valueArray['name'] = $user->getName();
                $valueArray['lastName'] = $user->getLastName();
                $valueArray['gender'] = $user->getGender();
                $valueArray['dni'] = $user->getDni();

                array_push($arrayToEncode, $valueArray);
            }

            $jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);
            file_put_contents($this->fileName, $jsonContent);
        }

        public function retrieveData(){

            $this->userList = array();

            if(file_exists($this->fileName)){

                $jsonContent = file_get_contents($this->fileName);

                $arrayToDecode = ($jsonContent)? json_decode($jsonContent, true) : array();

                foreach($arrayToDecode as $valueArray){

                    $user = new User();
                    $user->setEmail($valueArray['email']);
                    $user->setPassword($valueArray['password']);
                    $user->setId($valueArray['id']);
                    $user->setName($valueArray['name']);
                    $user->setLastName($valueArray['lastName']);
                    $user->setGender($valueArray['gender']);
                    $user->setDni($valueArray['dni']);

                    array_push($this->userList, $user);
                }
            }
        }
    }
?>