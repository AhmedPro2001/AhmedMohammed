<?php
require_once "../Config/conn.php";
require_once "../Model/database.php";
header("Content-Type:application/json");

$db_helper = new DbHelper();


if($_SERVER["REQUEST_METHOD"] == "POST"){
      if(isset($_POST['id'])){

    $id = $_POST['id'];
    $db_helper->deleteStudent($id);
 echo json_encode(array("status"=>"Delete Successfully"));
            
      }

}else{
      echo json_encode(array("status"=>false));
}




?>