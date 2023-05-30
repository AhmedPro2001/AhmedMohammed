<?php
require_once "../Config/conn.php";

class DbHelper{

    public $connection;
  

    public function __construct() {
        $this->connection = connection();
    }

    public function getAllStudents(){

        try{
        $this->connection = connection();
        $students = array();
        $query ="SELECT * FROM student";
        $result = mysqli_query($this->connection, $query);
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                $students[] = $row;
            }
           echo json_encode(array("status"=>true,"data"=>$students));
        }else{
            echo json_encode(array("status"=>false));
        }
        }catch(Exception $e){

        }

    }



    
public function insertStudent($name,$gpa,$image){
    $file_link = $this->saveImage($image);
    $query = "INSERT INTO student(name,gpa,image) VALUES(?,?,?)";
    $st = $this->connection->prepare($query);
    $st->bind_param("sds",$name,$gpa,$file_link);
    $st->execute();
}


    public function updateStudent($id,$name,$gpa,$image){
        $query ="UPDATE student SET name ='$name', gpa = '$gpa', image = '$image'  WHERE id = '$id' ;";
        $this->connection->query($query);
    }


    public function deleteStudent($id){
    $query = "DELETE FROM student WHERE id = '$id' ;";
    $this->connection->query($query); 
    }


    function saveImage($file){
        $dir_name = "../images/";
        $fullPath = $dir_name.$file["name"];
        move_uploaded_file($file["tmp_name"],$fullPath);
        $file_link = "http://192.168.0.103/Project/images/$file[name]";
        return $file_link;
    }


    function uploadImageBase64(){
        $target_dir = "images/";
        $image= $_POST['image'];
        $imageStore= rand()."_".time().".jpeg";
        $target_dir= $target_dir."/".$imageStore;
        file_put_contents($target_dir, base64_decode($image));
    }

    
}








?>