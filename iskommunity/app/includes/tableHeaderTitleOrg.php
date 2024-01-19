<div class="table-header-title">
    <div>
        <?php echo $tableHeader?>
    </div>
    <div class="sort-options-org">
        <p>Sort by:</p>
        <a href="?page-nr=1&s=r" class="<?php echo ($_SESSION['s'] === 'r') ? 'selected' : ''; ?>">Recent</a>
        <a href="?page-nr=1&s=o" class="<?php echo ($_SESSION['s'] === 'o') ? 'selected' : ''; ?>">Oldest</a>
        <a href="?page-nr=1&s=az" class="<?php echo ($_SESSION['s'] === 'az') ? 'selected' : ''; ?>">Name A</a>
        <a href="?page-nr=1&s=za" class="<?php echo ($_SESSION['s'] === 'za') ? 'selected' : ''; ?>">Name Z</a>
        <a href="?page-nr=1&s=caz" class="<?php echo ($_SESSION['s'] === 'caz') ? 'selected' : ''; ?>">College A</a>
        <a href="?page-nr=1&s=cza" class="<?php echo ($_SESSION['s'] === 'cza') ? 'selected' : ''; ?>">College Z</a>
    </div>
</div>
