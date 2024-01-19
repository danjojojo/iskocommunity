<div class="table-header-title">
    <div>
        <?php echo $tableHeader?>
    </div>
    <div class="sort-options">
        <p>Sort by:</p>
        <a href="?page-nr=1&s=r" class="<?php echo ($_SESSION['s'] === 'r') ? 'selected' : ''; ?>">Recent</a>
        <a href="?page-nr=1&s=o" class="<?php echo ($_SESSION['s'] === 'o') ? 'selected' : ''; ?>">Oldest</a>
        <a href="?page-nr=1&s=az" class="<?php echo ($_SESSION['s'] === 'az') ? 'selected' : ''; ?>">A-Z</a>
        <a href="?page-nr=1&s=za" class="<?php echo ($_SESSION['s'] === 'za') ? 'selected' : ''; ?>">Z-A</a>
    </div>
</div>
