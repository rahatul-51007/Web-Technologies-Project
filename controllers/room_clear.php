<?php
session_start();
unset($_SESSION['roomName']);
unset($_SESSION['roomErrMsg']);
unset($_SESSION['roomQuantity']);
unset($_SESSION['quantityErrMsg']);
unset($_SESSION['roomPrice']);
unset($_SESSION['priceErrMsg']);
header("Location: ../views/roomupdate.php");
?>