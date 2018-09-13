<?php
session_start();
include 'connect.php';

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM client_info WHERE username = '$username' AND password = '$password'"; 
$result = mysqli_query($db_connect, $sql);

if(!$row = mysqli_fetch_assoc($result)){
    $msg = "Invalid Login";    
} else {
    $_SESSION['id'] = $row['client_ID'];
    echo $_SESSION['id'];   
}
header("Location: index.php"); 
?>