<?php
include_once('../../path.php');
include(ROOT_PATH . '/app/controllers/orgs.php');

// SEARCH 
$term = isset($_GET['term']) ? $_GET['term'] : '';

// DISPLAY ORGS
switch($_SESSION['s']){
    // OLDEST
    case 'o':
        $orgs = ($term != '') ? 
        searchOrg(urldecode($term), 'created_At', 'ASC')  : 
        selectAllWithOrderLimit($table2, 'created_At', 'ASC', $start, $rows_per_page) ;
        $_SESSION['o_s'] = $_SESSION['s'];
        break;
    // RECENT
    case 'r':
        $orgs = ($term != '') ? 
        searchOrg(urldecode($term), 'created_At', 'DESC') : 
        selectAllWithOrderLimit($table2, 'created_At', 'DESC', $start, $rows_per_page) ;
        $_SESSION['o_s'] = $_SESSION['s'];
        break;
    // A-Z
    case 'az':
        $orgs = ($term != '') ? 
        searchOrg(urldecode($term), 'org_Name', 'ASC') : 
        selectAllWithOrderLimit($table2, 'org_Name', 'ASC', $start, $rows_per_page) ;
        $_SESSION['o_s'] = $_SESSION['s'];
        break;
    // Z-A
    case 'za':
        $orgs = ($term != '') ? 
        searchOrg(urldecode($term), 'org_Name', 'DESC') : 
        selectAllWithOrderLimit($table2, 'org_Name', 'DESC', $start, $rows_per_page) ;
        $_SESSION['o_s'] = $_SESSION['s'];
        break;
    // College A-Z
    case 'caz':
        $orgs = ($term != '') ? 
        searchOrg(urldecode($term), 'college_Code', 'ASC') : 
        selectAllWithOrderLimit($table2, 'college_Code', 'ASC', $start, $rows_per_page) ;
        $_SESSION['o_s'] = $_SESSION['s'];
        break;
    // College Z-A
    case 'cza':
        $orgs = ($term != '') ? 
        searchOrg(urldecode($term), 'college_Code', 'DESC') : 
        selectAllWithOrderLimit($table2, 'college_Code', 'DESC', $start, $rows_per_page) ;
        $_SESSION['o_s'] = $_SESSION['s'];
        break;
}

$tableHeader = ($term !== '') ? "You searched for: <strong>" . htmlspecialchars($term) ."</strong>"  : '<h3>List of '.$_SESSION['sort_message'].' organizations</h3>';

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
    <title>Organizations</title>
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
                    <h1>Organizations</h1>
                    <!-- Message -->
                    <?php include(ROOT_PATH . '/app/helpers/message.php')?>
                    <!-- message -->
                </div>
                <div class="search-create">
                    <div class="search">
                        <form action="" method="post">
                            <input type="text" name="term" placeholder="Search orgs here" value=<?php echo $term?>>
                            <button type="submit" name="search-btn">Search Org</button>
                        </form>
                    </div>
                    <!-- create New button -->
                    <?php include(ROOT_PATH . '/app/includes/createNew.php')?>
                    <!-- create New button -->
                </div>
 
                <div class="table-header">
                    <!-- Table header title -->
                    <?php include(ROOT_PATH . '/app/includes/tableHeaderTitleOrg.php')?>
                    <!-- Table header title -->
                </div>
                <div class="table">
                    <table>
                        <thead>
                            <th>No.</th>
                            <th>College</th>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Date Created</th>
                            <th>Manage</th>
                        </thead>
                        <tbody>
                        <?php if(!empty($orgs)):?>
                            <?php foreach ($orgs as $org):?>
                                <tr>
                                    <td><?php echo $start+1?></td>
                                    <td><?php echo $org['college_Code']?></td>
                                    <td><?php echo $org['org_Code']?></td>
                                    <td><?php echo $org['org_Name']?></td>
                                    <td><?php echo $org['org_Username']?></td>
                                    <td><?php echo date('F j, Y - g:i a', strtotime($org['created_At']))?></td>
                                    <td><a href="edit-info.php?org_code=<?php echo $org['org_Code']?>">Edit</a></td>
                                    <?php $start++;?>
                                </tr>
                            <?php endforeach;?>
                        <?php else:?>
                                <tr>
                                    <div class="noresult">
                                        <td colspan="7">No results</td>
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