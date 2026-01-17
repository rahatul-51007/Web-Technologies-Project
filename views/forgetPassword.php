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
        <form action="../controllers/recovery_controller.php" class="form-box" id="registerBox"  method="post" onsubmit="return validate(this)" >
            <h2>Find your password</h2>
            <span id="success">
			    <?php echo isset($_SESSION['success']) ? $_SESSION['success'] : ""; ?>
		    </span>
            <span>
			    <?php echo isset($_SESSION['invalidEmailMsg']) ? $_SESSION['invalidEmailMsg'] : ""; ?>
		    </span>

            <input type="email" placeholder="Email" name="email" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ""; ?>"><br>
            <span id="emailError">
			    <?php echo isset($_SESSION['emailErrMsg']) ? $_SESSION['emailErrMsg'] : ""; ?>
		    </span>

            <button type="submit">Submit</button>

            <p class="link"><a href="../controllers/login_session.php">Login using password</a></p>
        </form>
     </div>
    

</div>

<script src="./js/script.js"></script>


</body>
</html>

