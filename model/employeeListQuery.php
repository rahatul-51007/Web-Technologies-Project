<?php
    require_once '../model/connection.php';

    function employeeTable(){
        $conn=dbConnection();
        $query="SELECT * FROM user WHERE role='employee'";
        $result=mysqli_query($conn,$query);
        if(!$result){
            die("query failed");
        }
        else{
            return $result;
        }
    }
?>