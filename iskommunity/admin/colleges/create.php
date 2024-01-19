<?php
include('../../path.php');
include(ROOT_PATH . '/app/controllers/colleges.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo BASE_URL . '/assets/css/dashboard.css'?>">
    <link rel="stylesheet" href="<?php echo BASE_URL . '/assets/css/tables.css'?>">
    <link rel="stylesheet" href="<?php echo BASE_URL . '/assets/css/create.css'?>">
    <title>Add College</title>
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
                    <h1>Add College</h1>
                </div>
                <div class="content-sidebar-form">
                    <form action="create.php" method="post">
                        <!-- FORM VALIDATION -->
                        <?php include(ROOT_PATH . '/app/helpers/formMessage.php')?>
                        <!-- FORM VALIDATION -->
                        <label for="code">College abbreviation</label>
                        <input type="text" name="college_Code" id="code" value="<?php echo $college_code?>">
                        <label for="name">College name</label>
                        <input type="text" name="college_Name" id="name" value="<?php echo $college_name?>">
                        <div class="buttons">
                            <button type="submit" name="add-college">Add</button>
                            <a href="<?php echo $_SESSION['prev-page']?>" class="cancel">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>    
    </div>

</body>
</html>