<?php
session_start();
require_once '../model/login_query.php';
$method = $_SERVER['REQUEST_METHOD'];
if ($method === "POST") {
    $username = $_POST['uname'];
    $password = $_POST['password'];
    $_SESSION['usernameErrMsg'] = "";
    $_SESSION['username'] = "";
    $_SESSION['passwordErrMsg'] = "";
    $isValid = true;

    if (empty($username)) {
        $_SESSION['usernameErrMsg'] = "Username is empty";
        $isValid = false;
    } else {
        $_SESSION['username'] = $username;
    }
    if (empty($password)) {
        $_SESSION['passwordErrMsg'] = "Password is empty";
        $isValid = false;
    }
    if ($isValid) {
        // $_SESSION['isLoggedIn'] = true;
        // header("Location: Home.php");
        $user = [
            "uname" => $username,
            "pwd" => $password
        ];
        loginController($user);
    } else {
        header("Location: ../views/log_reg.php");
        exit();
    }
} else {
    echo "Something went wrong. Please contact the administrator";
}
function loginController($user)
{
    $status = loginUser($user);
    $_SESSION['invalidErrMsg'] = "";
    if ($status) {
        $_SESSION['name']=$status['name'];
        $_SESSION['username'] = $status['uname'];
        $_SESSION['role'] = $status['role'];
        $_SESSION['id'] = $status['id'];
        $_SESSION['isLoggedIn'] = true;
        if ($status['role'] === 'admin') {
            header("Location: ../views/admin_dashboard.php");
        } elseif ($status['role'] === 'employee') {
            header("Location: ../views/employee_dashboard.php");
        } elseif ($status['role'] === 'user') {
            header("Location: ../views/customer_dashboard.php");
        }
    } else {
        $_SESSION['invalidErrMsg'] = "Invalid user name or password ";
        header("Location: ../views/log_reg.php");
    }
}
