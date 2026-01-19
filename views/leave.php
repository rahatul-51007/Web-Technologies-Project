<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// Check role to decide which nav to include
$isEmployee = isset($_SESSION['role']) && $_SESSION['role'] === 'employee';
$isAdmin = isset($_SESSION['role']) && $_SESSION['role'] === 'admin';

// Helper to include query
require_once '../model/leave_query.php';
$userId = isset($_SESSION['id']) ? $_SESSION['id'] : null;
// If employee, pass ID to filter. If admin, pass null (or handle differently, but Admin usually uses employeereq)
// Actually, for this page `leave.php`, if Admin uses it, they might want to see all history?
// The prompt said "employee only view its own leave requests only".
// It implies `getAllLeaves` handles the filtering if ID is passed.
$leaves = getAllLeaves($isEmployee ? $userId : null);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave Management</title>
    <?php if ($isEmployee): ?>
        <link rel="stylesheet" href="./css/employee_style.css">
    <?php else: ?>
        <link rel="stylesheet" href="./css/leave_style.css">
        <link rel="stylesheet" href="./css/admin_style.css">
    <?php endif; ?>
</head>
<body>
    <div class="nav-dashboard">
        <!-- Dynamic Nav -->
         <?php 
         if ($isEmployee) {
             include_once 'employee_nav.php'; 
         } else {
             include_once 'nav.php';
         ?>
         <!-- Admin Navigation (Restored) -->
         <div class="nav">
            <ul class="nav-list">
                <li class="nav-item" ><a href="admin_dashboard.php">Home</a></li>
                <li class="nav-item" ><a href="roomupdate.php">Room Update</a></li>
                <li class="nav-item" ><a href="employeeadd.php">Add/Remove Employee</a></li>
                <li class="nav-item" ><a href="leave.php">Leave Request</a></li>
                <li class="nav-item" ><a href="report.php">Summary</a></li>
            </ul>
         </div>
         <?php
         }
         ?>

         <div class="dashboard">
            <div class="<?php echo $isEmployee ? 'content-container' : 'admin-content'; ?>">
                <h1>Leave Management</h1>

                <!-- Display Messages -->
                <?php if(isset($_SESSION['success_msg'])): ?>
                    <div class="alert alert-success"><?php echo $_SESSION['success_msg']; unset($_SESSION['success_msg']); ?></div>
                <?php endif; ?>
                <?php if(isset($_SESSION['error_msg'])): ?>
                    <div class="alert alert-error"><?php echo $_SESSION['error_msg']; unset($_SESSION['error_msg']); ?></div>
                <?php endif; ?>

                <?php if ($isEmployee): ?>
                <!-- Employee: Apply for Leave -->
                <div class="leave-form">
                    <h3>Request Leave</h3>
                    <form action="../controllers/leave_controller.php" method="POST">
                        <label>Leave Type</label>
                        <select name="leave_type" required>
                            <option value="Sick">Sick</option>
                            <option value="Casual">Casual</option>
                            <option value="Annual">Annual</option>
                        </select>
                        
                        <label>Start Date</label>
                        <input type="date" name="start_date" required>
                        
                        <label>End Date</label>
                        <input type="date" name="end_date" required>
                        
                        <button type="submit">Submit Request</button>
                    </form>
                </div>
                <?php endif; ?>

                <!-- Shared: View Leaves -->
                <h3>Leave History</h3>
                <table class="<?php echo $isEmployee ? 'styled-table' : 'leave-table'; ?>">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Type</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = mysqli_fetch_assoc($leaves)): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo htmlspecialchars($row['leave_type']); ?></td>
                            <td><?php echo $row['start_date']; ?></td>
                            <td><?php echo $row['end_date']; ?></td>
                            <td><span class="<?php echo $isEmployee ? 'status status-' . $row['status'] : 'status-' . $row['status']; ?>"><?php echo $row['status']; ?></span></td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>

            </div>
         </div>                
    </div>  
</body>
</html>