<?php 
include_once(ROOT_PATH . '/app/database/db.php');
?>

<div class="adminHeader">
    <div class="title">
        <h2>Dashboard</h2>
        <p id="date"></p>
    </div>
    <div class="profile">
        <div class="profile-pic"></div>
        <a href="<?php echo BASE_URL . '/admin/admins/edit-info.php?admin_id='.$_SESSION['id'];?>"><p><?php echo $_SESSION['username'];?></p></a>
    </div>
</div>

<script defer src="<?php echo BASE_URL . '/assets/js/script.js'?>"></script>
