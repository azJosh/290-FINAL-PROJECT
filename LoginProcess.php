<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require('functions.php');
session_start();

$mysqli = new mysqli('oniddb.cws.oregonstate.edu', 'peeplesj-db', 'jhNqh46GyMrkQZuS', 'peeplesj-db');
if($mysqli->connect_error){
    echo "Failed to connect to MySQL: (".$mysqli->connect_errno.
    ") ".$mysqli->connect_error;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Lookup Book</title>
</head>
<body>

<?php
}
/*
if (array_key_exists('username', $_POST)) {
        $username = $_POST['username'];
        $password = $_POST['password'];
    } */
 
if (isset($_POST['username'], $_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
 
    if( empty($username) || empty($password)){
    echo "Please enter a username and password. click <a href='login.php'>here</a> to return to the log in screen.";
    } else{

        if (login($username, $password, $mysqli) == true) {
            header('Location: example.php');
            //header('Location: ../protected_page.php');
         }else {
           echo "Username and/or password were not found. Please check your username and password and try again. click <a href='login.php'>here</a> to return to the log in screen.";
        }
    } 
} else{
    echo "Please enter a username and password. click <a href='login.php'>here</a> to return to the log in screen.";
}

?>
 </body>
</html>