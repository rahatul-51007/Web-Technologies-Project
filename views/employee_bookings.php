<?php
include_once '../controllers/pageSecurity.php'; // Ensure session check
require_once '../model/employee_booking_query.php';

$bookings = getAllBookings();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Bookings</title>
    <link rel="stylesheet" href="./css/employee_style.css">
</head>
<body>
    <div class="nav-dashboard">
        <?php include_once 'employee_nav.php'; ?>
        
        <div class="dashboard">
            <div class="content-container">
                <h1>Manage Bookings</h1>
                
                <?php if(isset($_SESSION['success_msg'])): ?>
                    <div class="alert alert-success">
                        <?php echo $_SESSION['success_msg']; unset($_SESSION['success_msg']); ?>
                    </div>
                <?php endif; ?>

                <?php if(isset($_SESSION['error_msg'])): ?>
                    <div class="alert alert-error">
                        <?php echo $_SESSION['error_msg']; unset($_SESSION['error_msg']); ?>
                    </div>
                <?php endif; ?>

                <div style="overflow-x:auto;">
                    <table class="styled-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Room Type</th>
                                <th>Check-in</th>
                                <th>Check-out</th>
                                <th>Guest ID</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($row = mysqli_fetch_assoc($bookings)): ?>
                            <tr>
                                <td>#<?php echo $row['id']; ?></td>
                                <td><?php echo htmlspecialchars($row['room_type']); ?></td>
                                <td><?php echo $row['check_in_date']; ?></td>
                                <td><?php echo $row['check_out_date']; ?></td>
                                <td><?php echo $row['guest']; ?></td>
                                <td><span class="status status-<?php echo $row['status']; ?>"><?php echo $row['status']; ?></span></td>
                                <td>
                                    <?php if(strtolower($row['status']) == 'pending'): ?>
                                    <form action="../controllers/employee_booking_controller.php" method="POST" style="display:inline;">
                                        <input type="hidden" name="booking_id" value="<?php echo $row['id']; ?>">
                                        <input type="hidden" name="status" value="Approved">
                                        <button type="submit" class="action-btn btn-confirm">Accept</button>
                                    </form>
                                    <form action="../controllers/employee_booking_controller.php" method="POST" style="display:inline;">
                                        <input type="hidden" name="booking_id" value="<?php echo $row['id']; ?>">
                                        <input type="hidden" name="status" value="Rejected">
                                        <button type="submit" class="action-btn btn-cancel">Reject</button>
                                    </form>
                                    <?php else: ?>
                                        <span style="color: #999; font-size: 0.9em;">No actions</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
