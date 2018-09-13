<?php
    $user = "root";
    $pass = "";
    $db = "fishing_unlimited";    
    $db_connect = new mysqli('localhost', $user, $pass, $db);

    if(!$db_connect){
        die("Connection failed: ".mysqli_connect_error());
       }
?>