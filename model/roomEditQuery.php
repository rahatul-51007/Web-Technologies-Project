<?php
    session_start();
    require_once '../model/connection.php';
    

    function editQuery($receive_id){
        $conn=dbConnection();
        $query="SELECT * FROM room where id=$receive_id";
        $result=mysqli_query($conn,$query);
        if(!$result){
            die("query failed");
        }
        else{
            return $result;
        }
    }
?>