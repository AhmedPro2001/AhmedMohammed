<?php
require_once "../Config/conn.php";
require_once "../Model/database.php";
header("Content-Type:application/json");

$db_helper = new DbHelper();


if($_SERVER["REQUEST_METHOD"] == "GET"){
      $db_helper->getAllStudents();
}else{
      echo json_encode(array("status"=>false));
}




?>