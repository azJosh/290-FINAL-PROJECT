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
    <title>Create an Account</title>
    <script>
    function register(username, password, pic){
       //Blank user name
       if(username == ""){
         document.getElementById("statusBoxReg").innerHTML = "Username may not be blank";
         document.getElementById("registerform").reset();
         return;
       }
       //Blank password
       else if(password == ""){
         document.getElementById("statusBoxReg").innerHTML ="Password may not be blank";
         document.getElementById("registerform").reset();
         return;
       }
        else if(pic == ""){
         document.getElementById("statusBoxReg").innerHTML ="Please enter a profile picture URL. If you need an URL, you can enter beaver.jpg ";
         document.getElementById("registerform").reset();
         return;
       }
       //All good
       else {
         xmlhttp = new XMLHttpRequest();
         xmlhttp.onreadystatechange = function(){
           if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
             if(xmlhttp.responseText == 0){
               document.getElementById("statusBoxReg").innerHTML = "The username you entered is taken. Please try again.";
               document.getElementById("registerform").reset();
             }
             else if(xmlhttp.responseText == 1){
               window.location.href = "http://web.engr.oregonstate.edu/~peeplesj/Final_Project/login.php?success=true";
             }
             else {
               document.getElementById("statusBoxReg").innerHTML = "There was an error processing your requst. We apologize for the inconvenience.";
               document.getElementById("registerform").reset();
             }
           }
         }
         xmlhttp.open("POST","registration3.php",true);
         xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
         xmlhttp.send("u="+username+"&p="+password+"&q="+pic);
       }
     }
    function selectBeaver(){
    a=document.getElementById('pic1');
    a.value='beaver.jpg';
    }
    function selectCar(){
    b=document.getElementById('pic1');
    b.value='car.jpg';
    }
    function selectSkull(){
    b=document.getElementById('pic1');
    b.value='skull.jpg';
    }
   </script>
</head>
<body>
    <h1>Create a Cloud Note account</h1>
        
    <div id="AccountBox">
      <div id="statusBoxReg">
      </div><br>
      <form id="registerform" name="registerform">
        Username:<br>
        <input type="text" name="username1" maxlength="20">
        <br>Password:<br>
        <input type="password" name="password1" maxlength="20">
        <br>Profile Picutre URL:<br>
        <input type="text" name="pic" id="pic1" maxlength="250">
        <br><br>
        <div id="button">
          <button type="button" onclick="register(username1.value, password1.value, pic.value)">Create Account</button>
        </div>
      </form>
       Don't have a picture URL for your picture profile? Use one of ours:
        <br><br><label><input type="radio" name="picRadio" value="beaver" onClick="selectBeaver()">Beaver</input></label><br>
        <img src="beaver.jpg" alt="beaver" height="60"><br>
        <label><input type="radio" name="picRadio" value="car" onClick="selectCar()">Car</input></label><br>
        <img src="car.jpg" alt="beaver" height="60"><br>
        <label><input type="radio" name="picRadio" value="skull" onClick="selectSkull()">Skull</input></label><br>
        <img src="skull.jpg" alt="beaver" height="60"><br>       
        <br><br><p>Return to the <a href="login.php">login page</a>.</p>
    </div>
       
    </body>
</html>