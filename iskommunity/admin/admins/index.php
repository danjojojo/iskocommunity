<?php
include_once('../../path.php');
include(ROOT_PATH . '/app/controllers/admins.php');

// SEARCH 
$term = isset($_GET['term']) ? $_GET['term'] : '';

// DISPLAY ADMINS
switch($_SESSION['s']){
    // OLDEST
    case 'o':
        $admin_users = ($term != '') ? searchAdmin(urldecode($term)) : selectAllWithOrderLimit($table3, 'created_At', 'ASC', $start, $rows_per_page) ;
        $_SESSION['a_s'] = $_SESSION['s'];
        break;
    // RECENT
    case 'r':
        $admin_users = ($term != '') ? searchAdminRecent(urldecode($term)) : 
        selectAllWithOrderLimit($table3, 'created_At', 'DESC', $start, $rows_per_page) ;
        $_SESSION['a_s'] = $_SESSION['s'];
        break;
    // A-Z
    case 'az':
        $admin_users = ($term != '') ? searchAdminAZ(urldecode($term)) : 
        selectAllWithOrderLimit($table3, 'admin_Username', 'ASC', $start, $rows_per_page) ;
        $_SESSION['a_s'] = $_SESSION['s'];
        break;
    // Z-A
    case 'za':
        $admin_users = ($term != '') ? searchAdminZA(urldecode($term)) : 
        selectAllWithOrderLimit($table3, 'admin_Username', 'DESC', $start, $rows_per_page) ;
        $_SESSION['a_s'] = $_SESSION['s'];
        break;
}

// DISPLAY RECORDS
$tableHeader = ($term !== '') ? "You searched for: <strong>" . htmlspecialchars($term) ."</strong>" : '<h3>List of '.$_SESSION['sort_message'].' admins</h3>';

// STORE PREVIOUS PAGE
$_SESSION['prev-page'] = $_SERVER['REQUEST_URI'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-
    scale=1.0">
    <link rel="stylesheet" href="<?php echo BASE_URL . '/assets/css/dashboard.css'?>">
    <link rel="stylesheet" href="<?php echo BASE_URL . '/assets/css/tables.css'?>">
    <title>Admins</title>
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
                    <h1>Admins</h1>
                    <!-- Message -->
                    <?php include(ROOT_PATH . '/app/helpers/message.php')?>
                    <!-- message -->
                </div>
                <div class="search-create">
                    <div class="search">
                        <form action="" method="post">
                            <input type="text" name="term" placeholder="Tip: @ to display all" value=<?php echo $term?>>
                            <button type="submit" name="search-btn">Search Admin</button>
                        </form>
                    </div>
                    <!-- create New button -->
                    <?php include(ROOT_PATH . '/app/includes/createNew.php')?>
                    <!-- create New button -->
                </div>
 
                <div class="table-header">
                    <!-- Table header title -->
                    <?php include(ROOT_PATH . '/app/includes/tableHeaderTitle.php')?>
                    <!-- Table header title -->
                    
                </div>
                <div class="table">
                    <table>
                        <thead>
                            <th>No.</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Date Created</th>
                            <th>Manage</th>
                        </thead>
                        <tbody>
                            <?php if(!empty($admin_users)):?>
                                <?php foreach ($admin_users as $admin):?>
                                <tr>
                                    <td><?php echo $start+1?></td>
                                    <td><?php echo $admin['admin_Username']?></td>
                                    <td><?php echo $admin['admin_Email']?></td>
                                    <td><?php echo date('F j, Y - g:i a', strtotime($admin['created_At']))?></td>
                                    <td><a href="edit-info.php?admin_id=<?php echo $admin['admin_ID']?>">Edit</a></td>
                                    <?php $start++?>
                                </tr>
                                <?php endforeach;?>
                            <?php else:?>
                                <tr>
                                    <div class="noresult">
                                        <td colspan="5">No results</td>
                                    </div>
                                </tr>
                            <?php endif;?>
                        </tbody>
                    </table>
                </div>
                <div class="content-footer">
                <!-- PAGINATION -->
                <?php 
                if(!isset($_GET['term'])){
                    include(ROOT_PATH . '/app/includes/pagination.php');
                }?>
                <!-- PAGINATION -->
                </div>
            </div>
        </div>    
    </div>

</body>
</html>