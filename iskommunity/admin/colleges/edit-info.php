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
                        <li>
                            <a href="edit-info.php?college_id=<?php echo $college       ['college_Code']?>">College Information</a></li>
                            <li><a href="edit-del.php?college_id=<?php echo $college['college_Code']?>">Delete College</a></li>
                        </ul>
                    </div>
                    <form action="" method="post">
                        <h2>College Information</h2>
                        <!-- Form validation -->
                        <?php include(ROOT_PATH . '/app/helpers/formMessage.php')?>
                        <!-- Form validation -->
                        <input type="hidden" name="college_ID" id="id" value="<?php echo $college_id?>">
                        <label for="code">College abbreviation</label>
                        <input type="text" name="college_Code" id="code" value="<?php echo $college_code?>">
                        <label for="name">College name</label>
                        <input type="text" name="college_Name" id="name" value="<?php echo $college_name?>">
                        <div class="buttons">
                            <button type="submit" name="edit-college-info">Save changes</button>
                            <a href="<?php echo $_SESSION['prev-page']?>" class="cancel">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>    
    </div>

</body>
</html>