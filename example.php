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
echo "Welcome " . $myName . " .";
?>
    
    </body>
</html>