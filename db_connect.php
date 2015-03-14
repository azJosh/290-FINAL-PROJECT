<?php
//connect to database
$mysqli = new mysqli('oniddb.cws.oregonstate.edu', 'peeplesj-db', 'jhNqh46GyMrkQZuS', 'peeplesj-db');
if($mysqli->connect_error){
    die('Connection Error: ' . $mysqli->connect_erno . ', ' . $mysqli->connect_error);
}
?>