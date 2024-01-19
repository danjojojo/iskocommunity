<?php
include('../../path.php');
include(ROOT_PATH . '/app/controllers/colleges.php');
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
    <title>Edit College Profile</title>
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
                    <h1>Edit College Profile</h1>
                </div>
                <div class="content-sidebar-form">
                    <div class="content-sidebar">
                        <ul>
                            <li><a href="edit-info.php?college_id=<?php echo $college['college_Code']?>">College Information</a></li>
                            <li><a href="edit-del.php?college_id=<?php echo $college['college_Code']?>">Delete College</a></li>
                        </ul>
                    </div>
                    <form action="" method="post">
                        <!-- Form validation -->
                        <?php include(ROOT_PATH . '/app/helpers/formMessage.php')?>
                        <!-- Form validation -->
                        <h2>Delete College</h2>                     
                        <p>Deleting this college is a permanent and irreversible action.
                           This process will put all affiliated student organizations to be temporarily unaffiliated with any college.
                           Once initiated, this action cannot be undone or recovered.
                        </p>
                        <br>
                        <p>To delete <strong><?php echo $college_name?></strong>, enter current admin's password for verification.</p>
                        <br>   
                        <input type="hidden" name="college_ID" id="id" value="<?php echo $college_id?>">                  
                        <label for="password">Password</label>
                        <input type="password" name="admin_Password" id="password" value="<?php echo $password?>">
                        <div class="buttons">
                            <button type="submit" name="edit-college-del">Delete College</button>
                            <a href="<?php echo $_SESSION['prev-page']?>" class="cancel">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>    
    </div>

</body>
</html>