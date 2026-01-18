<?php
require_once '../model/connection.php';

function loginUser($user){
    $conn = dbConnection();
    $query = "SELECT * FROM user WHERE uname='{$user['uname']}' AND pwd='{$user['pwd']}'";
    $result = mysqli_query($conn, $query);
    $count = mysqli_num_rows($result);
    if($count > 1 || $count == 0){
        mysqli_close($conn);
        return false;
    } else {
        $userData = mysqli_fetch_assoc($result);
        mysqli_close($conn);
        return $userData;
    }
}
?>
