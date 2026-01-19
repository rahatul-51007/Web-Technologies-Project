<?php
    require_once '../model/connection.php';

    function recovery($user){
        $conn=dbConnection();
        $query="SELECT * FROM user WHERE email='{$user['email']}'";
        $result=mysqli_query($conn,$query);
        $count=mysqli_num_rows($result);
        if($count==0){
            return false;
        }
        else{
            return mysqli_fetch_assoc($result);
        }
    }
?>