<?php
session_start();
require_once '../model/roomEditQuery.php';
    if (isset($_REQUEST['edit_id'])){
        $receive_id=(int)$_REQUEST['edit_id'];
        $result=editQuery($receive_id);
        $row=mysqli_fetch_assoc($result);
        if($row){
            $_SESSION['room_type']=$row['room_type'];
            $_SESSION['count']=$row['count'];
            $_SESSION['price']=$row['price'];
        }

        header("Location: ../views/roomupdate.php");  
        exit();

    }
?>
