<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require('functions.php');
session_start();

$mysqli = new mysqli('oniddb.cws.oregonstate.edu', 'peeplesj-db', 'jhNqh46GyMrkQZuS', 'peeplesj-db');
if($mysqli->connect_error){
    echo "Failed to connect to Database: (".$mysqli->connect_errno .") ". $mysqli->connect_error;
}

if (isset($_SESSION['username'])) {
	$username = $_SESSION['username'];
}

 if(login_check($mysqli)){
    	echo "Welcome " . $username . "<br><br>";
    	echo 
    	'<form action="login.php" method="post" name="logout">                      
            <input type="hidden" name="logout" />
            <input type="submit" value="Log Out"></input> 
                    
        </form>';

    } else{
        echo 'You need to be logged in to access this page. click <a href="login.php">here</a> to log in.';
	}

/*
if (isset($_SESSION['username'])){
        $username = $_SESSION['username'];
        if(!($stmt=$mysqli->prepare("SELECT username FROM members WHERE username=?"))){
            echo "Prepared Statement ERROR. " . $mysqli->errno . " . " . $stmt->error;
        }

        if(!($stmt->bind_param("s", $username))){
            echo "bind_param ERROR. " . $mysqli->errno . " . " . $mysqli->error;
        }

        if(!($stmt->execute())){
            echo "execute() ERROR. " . $stmt->errno . " . " . $mysqli->error;
        }

        $stmt->bind_result($db_username);

        $stmt->fetch();

        $stmt->close();


        if(!(empty($db_username)) && $db_username == $username){
            echo "Hello welcome";
        } else{
            echo 'You need to be logged in to access this page.';
		}
} else {
        echo 'You need to be logged in to access this page.';
}*/
?>