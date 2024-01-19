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
    <link rel="stylesheet" href="<?php echo BASE_URL . '/assets/css/create.css'?>">
    <title>Create Admin</title>
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
                    <h1>Create Admin</h1>
                </div>
                <div class="content-sidebar-form">
                    <form action="create.php" method="post">

                        <!-- Form validation -->
                        <?php include(ROOT_PATH . '/app/helpers/formMessage.php')?>
                        <!-- Form validation -->

                        <label for="username">Username</label>
                        <input type="text" name="admin_Username" id="username" value="<?php echo $username?>">
                        <label for="email">Email Address</label>
                        <input type="email" name="admin_Email" id="email" value="<?php echo $email?>">
                        <label for="password">Password</label>
                        <input type="password" name="admin_Password" id="password" value="<?php echo $password?>">
                        <label for="confirmpassword">Confirm  Password</label>
                        <input type="password" name="confirmpassword" id="confirmpassword" value="<?php echo $confirmpassword?>">
                        <div class="buttons">
                            <button type="submit" name="create-admin">Create</button>
                            <a href="<?php echo $_SESSION['prev-page']?>" class="cancel">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>    
    </div>

</body>
</html>