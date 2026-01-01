<?php
session_start();
require_once '../model/employeeAddQuery.php';
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
    $_SESSION['fname'] = "";
    $_SESSION['fusername'] = "";
    $_SESSION['email'] = "";
    $_SESSION['pwd'] = "";
    $isValid = true;

    if (empty($name)) {
        $_SESSION['nameErrMsg'] = "Name is empty";
        $_SESSION['success'] = "";
        $isValid = false;
    } else {
        $_SESSION['fname'] = $name;
    }

    if (empty($username)) {
        $_SESSION['usernameErrMsg'] = "Username is empty";
        $_SESSION['success'] = "";
        $isValid = false;
    } else {
        $_SESSION['fusername'] = $username;
    }
    if (empty($email)) {
        $_SESSION['emailErrMsg'] = "Email is empty";
        $_SESSION['success'] = "";
        $isValid = false;
    } else {
        $_SESSION['email'] = $email;
    }
    if (empty($password)) {
        $_SESSION['passwordErrMsg'] = "Password is empty";
        $_SESSION['success'] = "";
        $isValid = false;
    }
    else{
        $_SESSION['password'] = $password;
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
    } 
    else {
        header("Location:../views/employeeadd.php");//
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
        $_SESSION['fname'] = "";
        $_SESSION['fusername'] = "";
        $_SESSION['email'] = "";
        $_SESSION['password'] = "";
        

    } elseif($status==="errUname") {
        $_SESSION['invalidUnameMsg'] = "Username already exist";
        $_SESSION['success'] = "";

    }
    elseif($status==="errEmail") {
        $_SESSION['invalidEmailMsg'] = "Email already exist";
        $_SESSION['success'] = "";

    }
    else{
        $_SESSION['invalidMsg'] ="Registration failed";

    }

    header("Location:../views/employeeadd.php");
}

?>