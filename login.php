<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require('functions.php');

// Start the session
session_start();
/* 
if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
}*/
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Secure Login: Log In</title>
        
    </head>
    <body>
        <?php
        if (isset($_GET['error'])) {
            echo '<p class="error">Error Logging In!</p>';
        }
        ?> 
        <form action="LoginProcess.php" method="post" name="login_form">                      
            Username: <input type="text" name="username" />
            Password: <input type="password" 
                             name="password" 
                             id="password"/>
            <input type='submit' value='submit'></input> 
                    
        </form>
 
<?php /*
        if (login_check($mysqli) == true) {
                        echo '<p>Currently logged ' . $logged . ' as ' . htmlentities($_SESSION['username']) . '.</p>';
 
            echo '<p>Do you want to change user? <a href="includes/logout.php">Log out</a>.</p>';
        } else {
                        echo '<p>Currently logged ' . $logged . '.</p>';
                        echo "<p>If you don't have a login, please <a href='register.php'>register</a></p>";
                } */
?>      
    </body>
</html>