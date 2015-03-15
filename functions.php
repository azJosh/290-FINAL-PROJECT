<?php 



function login($username, $password, $mysqli) {
   if(!($stmt=$mysqli->prepare("SELECT id, username, password FROM members WHERE username=? AND password=?"))){
        echo "Prepared Statement ERROR. " . $mysqli->errno . " . " . $stmt->error;
   }

   if(!($stmt->bind_param("ss", $username, $password))){
        echo "bind_param ERROR. " . $mysqli->errno . " . " . $mysqli->error;
   }

   if(!($stmt->execute())){
        echo "execute() ERROR. " . $stmt->errno . " . " . $mysqli->error;
   }

   $stmt->bind_result($db_id, $db_username, $db_password);

   $stmt->fetch();

   $stmt->close();

   
   if(!(empty($db_username)) && $db_username == $username){
        $_SESSION['username'] = $db_username;
        return true;
   } else{
        return false;
   }
}
    

function login_check($mysqli) {
 if (isset($_SESSION['username'])){
        $username = $_SESSION['username'];
        if(!($stmt=$mysqli->prepare("SELECT username FROM members WHERE username=?"))){
            echo "Prepared Statement ERROR. " . $mysqli->errno . " . " . $stmt->error;
        }

        if(!($stmt->bind_param("s", $username))){
            echo "bind_param ERROR. " . $mysqli->errno . " . " . $mysqli->error;
        }

        if(!($stmt->execute())){
            echo "execute() ERROR. " . $stmt->errno . " . " . $mysqli->error;
        }

        $stmt->bind_result($db_username);

        $stmt->fetch();

        $stmt->close();


        if(!(empty($db_username)) && $db_username == $username){
            return true;
        } else{
            return false;
    }
} else {
        return false;
}
}


function usernameCheck($userCheck) {
$mysqli = new mysqli('oniddb.cws.oregonstate.edu', 'peeplesj-db', 'jhNqh46GyMrkQZuS', 'peeplesj-db');
if($mysqli->connect_error){
    echo "Failed to connect to Database: (".$mysqli->connect_errno.
    ") ".$mysqli->connect_error;
}

$username = $userCheck;
if(!($stmt=$mysqli->prepare("SELECT username FROM members WHERE username=?"))){
    echo "Prepared Statement ERROR. " . $mysqli->errno . " . " . $stmt->error;
}

if(!($stmt->bind_param("s", $username))){
    echo "bind_param ERROR. " . $mysqli->errno . " . " . $mysqli->error;
}

if(!($stmt->execute())){
    echo "execute() ERROR. " . $stmt->errno . " . " . $mysqli->error;
}

$stmt->bind_result($db_username);

$stmt->fetch();

$stmt->close();

if(!(empty($db_username)) && $db_username == $username){
  return true;
} else{
  return false;
}
        
}

function addUser($username, $password){

  $mysqli = new mysqli('oniddb.cws.oregonstate.edu', 'peeplesj-db', 'jhNqh46GyMrkQZuS', 'peeplesj-db');
  if($mysqli->connect_error){
    echo "Failed to connect to Database: (".$mysqli->connect_errno.
    ") ".$mysqli->connect_error;
  }

  if(!($stmt=$mysqli->prepare("INSERT INTO members (username, password) VALUES (?, ?)"))){
    echo "Prepared Statement ERROR. " . $mysqli->errno . " . " . $stmt->error;
  }

  if(!($stmt->bind_param("ss", $username, $password))){
    echo "bind_param ERROR. " . $mysqli->errno . " . " . $mysqli->error;
  }

  if(!($stmt->execute())){
    echo "execute() ERROR. " . $stmt->errno . " . " . $mysqli->error;
  }

  $stmt->close();
}


?>