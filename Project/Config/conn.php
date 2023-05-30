<?php

function connection(){
      $conn = mysqli_connect('localhost', 'root', '', 'student');
if (mysqli_connect_error()) {
    // echo 'Connection Error in Database' . $conn->connect_error;
} else {
    // echo 'Connection successfully';
    return $conn;
}  
}





?>