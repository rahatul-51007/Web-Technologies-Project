<?php
include_once '../controllers/pageSecurity.php';
?>
    <!-- div title -->
    <div>
        <div class="admin-title">
            <p></p>
            <p>Welcome, <?php echo isset($_SESSION['name']) ? $_SESSION['name'] : 'Anonymous User'; ?></p>
            <a href="../controllers/logout.php" class="logout">Logout</a>
        </div>
    </div>
    <div class="nav-dashboard">
        
    </div>
