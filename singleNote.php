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
        
        $myNotes = getNotes($_SESSION['username']);
        ?>
<html>
	<head>
	    <meta charset="UTF-8">
	    <title>Cloud Note: My Notes</title>
	     <nav id="nav-wrap" class="cf">
            <ul id="menu">
                <li><a href="mynotes.php">My Cloud Notes</a>
                <li><a href="public.php">Public Cloud Notes</a></li>
                <li><a href="welcome.php">Create a New Cloud Note</a></li>               
            </ul> <!-- end #menu -->
         </nav>
	</head>
<body>
	<?php
	echo '<div>';
    
    $noteID = $_POST['view'];
    
   	$singleNote =  getSingleNote($noteID);
   	
   	foreach ($singleNote as $key => $value){
   	echo "<h2>" . $value['title'] . "</h2><br>,<br>";
   	echo $value['note'] . "<br><br>";
   	//echo $value['file'] . "<br><br>";
   	echo "Note Date: " . $value['date'] . "<br><br>";
   }
  

    } else{
        echo 'You need to be logged in to access this page. click <a href="login.php">here</a> to log in.';
	}


?>
 </body>
</html>