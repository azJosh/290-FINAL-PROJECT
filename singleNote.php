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
    	'<form action="mynotes.php" method="post" name="viewNotes">                      
            <input type="hidden" name="viewNotes" />
            <input type="submit" value="My Notes"></input> 
                    
        </form>';

        echo 
    	'<form action="mynotes.php" method="post" name="logout">                      
            <input type="hidden" name="viewPublic" />
            <input type="submit" value="Public Notes"></input> 
                    
        </form>';

        echo 
    	'<form action="login.php" method="post" name="logout">                      
            <input type="hidden" name="logout" />
            <input type="submit" value="Log Out"></input> 
                    
        </form>';
        $myNotes = getNotes($_SESSION['username']);
        ?>
<html>
	<head>
	    <meta charset="UTF-8">
	    <title>Cloud Note: My Notes</title>
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