<?php
require_once "../Config/conn.php";
require_once "../Model/database.php";
header("Content-Type:application/json");

$db_helper = new DbHelper();


if($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $gpa = $_POST['gpa'];
    $myFile = $_FILES["image"];


 $db_helper->updateStudent($id,$name,$gpa,$myFile);
 echo json_encode(array("status"=>"Update Successfully"));
}else{
      echo json_encode(array("status"=>false));
}




?>