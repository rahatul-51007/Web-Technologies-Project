<?php
function dbConnection(){ 
    $hostName="localhost";
    $username="root";
    $password="";
    $dbName="hotel_management";
    $conn=mysqli_connect($hostName,$username,$password,$dbName);
    if($conn){
        return $conn;
    }
    else{
        echo "Connection failed";
        die("Connection failed: " . mysqli_connect_error());
        return false;
    }
}


?>