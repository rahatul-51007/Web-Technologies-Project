<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login & Registration</title>
    <link rel="stylesheet" href="log_reg_style.css">
</head>
<body>

<div class="container">

    <!-- Login Form -->
     <div >
        <form class="form-box" id="loginBox" onsubmit="return false;" method="post">
            <h2>Login</h2>

            <input type="tel" placeholder="Mobile Number"><br><br>
            <input type="password" placeholder="Password"><br><br>

            <button type="submit">Login</button><br>

            <p class="link">Forgot Password?</p>
            <p class="link" onclick="showRegister()">Don't have an account?</p>
        </form>
     </div>
    

    <!-- Registration Form -->
     <div >
        <form class="form-box" id="registerBox" onsubmit="return false;" method="post">
            <h2>Register</h2>

            <input type="text" placeholder="Full Name">
            <input type="date" >
            <input type="tel" placeholder="Mobile Number">
            <input type="password" placeholder="Password">

            <button type="submit">Register</button>

            <p class="link" onclick="showLogin()"> Already have an account?</p>
        </form>
     </div>
    

</div>

<script src="script.js"></script>
</body>
</html>
