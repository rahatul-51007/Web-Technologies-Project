<?php
session_start();
require_once '../model/employeeDeleteQuery.php';
    if (isset($_REQUEST['edit_id'])){
        $receive_id=(int)$_REQUEST['edit_id'];
        $result=deleteQuery($receive_id);
        // $row=mysqli_fetch_assoc($result);
        // if($row){
            
        //     $_SESSION['fname']=$row['name'];
        //     $_SESSION['fusername']=$row['uname'];
        //     $_SESSION['email']=$row['email'];
        //     $_SESSION['password']=$row['pwd'];
        // }

        header("Location: ../views/employeeadd.php");  
        exit();

    }
?>
