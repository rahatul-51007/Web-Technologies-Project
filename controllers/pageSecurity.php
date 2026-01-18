<?php
session_start();

// Check if user is logged in
if(!isset($_SESSION['user_id'])){
    header("Location: ../views/log_reg.php");
    exit();
}

// Check if user role is customer or user
if(isset($_SESSION['role']) && $_SESSION['role'] !== 'customer' && $_SESSION['role'] !== 'user'){
    header("Location: ../views/log_reg.php");
    exit();
}
?>
