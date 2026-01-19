<?php
include_once '../controllers/pageSecurity.php';
require_once '../model/employeereq_query.php';
include_once 'nav.php'; // Top bar included here, matching admin_dashboard.php

$pendingLeaves = getPendingLeaves();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Requests</title>
    <link rel="stylesheet" href="./css/admin_style.css">
    <style>
        .content-container { padding: 40px; }
        .req-table { width: 100%; border-collapse: collapse; margin-top: 20px; background: white; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        .req-table th, .req-table td { border: 1px solid #ddd; padding: 12px; text-align: left; }
        .req-table th { background: #333; color: white; }
        .btn-approve { background: #28a745; color: white; padding: 5px 10px; border: none; cursor: pointer; border-radius: 4px; }
        .btn-reject { background: #dc3545; color: white; padding: 5px 10px; border: none; cursor: pointer; border-radius: 4px; }
        .alert { padding: 10px; margin-bottom: 20px; border-radius: 4px; }
        .alert-success { background: #d4edda; color: #155724; }
        .alert-error { background: #f8d7da; color: #721c24; }
    </style>
</head>
<body>
    <div class="nav-dashboard">
        <!-- Sidebar Navigation -->
         <div class="nav">
            <ul class="nav-list">
                <li class="nav-item" ><a href="admin_dashboard.php">Home</a></li>
                <li class="nav-item" ><a href="roomupdate.php">Room Update</a></li>
                <li class="nav-item" ><a href="employeeadd.php">Add/Remove Employee</a></li>
                <li class="nav-item" ><a href="employeereq.php">Request</a></li>
                <li class="nav-item" ><a href="summary.php">Summary</a></li>
            </ul>
         </div>
        
        <div class="dashboard">
            <div class="content-container">
                <h1>Employee Request Management</h1>
                
                <?php if(isset($_SESSION['success_msg'])): ?>
                    <div class="alert alert-success"><?php echo $_SESSION['success_msg']; unset($_SESSION['success_msg']); ?></div>
                <?php endif; ?>
                <?php if(isset($_SESSION['error_msg'])): ?>
                    <div class="alert alert-error"><?php echo $_SESSION['error_msg']; unset($_SESSION['error_msg']); ?></div>
                <?php endif; ?>

                <h3>Pending Leave Requests</h3>
                <?php if (mysqli_num_rows($pendingLeaves) > 0): ?>
                <table class="req-table">
                    <thead>
                        <tr>
                            <th>Req ID</th>
                            <th>Emp ID</th>
                            <th>Employee Name</th>
                            <th>Request Type</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = mysqli_fetch_assoc($pendingLeaves)): ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['emp_id']; ?></td>
                            <td><?php echo htmlspecialchars($row['employee_name']); ?></td>
                            <td><?php echo htmlspecialchars($row['leave_type']); ?></td>
                            <td><?php echo $row['start_date']; ?></td>
                            <td><?php echo $row['end_date']; ?></td>
                            <td><?php echo $row['status']; ?></td>
                            <td>
                                <form action="../controllers/employeereq_controller.php" method="POST" style="display:inline;">
                                    <input type="hidden" name="req_id" value="<?php echo $row['id']; ?>">
                                    <input type="hidden" name="action" value="Approved">
                                    <button type="submit" class="btn-approve">Approve</button>
                                </form>
                                <form action="../controllers/employeereq_controller.php" method="POST" style="display:inline;">
                                    <input type="hidden" name="req_id" value="<?php echo $row['id']; ?>">
                                    <input type="hidden" name="action" value="Rejected">
                                    <button type="submit" class="btn-reject">Reject</button>
                                </form>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
                <?php else: ?>
                    <p>No pending requests found.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</body>
</html>
