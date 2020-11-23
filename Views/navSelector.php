<?php
 $rol=0;
    if(isset($_SESSION['userLogedIn'])){
    $rol = $_SESSION['userLogedIn']->getUserRoleId();
    switch($rol){
         case 1: require_once(VIEWS_PATH."nav-admin.php"); break;
         case 2: require_once(VIEWS_PATH."nav-logged.php"); break;
    }  
}      
else{
    require_once(VIEWS_PATH."nav-notLogged.php");
}      
?>