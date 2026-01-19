<?php
    session_start();
    require_once '../model/connection.php';
    

    function deleteQuery($receive_id){
        $conn=dbConnection();
        $query="DELETE FROM user where id=$receive_id";
        $result=mysqli_query($conn,$query);
        if(!$result){
            die("query failed");
        }
        else{
            return $result;
        }
    }
?>