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
        <link rel="stylesheet" type="text/css" href="main.css" />
        <style>body {
            background-image: url("back1.jpg");
                    }
        </style>
        
    </head>
    <body>
        <div align="center">
            <table width="40%" border="1" id="table1" bgcolor="#E8E8E8">
                <tr>
                    <td  align="center">
                    <div >

                        <img src="logoGray.jpg" alt="logoGray" height="120"><br><br>
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

                        <p><a href="registration2.php">Create a Cloud Note account</a></p> 

                        </div>
                        <br>
                            <div class="content">
                        Cloud Note allows you to take notes online and access them online anytime.</div>
                    </td>
                </table>
            </div>
    </body>
</html>