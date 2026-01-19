<?php
session_start();
require_once '../model/recovery_query.php';
$method = $_SERVER['REQUEST_METHOD'];
if ($method === "POST") {    
    $email=$_POST['email'];
    $_SESSION['emailErrMsg'] = "";
    $isValid=true;


    if (empty($email)) {
        $_SESSION['emailErrMsg'] = "Email is empty";
        $_SESSION['success'] = "";
        $isValid = false;
    } else {
        $_SESSION['email'] = $email;
    }

    if ($isValid) {
        // $_SESSION['isLoggedIn'] = true;
        // header("Location: Home.php");
        $user = [
            "email" =>$email
        ];
        recoveryController($user);
    } else {
        header("Location: ../views/forgetPassword.php");
        exit();
    }
} else {
    echo "Something went wrong. Please contact the administrator";
}
function recoveryController($user)
{
    $status = recovery($user);
    $_SESSION['invalidEmailMsg'] = "";
    $_SESSION['success'] = "";
    if ($status===false) {
        $_SESSION['invalidEmailMsg'] = "Email not found";
    } else {
            $row=$status;
            $password=$row['pwd'];
            $subject="Password Recovery";
            $body="Your password is: $password";
            $headers="From:rahatul51007@gmail.com";
            $to_mail=$user['email'];
            if(mail($to_mail,$subject,$body,$headers)){
              $_SESSION['success'] = "Your password successfully sent!";  
            }
        }
    
    header("Location: ../views/forgetPassword.php");
}

?>