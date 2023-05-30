<?php
require_once "../Config/conn.php";
require_once "../Model/database.php";
header("Content-Type:application/json");

$db_helper = new DbHelper();


if($_SERVER["REQUEST_METHOD"] == "POST"){

    $name = $_POST['name'];
    $gpa = $_POST['gpa'];
    $myFile = $_FILES["image"];
 $db_helper->insertStudent($name,$gpa,$myFile);
 echo json_encode(array("status"=>"Insert Successfully"));
}else{
      echo json_encode(array("status"=>false));
}




?>