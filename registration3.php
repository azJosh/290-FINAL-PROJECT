<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');
$mysqli = new mysqli('oniddb.cws.oregonstate.edu', 'peeplesj-db', 'jhNqh46GyMrkQZuS', 'peeplesj-db');
if($mysqli->connect_error){
    echo "Failed to connect to Database: (".$mysqli->connect_errno. ") ".$mysqli->connect_error;
}

$username = $mysqli->real_escape_string($_POST['u']);
$password = $mysqli->real_escape_string($_POST['p']);
$userPic = $mysqli->real_escape_string($_POST['q']);
$stmt = $mysqli->query("SELECT * FROM members WHERE username='$username'");

if($stmt->num_rows == 0){
    $returnText = 1;
    $stmt = $mysqli->query("INSERT INTO members (username, password, picture) VALUES ('$username','$password', '$userPic')");
    
    echo $returnText;
}
else{
    $returnText = 0;
    echo $returnText;
}
?>