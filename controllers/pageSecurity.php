<?php
session_start();
if (!isset($_SESSION['isLoggedIn'])) {
	header("Location: ../views/log_reg.php");
	exit();
}
?>