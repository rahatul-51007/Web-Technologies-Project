<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login & Registration</title>
    <link rel="stylesheet" href="./css/log_reg_style.css">
</head>
<body>

<div class="container">

    <!-- Login Form -->
     <div >
        <form action="../controllers/login_controller.php" class="form-box" id="loginBox" method="post">
            <h2>Login</h2>

            <input type="text" name="uname" placeholder="Username" value="<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ""; ?>"><br><br>
            <span>
			    <?php echo isset($_SESSION['usernameErrMsg']) ? $_SESSION['usernameErrMsg'] : ""; ?>
		    </span>
            <input type="password" name="password" placeholder="Password"><br><br>
            <span>
			    <?php echo isset($_SESSION['passwordErrMsg']) ? $_SESSION['passwordErrMsg'] : ""?>
		    </span>
            <span>
			    <?php echo isset($_SESSION['invalidErrMsg']) ? $_SESSION['invalidErrMsg'] : ""?>
		    </span>
            <button type="submit">Login</button><br>

            <p class="link">Forgot Password?</p>
            <a class="link" href="../controllers/reg_session.php">Don't have an account?</a>
        </form>
     </div>
</div>

<script src="./js/script.js"></script>
</body>
</html>
