<?php
    require_once '../model/connection.php';

    function loginUser($user){
        $conn=dbConnection();
        $query="SELECT * FROM user WHERE uname='{$user['uname']}' AND pwd='{$user['pwd']}'";
        $result=mysqli_query($conn,$query);
        $count=mysqli_num_rows($result);
        if($count>1 || $count==0 ){
            return false;
        }
        else{
            return mysqli_fetch_assoc($result);
        }
    }
?>
