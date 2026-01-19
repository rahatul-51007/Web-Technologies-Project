<?php
include_once '../controllers/pageSecurity.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Dashboard</title>
    <link rel="stylesheet" href="./css/employee_style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
    <div class="nav-dashboard">
        <!-- Include the new employee navigation -->
        <?php include_once 'employee_nav.php'; ?>
        
        <div class="dashboard">           
            <div class="content-container">
                <h1>Dashboard</h1>
                <p>Welcome back, <?php echo isset($_SESSION['name']) ? htmlspecialchars($_SESSION['name']) : 'Employee'; ?>!</p>
                
                <div class="card-container">
                    <div class="card">
                        <i class="fa-solid fa-bed fa-2x" style="color: var(--accent-color);"></i>
                        <h3>Bookings</h3>
                        <p>Manage hotel reservations.</p>
                        <a href="employee_bookings.php" class="action-btn" style="background:var(--accent-color); color:white; text-decoration:none;">View All</a>
                    </div>
                    <div class="card">
                        <i class="fa-solid fa-calendar-days fa-2x" style="color: var(--warning);"></i>
                        <h3>Leaves</h3>
                        <p>Check your leave status.</p>
                        <a href="leave.php" class="action-btn" style="background:var(--warning); color:white; text-decoration:none;">My Leaves</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
