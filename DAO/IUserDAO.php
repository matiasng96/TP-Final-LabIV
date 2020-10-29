<?php
    namespace DAO;

    use Models\User;

    interface IUserDAO{

        function getAll();
        function Add(User $newUser);        
    }
?>