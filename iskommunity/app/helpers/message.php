<?php if(isset($_SESSION['message'])): ?>
    <div class="msg">
        <p><?php echo ($_SESSION['message']);?></p>
    </div>
    <?php 
    unset($_SESSION['message']);
    ?>
<?php endif;?>