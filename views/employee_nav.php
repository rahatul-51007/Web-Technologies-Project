<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// Basic security check to ensure only employees can access
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'employee') {
    header("Location: ../views/log_reg.php");
    exit();
}
?>
<!-- Shared Navigation for Employee Pages -->
<div class="nav">
    <div class="admin-title" style="margin-bottom: 20px; text-align: center;">
        <h3 style="color: white; margin: 0; padding: 20px 0; border-bottom: 1px solid rgba(255,255,255,0.1);">Grand Choice</h3>
    </div>
    
    <div class="admin-title" style="color: #bdc3c7;">
        <p><small>Logged in as:</small><br><strong><?php echo isset($_SESSION['name']) ? htmlspecialchars($_SESSION['name']) : 'Employee'; ?></strong></p>
    </div>

    <ul class="nav-list">
        <li class="nav-item"><a href="employee_dashboard.php"><i class="fa-solid fa-house" style="margin-right: 10px;"></i> Dashboard</a></li>
        <li class="nav-item"><a href="leave.php"><i class="fa-solid fa-calendar-check" style="margin-right: 10px;"></i> Request Leave</a></li>
        <li class="nav-item"><a href="employee_bookings.php"><i class="fa-solid fa-book-open" style="margin-right: 10px;"></i> Manage Bookings</a></li>
        <li class="nav-item"><a href="../controllers/logout.php" style="color: #e74c3c;"><i class="fa-solid fa-right-from-bracket" style="margin-right: 10px;"></i> Logout</a></li>
    </ul>
</div>
