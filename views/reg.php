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
    <!-- Registration Form -->
     <div >
        <form action="../controllers/reg_controller.php" class="form-box" id="registerBox"  method="post" onsubmit="return validate(this)" >
            <h2>Register</h2>
            <span id="success">
			    <?php echo isset($_SESSION['success']) ? $_SESSION['success'] : ""; ?>
		    </span>
            <span>
			    <?php echo isset($_SESSION['invalidMsg']) ? $_SESSION['invalidMsg'] : ""; ?>
		    </span>

            <input type="text" placeholder="Full Name" name="name" value="<?php echo isset($_SESSION['name']) ? $_SESSION['name'] : ""; ?>"><br>
            <span id="nameError">
			    <?php echo isset($_SESSION['nameErrMsg']) ? $_SESSION['nameErrMsg'] : ""; ?>
		    </span>
            <input type="text" placeholder="Username" name="uname" value="<?php echo isset($_SESSION['username']) ? $_SESSION['username'] : ""; ?>"><br>
            <span id="userNameError">
			    <?php echo isset($_SESSION['usernameErrMsg']) ? $_SESSION['usernameErrMsg'] : ""; ?>
		    </span>
            <span>
			    <?php echo isset($_SESSION['invalidUnameMsg']) ? $_SESSION['invalidUnameMsg'] : ""; ?>
		    </span>
            <input type="email" placeholder="Email" name="email" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ""; ?>"><br>
            <span id="emailError">
			    <?php echo isset($_SESSION['emailErrMsg']) ? $_SESSION['emailErrMsg'] : ""; ?>
		    </span>
            <span>
			    <?php echo isset($_SESSION['invalidEmailMsg']) ? $_SESSION['invalidEmailMsg'] : ""; ?>
		    </span>
            <input type="password" placeholder="Password" name="pwd" value="<?php echo isset($_SESSION['password']) ? $_SESSION['password'] : ""; ?>"><br>
            <span id="passErrMsg">
			    <?php echo isset($_SESSION['passwordErrMsg']) ? $_SESSION['passwordErrMsg'] : ""; ?>
		    </span>

            <button type="submit">Register</button>

            <p class="link"><a  href="../controllers/login_session.php"> Already have an account?</a></p>
        </form>
     </div>
    

</div>

<script src="./js/script.js"></script>


</body>
</html>

