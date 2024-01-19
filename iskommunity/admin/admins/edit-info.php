<?php
include('../../path.php');
include(ROOT_PATH . '/app/controllers/admins.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-
    scale=1.0">
    <link rel="stylesheet" href="<?php echo BASE_URL . '/assets/css/dashboard.css'?>">
    <link rel="stylesheet" href="<?php echo BASE_URL . '/assets/css/tables.css'?>">
    <link rel="stylesheet" href="<?php echo BASE_URL . '/assets/css/edit-users.css'?>">
    <title>Edit Admin Profile</title>
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
                <div class="content-header">
                    <h1>Edit Admin Profile</h1>
                </div>
                <div class="content-sidebar-form">
                    <div class="content-sidebar">
                        <ul>
                            <li><a href="edit-info.php?admin_id=<?php echo $admin['admin_ID']?>">Account Information</a></li>
                            <li><a href="edit-pass.php?admin_id=<?php echo $admin['admin_ID']?>">Change Password</a></li>
                            <li><a href="edit-del.php?admin_id=<?php echo $admin['admin_ID']?>">Delete Account</a></li>
                        </ul>
                    </div>
                    <form action="" method="post">
                        <h2>Account Information</h2>
                        <!-- Form validation -->
                        <?php include(ROOT_PATH . '/app/helpers/formMessage.php')?>
                        <!-- Form validation -->
                        <input type="hidden" name="admin_ID" value="<?php echo $admin_id?>">
                        <label for="username">Username</label>
                        <input type="text" name="admin_Username" id="username" value="<?php echo $admin_username?>">
                        <label for="email">Email Address</label>
                        <input type="email" name="admin_Email" id="email" value="<?php echo $admin_email?>">
                        <div class="buttons">
                            <button type="submit" name="edit-admin-info">Save changes</button>
                            <a href="<?php echo $_SESSION['prev-page']?>" class="cancel">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>    
    </div>

</body>
</html>