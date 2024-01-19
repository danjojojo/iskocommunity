<?php
include('../../path.php');
include(ROOT_PATH . '/app/controllers/orgs.php');
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
    <title>Edit Organization Profile</title>
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
                    <h1>Edit Organization Profile</h1>
                </div>
                <div class="content-sidebar-form">
                    <div class="content-sidebar">
                        <ul>
                            <li><a href="edit-info.php?org_code=<?php echo $org['org_Code']?>">Org Information</a></li>
                            <li><a href="edit-pass.php?org_code=<?php echo $org['org_Code']?>">Change Password</a></li>
                            <li><a href="edit-del.php?org_code=<?php echo $org['org_Code']?>">Delete Organization</a></li>
                        </ul>
                    </div>
                    <form action="" method="post">
                        <h2>Change Password</h2>
                        <!-- Form validation -->
                        <?php include(ROOT_PATH . '/app/helpers/formMessage.php')?>
                        <!-- Form validation -->                         
                        <input type="hidden" name="stud_ID" value="<?php echo $student_id?>">                   
                        <label for="oldpassword">Current Password</label>
                        <input type="password" name="org_OldPassword" id="oldpassword" value="<?php echo $org_currentpassword?>">
                        <label for="password">New Password</label>
                        <input type="password" name="org_Password" id="password" value="<?php echo $org_newpassword?>">
                        <label for="confirmpassword">Confirm New Password</label>
                        <input type="password" name="confirmpassword" id="confirmpassword" value="<?php echo $confirmpassword?>">
                        <div class="buttons">
                            <button type="submit" name="edit-org-pass">Save changes</button>
                            <a href="<?php echo $_SESSION['prev-page']?>" class="cancel">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>    
    </div>

</body>
</html>