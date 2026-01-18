<?php
require_once '../model/connection.php';

function regUser($user){
    $conn = dbConnection();
    
    // Check if username already exists
    $query = "SELECT * FROM user WHERE uname='{$user['uname']}'";
    $result = mysqli_query($conn, $query);
    $count = mysqli_num_rows($result);
    if($count > 0){
        mysqli_close($conn);
        return "errUname";
    }

    // Check if email already exists
    $queryEmail = "SELECT * FROM user WHERE email='{$user['email']}'";
    $result = mysqli_query($conn, $queryEmail);
    $count = mysqli_num_rows($result);
    if($count > 0){
        mysqli_close($conn);
        return "errEmail";
    }

    // Insert new user with role 'customer'
    $insertQuery = "INSERT INTO user (name, role, uname, email, pwd) 
                    VALUES ('{$user['name']}', 'customer', '{$user['uname']}', '{$user['email']}', '{$user['pwd']}')";
    $result = mysqli_query($conn, $insertQuery);
    
    if($result){
        mysqli_close($conn);
        return true;
    } else {
        mysqli_close($conn);
        return false;
    }
}
?>
