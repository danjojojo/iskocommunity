<div class="pagination">
    <a href="?page-nr=1">First</a>
    <?php if(isset($_GET['page-nr']) && $_GET['page-nr'] > 1):?>
            <a href="?page-nr=<?php echo $_GET['page-nr'] - 1?><?php echo '&s='.$_SESSION['s']?>">Prev</a>
    <?php endif;?>

    <?php for($i = 1; $i <= $pages; $i++):?>
            <a href="?page-nr=<?php echo $i.'&s='.$_SESSION['s']?>"><?php echo $i?></a>
    <?php endfor;?>
    
    <?php if(isset($_GET['page-nr']) && $_GET['page-nr'] < $pages):?>
            <a href="?page-nr=<?php echo $_GET['page-nr'] + 1?><?php echo '&s='.$_SESSION['s']?>">Next</a>
    <?php endif;?>
    <a href="?page-nr=<?php echo $pages?>">Last</a>
</div>