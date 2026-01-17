<?php
session_start();
unset($_SESSION['nameErrMsg']);
unset($_SESSION['usernameErrMsg']);
unset($_SESSION['emailErrMsg']);
unset($_SESSION['passwordErrMsg']);
unset($_SESSION['fname']);
unset($_SESSION['fusername']);
unset($_SESSION['email']);
unset($_SESSION['password']);

$_SESSION['email'] = "";
$_SESSION['pwd'] = "";
header("Location: ../views/employeeadd.php");
?>