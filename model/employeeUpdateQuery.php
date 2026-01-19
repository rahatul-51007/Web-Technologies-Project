<?php
require_once '../model/connection.php';

function updateEmployee($updateEmployee){
    $conn=dbConnection();
    $query="SELECT * FROM user WHERE uname='{$updateEmployee['uname']}' AND id != '{$_SESSION['id']}'";
        $result=mysqli_query($conn,$query);
        $count=mysqli_num_rows($result);
        if($count>0 ){
            return "errUname";
        }

        $queryEmail="SELECT * FROM user WHERE email='{$updateEmployee['email']}' AND id != '{$_SESSION['id']}'";
        $result=mysqli_query($conn,$queryEmail);
        $count=mysqli_num_rows($result);
        if($count>0 ){
            return "errEmail";
        }
    $query="UPDATE user SET name='{$updateEmployee['name']}',
            uname='{$updateEmployee['uname']}',
            email='{$updateEmployee['email']}',
            pwd='{$updateEmployee['pwd']}'
            WHERE id='{$_SESSION['id']}'";
    $result=mysqli_query($conn,$query);
    if($result){
        return true;
    }
    else{
        return false;
    }


}
?>