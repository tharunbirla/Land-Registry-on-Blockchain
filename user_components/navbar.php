<nav>
    <div class="nav-wrapper white">
        <a href="/home.php" class="black-text brand-logo"><?php echo $site_name?></a>
        <ul class="right hide-on-med-and-down">
            <?php
            if ($_SESSION['role']==1) {
                echo '<li><a class="black-text" href="post.php"><i class="material-icons">add</i></a></li>';
            } elseif ($_SESSION['role']==2) {
                echo '<li><a class="black-text" href="search.php"><i class="material-icons">search</i></a></li>';
            }
            ?>
            <li><a class="black-text" href="logout.php"><i class="material-icons">exit_to_app</i></a></li>
        </ul>
    </div>
</nav>