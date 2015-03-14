<?php
require('functions.php');
session_start();

if(login_check($mysqli) == true) {
        // Add your protected page content here!
} else { 
        echo 'You are not authorized to access this page, please login.';
}

?>