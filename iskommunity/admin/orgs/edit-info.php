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
    <link rel="stylesheet" href="<?php echo BASE_URL . '/assets/css/create.css'?>">
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
                        <h2>Organization Information</h2>
                        <!-- Form validation -->
                        <?php include(ROOT_PATH . '/app/helpers/formMessage.php')?>
                        <!-- Form validation -->
                        <label for="code">College</label>
                        <select name="college_Code" id="code">
                            <option value="default" <?php echo ($college_code === 'default') ? 'selected' : '' ?>> -- Please select NONE if not affiliated with any college</option>
                            <?php foreach($colleges as $college):?>
                                <option value="<?php echo $college['college_Code']?>" <?php echo ($college_code === $college['college_Code']) ? 'selected' : ''?>><?php echo $college['college_Code'] . ' - ' . $college['college_Name']; ?></option>
                            <?php endforeach;?>
                        </select>
                        <label for="orgCode">Org abbreviation</label>
                        <input type="text" name="org_Code" id="orgCode" value="<?php echo $org_code?>">
                        <label for="name">Organization name</label>
                        <input type="text" name="org_Name" id="name" value="<?php echo $org_name?>">
                        <label for="username">Username</label>
                        <input type="text" name="org_Username" id="username" value="<?php echo $org_username?>">
                        <label for="email">Email</label>
                        <input type="email" name="org_Email" id="email" value="<?php echo $org_email?>">
                        <label for="interest">Interest</label>
                        <select name="org_Interest" id="interest">
                            <option value="default" <?php echo ($org_interest === 'default') ? 'selected' : ''; ?>>
                                -- Please select an interest --
                            </option>
                            <option value="technology" <?php echo ($org_interest === 'technology') ? 'selected' : ''; ?>>Technology</option>
                            <option value="dance" <?php echo ($org_interest === 'dance') ? 'selected' : ''; ?>>Dance</option>
                            <option value="music" <?php echo ($org_interest === 'music') ? 'selected' : ''; ?>>Music</option>
                            <option value="engineering" <?php echo ($org_interest === 'engineering') ? 'selected' : ''; ?>>Engineering</option>
                        </select>
                        <div class="buttons">
                            <button type="submit" name="edit-org-info">Save changes</button>
                            <a href="<?php echo $_SESSION['prev-page']?>" class="cancel">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>    
    </div>

</body>
</html>