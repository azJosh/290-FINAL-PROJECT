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
    $userpic = $_SESSION['pic'];
}

 if(login_check($mysqli)){
    	echo '<img src="' . $userpic . '"alt="beaver" height="40">     ';
        echo $username . "'s Cloud Notes";
        echo "      ";
        echo '<a href="http://web.engr.oregonstate.edu/~peeplesj/Final_Project/login.php?logout=true">(Log Out)</a>';
        
        ?>
<html>
	<head>
	    <meta charset="UTF-8">
	    <title>Cloud Note: Add New Note</title>
         <nav id="nav-wrap" class="cf">
            <ul id="menu">
                <li><a href="mynotes.php">My Cloud Notes</a>
                <li><a href="public.php">Public Cloud Notes</a></li>
                <li><a href="welcome.php">Create a New Cloud Note</a></li>               
            </ul> <!-- end #menu -->
         </nav>
	</head>
<body>
	<h1>Create a New Cloud Note</h1>
	 <form action='NoteProcess.php' method="POST" id="noteform">
            Note Title: <input type='text' name='title' style="width: 650px" required></input>
            <br><br>Note:<br><textarea rows="8" cols="100" name="note" form="noteform"></textarea><br><br>
            
            <input type="radio" name="private" value="private" checked>Keep note private<br>
			<input type="radio" name="private" value="public">Make note public<br>
            <input type='hidden' name='addNote' value='TRUE'></input>
            <br><input type='submit' value='Save Note'></input>
    </form><br><br>
    <?php



    } else{
        echo 'You need to be logged in to access this page. click <a href="login.php">here</a> to log in.';
	}


?>