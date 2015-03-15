<?php

session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Book Search</title>
    </head>
    <body>
        <h1>Book Search</h1>
<?php
$myName = $_SESSION['username'];
echo "Welcome " . $myName . " .<br><br>";
echo "click <a href='welcome.php'>here</a> to continue.";
?>
    
    </body>
</html>