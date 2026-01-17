<?php
include_once '../controllers/pageSecurity.php';
include_once 'nav.php';
include_once '../model/employeeListQuery.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="./css/employee_add_style.css">
</head>
<body>  
    <div class="nav-dashboard">
        <!-- div nav -->
         <div class="nav">
            <ul class="nav-list">
                <li class="nav-item" ><a href="admin_dashboard.php">Home</a></li>
                <li class="nav-item" ><a href="roomupdate.php">Room Update</a></li>
                <li class="nav-item" ><a href="employeeadd.php">Add/Remove Employee</a></li>
                <li class="nav-item" ><a href="employeereq.php">Request</a></li>
                <li class="nav-item" ><a href="summary.php">Summary</a></li>
            </ul>
         </div>
        <!-- div dashboard -->
         <div class="dashboard">
            <div id="add-remove">
                <div class="form-add"> 
                    <form action="../controllers/addEmployeeController.php" id="add-option" method="post" onsubmit="return validate(this)" >
                        <span id="success">
                            <?php 
                            echo isset($_SESSION['success']) ? $_SESSION['success'] : ""; 
                            unset($_SESSION['success']);
                            ?>
                        </span>
                        <span>
                            <?php echo isset($_SESSION['invalidMsg']) ? $_SESSION['invalidMsg'] : ""; 
                            unset($_SESSION['invalidMsg']);
                            ?>
                        </span>
                        <table>
                            <tr>
                                <td>Full name</td>
                                <td><input type="text" placeholder="Full name" name="name" value="<?php echo isset($_SESSION['fname']) ? $_SESSION['fname'] : ""; ?>"></td>   
                                 <td><span id="nameError">
                                    <?php echo isset($_SESSION['nameErrMsg']) ? $_SESSION['nameErrMsg'] : ""; ?>
                                </span> </td>                            
                            </tr>
                            <tr>
                                <td>Username</td>
                                <td><input type="text" placeholder="Username" name="uname" value="<?php echo isset($_SESSION['fusername']) ? $_SESSION['fusername'] : ""; ?>"></td>  
                                <td><span id="userNameError">
                                    <?php echo isset($_SESSION['usernameErrMsg']) ? $_SESSION['usernameErrMsg'] : ""; ?>
                                </span>
                                <span>
                                    <?php echo isset($_SESSION['invalidUnameMsg']) ? $_SESSION['invalidUnameMsg'] : ""; ?>
                                </span></td>                          
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><input type="email" placeholder="Email" name="email" value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : ""; ?>"></td> 
                                <td><span id="emailError">
                                    <?php echo isset($_SESSION['emailErrMsg']) ? $_SESSION['emailErrMsg'] : ""; ?>
                                </span>
                                <span>
                                    <?php echo isset($_SESSION['invalidEmailMsg']) ? $_SESSION['invalidEmailMsg'] : ""; ?>
                                </span> </td>                         
                            </tr>
                            <tr>
                                <td>Password</td>
                                <td><input type="text" placeholder="Password" name="pwd" value="<?php echo isset($_SESSION['password']) ? $_SESSION['password'] : ""; ?>"></td>
                                <td><span id="passErrMsg">
                                    <?php echo isset($_SESSION['passwordErrMsg']) ? $_SESSION['passwordErrMsg'] : ""; ?>
                                </span></td>
                            </tr>
                            <!-- <tr>
                                <td>ID</td>
                                <td><input type="text"></td>
                            </tr> -->
                        </table>
                        <input type="submit" name="add" value="Add" class="add">
                        <input type="submit" name="update" value="Update" class="add">
                        <a href="../controllers/add_clear.php" class="clear">Clear</a>
                        
                    </form>
                </div>     
            </div>
            <div class="outer-wrapper">
                <div class="table-wrapper">
                    <table class="emptable">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                            
                        </thead>
                        <tbody>
                        <?php
                        $result=employeeTable();
                        while($row=mysqli_fetch_assoc($result)){
                        ?>
                        <tr>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['uname']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['pwd']; ?></td>
                            <td>
                                <a class="btn btn-update" href="../controllers/employeeController.php?edit_id=<?php echo $row['id']; ?>">Edit</a>
                            </td>
                            <td>
                                <a class="btn btn-delete" href="../controllers/deleteEmployeeController.php?edit_id=<?php echo $row['id']; ?>">Delete</a>
                            </td>
                        </tr>
                        <?php    
                        }
                        ?>
                     </tbody>
                    </table>
                </div>
            </div>
             
         </div>
    </div>
    <script src="./js/script.js"></script>
</body>
</html>