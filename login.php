<?php
ob_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

require('functions.php');


session_start();

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Cloud Note</title>
        
    </head>
    <body>
        <h1>Cloud Note</h1>
        <?php
        if (isset($_GET['logout'])) {
            session_destroy();
            echo 'Thank you for using Cloud Note. You have successfully logged out. <br><br>';
        }
        if (isset($_GET['success'])) {
            echo 'Thank you for creating your new Cloud Note account. Please sign in to get started. <br><br>';
        }
        ?> 
        <form action="LoginProcess.php" method="post" name="login_form">                      
            Username: <input type="text" name="username" /><br><br>
            Password: <input type="password" 
                             name="password" 
                             id="password"/><br><br>
            <input type='submit' value='Sign In'></input> 
                    
        </form>
 
    
<p><a href="registration2.php">Create a Cloud Note account</a>.</p>  
    </body>
</html>