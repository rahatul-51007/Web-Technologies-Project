<?php
    require_once '../model/connection.php';

    function roomTable(){
        $conn=dbConnection();
        $query="SELECT * FROM room";
        $result=mysqli_query($conn,$query);
        if(!$result){
            die("query failed");
        }
        else{
            return $result;
        }
    }
?>