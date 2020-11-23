<?php
    namespace Controllers;

use Exception;

class HomeController
    {
        public function Index($message = "")
        {
            require_once(VIEWS_PATH."login.php");
        }        
    }
?>