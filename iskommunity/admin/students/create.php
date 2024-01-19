<?php
include('../../path.php');
include(ROOT_PATH . '/app/controllers/students.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo BASE_URL . '/assets/css/dashboard.css'?>">
    <link rel="stylesheet" href="<?php echo BASE_URL . '/assets/css/tables.css'?>">
    <link rel="stylesheet" href="<?php echo BASE_URL . '/assets/css/create.css'?>">
    <title>Create Student</title>
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
                    <h1>Create Student</h1>
                </div>
                <div class="content-sidebar-form">
                    <form action="create.php" method="post">
                        <!-- FORM VALIDATION -->
                        <?php include(ROOT_PATH . '/app/helpers/formMessage.php')?>
                        <!-- FORM VALIDATION -->
                        <label for="email">Enter your webmail</label>
                        <input type="email" name="stud_Webmail" id="email" value="<?php echo $email?>">
                        <label for="username">Enter your username</label>
                        <input type="text" name="stud_Username" id="username" value="<?php echo $username?>">
                        <label for="password">Password</label>
                        <input type="password" name="stud_Password" id="password" value="<?php echo $password?>">
                        <label for="confirmpassword">Confirm your password</label>
                        <input type="password" name="confirmpassword" id="confirmpassword" value="<?php echo $confirmpassword?>">
                        <div class="buttons">
                            <button type="submit" name="create-stud">Create</button>
                            <a href="<?php echo $_SESSION['prev-page']?>" class="cancel">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>    
    </div>

</body>
</html>