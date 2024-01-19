<?php
include('../path.php');

if(!empty($_SESSION["id"])){
    header("location: " . BASE_URL . '/index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-
    scale=1.0">
    <link rel="stylesheet" href="<?php echo BASE_URL . '/assets/css/dashboard.css'?>">
    <title>Dashboard</title>
</head>
<body>
    <div class="container">
        <!-- Admin Sidebar -->
        <?php include(ROOT_PATH . '/app/includes/adminSidebar.php')?>
        <!-- Admin Sidebar -->

        <div class="dashboardContent">
            <!-- Admin Header -->
            <?php include(ROOT_PATH . '/app/includes/adminHeader.php')?>
            <!-- Admin Header -->

            <div class="content">
                <div class="counter users">  
                </div>
                <div class="counter posts">  
                </div>
                <div class="counter orgs">  
                </div>
                <div class="counter admins">  
                </div>
            </div>
        </div>    
    </div>

</body>
</html>