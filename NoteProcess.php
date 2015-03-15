<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require('functions.php');
session_start();

$mysqli = new mysqli('oniddb.cws.oregonstate.edu', 'peeplesj-db', 'jhNqh46GyMrkQZuS', 'peeplesj-db');
if($mysqli->connect_error){
    echo "Failed to connect to Database: (".$mysqli->connect_errno.
    ") ".$mysqli->connect_error;
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Logging in</title>
</head>
<body>

<?php

/*
if (array_key_exists('username', $_POST)) {
        $username = $_POST['username'];
        $password = $_POST['password'];
    } */
 
if (isset($_POST['title'])) {
    $title = $_POST['title'];
    $note = $_POST['note'];
    //$file = $_POST['file'];
    $private = $_POST['private'];
    $username = $_SESSION['username'];

    addNote( $username, $title, $note, $private);
    echo "Your note has been saved. <a href='welcome.php'>Click here</a> to return to your Notes.";

 
   
} else{
    echo "We lost your note. We apologize for the inconvience. Please try to save your note again.";
}

?>
 </body>
</html>