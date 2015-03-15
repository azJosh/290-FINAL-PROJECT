<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require('functions.php');
session_start();


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Lookup Book</title>
</head>
<body>
    <h1>Create a Cloud Note account</h1>
        
        <?php

        if (isset($_POST['newusername'])){
            if(usernameCheck($_POST['newusername'])){
                echo "Username is already taken. Please try again using a different username.";
                ?><br><br><form action="registration.php" 
                method="post" 
                name="registration_form">
            Enter a Username: <input type='text' 
                name='newusername' 
                id='newusername' required /><br><br>
            
            Enter a Password: <input type="password"
                             name="password" 
                             id="password" required/><br><br>
            <input type="submit" value="Sign up"/> 
            </form>
            <p>Return to the <a href="login.php">login page</a>.</p>
            <?php
            } else{
                addUser($_POST['newusername'], $_POST['password']);
                echo "Thank you for signing up for Cloud Note. <a href='login.php'>Login in</a> to get started!";
            }
        } else{
        
        
        ?><form action="registration.php" 
                method="post" 
                name="registration_form">
            Enter a Username: <input type='text' 
                name='newusername' 
                id='newusername' required /><br><br>
            
            Enter a Password: <input type="password"
                             name="password" 
                             id="password" required/><br><br>
            <input type="submit" value="Sign up"/> 
        </form>
        <p>Return to the <a href="login.php">login page</a>.</p>
        <?php
        }
        ?>
    </body>
</html>