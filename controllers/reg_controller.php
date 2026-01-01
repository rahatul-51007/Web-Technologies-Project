<?php
session_start();
require_once '../model/reg_query.php';
$method = $_SERVER['REQUEST_METHOD'];
if ($method === "POST") {
    $name=$_POST['name'];
    $username = $_POST['uname'];
    $email=$_POST['email'];
    $password = $_POST['pwd'];
    $_SESSION['nameErrMsg'] = "";
    $_SESSION['usernameErrMsg'] = "";
    $_SESSION['emailErrMsg'] = "";
    $_SESSION['passwordErrMsg'] = "";
    $_SESSION['name'] = "";
    $_SESSION['username'] = "";
    $_SESSION['email'] = "";
    $_SESSION['pwd'] = "";
    $isValid = true;

    if (empty($name)) {
        $_SESSION['nameErrMsg'] = "Name is empty";
        $isValid = false;
    } else {
        $_SESSION['name'] = $name;
    }

    if (empty($username)) {
        $_SESSION['usernameErrMsg'] = "Username is empty";
        $isValid = false;
    } else {
        $_SESSION['username'] = $username;
    }
    if (empty($email)) {
        $_SESSION['emailErrMsg'] = "Email is empty";
        $isValid = false;
    } else {
        $_SESSION['email'] = $email;
    }
    if (empty($password)) {
        $_SESSION['passwordErrMsg'] = "Password is empty";
        $isValid = false;
    }
    if ($isValid) {
        // $_SESSION['isLoggedIn'] = true;
        // header("Location: Home.php");
        $user = [
            "name" => $name,
            "uname" => $username,
            "email" =>$email,
            "pwd" => $password
        ];
        regController($user);
    } else {
        header("Location: ../views/reg.php");
        exit();
    }
} else {
    echo "Something went wrong. Please contact the administrator";
}
function regController($user)
{
    $status = regUser($user);
    $_SESSION['invalidUnameMsg'] = "";
    $_SESSION['invalidEmailMsg'] = "";
    $_SESSION['invalidMsg']="";
    $_SESSION['success'] = "";
    if ($status===true) {
        $_SESSION['success'] = "User added successfully";
        $_SESSION['name'] = "";
        $_SESSION['username'] = "";
        $_SESSION['email'] = "";
        

    } elseif($status==="errUname") {
        $_SESSION['invalidUnameMsg'] = "Username already exist";

    }
    elseif($status==="errEmail") {
        $_SESSION['invalidEmailMsg'] = "Email already exist";

    }
    else{
        $_SESSION['invalidMsg'] ="Registration failed";

    }

    header("Location: ../views/reg.php");
}

