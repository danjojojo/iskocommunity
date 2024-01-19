<?php
include('../../path.php');
include(ROOT_PATH . '/app/controllers/students.php');
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
    <title>Edit Student Profile</title>
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
                    <h1>Edit Student Profile</h1>
                </div>
                <div class="content-sidebar-form">
                    <div class="content-sidebar">
                        <ul>
                            <li><a href="edit-info.php?student_id=<?php echo $student['stud_ID']?>">Account Information</a></li>
                            <li><a href="edit-pass.php?student_id=<?php echo $student['stud_ID']?>">Change Password</a></li>
                            <li><a href="edit-del.php?student_id=<?php echo $student['stud_ID']?>">Delete Account</a></li>
                        </ul>
                    </div>
                    <form action="" method="post">
                        <h2>Change Password</h2>
                        <!-- Form validation -->
                        <?php include(ROOT_PATH . '/app/helpers/formMessage.php')?>
                        <!-- Form validation -->                         
                        <input type="hidden" name="stud_ID" value="<?php echo $student_id?>">                   
                        <label for="oldpassword">Current Password</label>
                        <input type="password" name="stud_OldPassword" id="oldpassword" value="<?php echo $student_currentpassword?>">
                        <label for="password">New Password</label>
                        <input type="password" name="stud_Password" id="password" value="<?php echo $student_newpassword?>">
                        <label for="confirmpassword">Confirm New Password</label>
                        <input type="password" name="confirmpassword" id="confirmpassword" value="<?php echo $confirmpassword?>">
                        <div class="buttons">
                            <button type="submit" name="edit-stud-pass">Save changes</button>
                            <a href="<?php echo $_SESSION['prev-page']?>" class="cancel">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>    
    </div>

</body>
</html>