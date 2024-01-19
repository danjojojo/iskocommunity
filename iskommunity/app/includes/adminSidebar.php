<?php include_once(ROOT_PATH . '/app/database/db.php');?>

<div class="adminSidebar">
    <a class="logo" href="<?php echo BASE_URL . '/index.php'?>">Logo</a>
    <ul>
        <li><a href="<?php echo BASE_URL . '/admin/dashboard.php'?>">Home</a></li>
        <li><a href="<?php if(isset($_SESSION['a_s'])) { echo BASE_URL . '/admin/admins/index.php?page-nr=1&s='. $_SESSION['a_s']; } else { echo BASE_URL . '/admin/admins/index.php?page-nr=1&s=r'; }?>">Admins</a></li>
        <li><a href="<?php if(isset($_SESSION['s_s'])) { echo BASE_URL . '/admin/students/index.php?page-nr=1&s='. $_SESSION['s_s']; } else { echo BASE_URL . '/admin/students/index.php?page-nr=1&s=r'; }?>">Students</a></li>
        <li><a href="<?php if(isset($_SESSION['c_s'])) { echo BASE_URL . '/admin/colleges/index.php?page-nr=1&s='. $_SESSION['c_s']; } else { echo BASE_URL . '/admin/colleges/index.php?page-nr=1&s=r'; }?>">Colleges</a></li>
        
        <li><a href="<?php echo BASE_URL . '/admin/orgs/index.php?page-nr=1'?>">Organizations</a></li>
        <li><a href="<?php echo BASE_URL . '/admin/posts/index.php'?>">Posts</a></li>
        <li><a href="<?php echo BASE_URL . '/admin/tickets/index.php'?>">Support Tickets</a></li>
    </ul>
    <!-- <a class="logout" href="#">Log-out</a> -->
</div>


