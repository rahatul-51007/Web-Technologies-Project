<?php
    require_once '../model/connection.php';

    function regUser($user){
        $conn=dbConnection();
        $query="SELECT * FROM user WHERE uname='{$user['uname']}'";
        $result=mysqli_query($conn,$query);
        $count=mysqli_num_rows($result);
        if($count>0 ){
            return "errUname";
        }

        $queryEmail="SELECT * FROM user WHERE email='{$user['email']}'";
        $result=mysqli_query($conn,$queryEmail);
        $count=mysqli_num_rows($result);
        if($count>0 ){
            return "errEmail";
        }

        $insertQuery="INSERT INTO user (name,role,uname,email,pwd) VALUES ('{$user['name']}','employee','{$user['uname']}','{$user['email']}','{$user['pwd']}')";
        $result=mysqli_query($conn,$insertQuery);
        if($result){
            return true;
        }
        else{
            return false;
        }

    }
?>