<!-- Navbar -->
<nav class="d-flex align-items-center justify-content-center">
    <div>
        <h1><a href="index.php">URL Shortener</a></h1>
        <hr>
        <div class="d-flex align-items-center justify-content-between justify-content-md-around links-group">

            <?php if($_SESSION): ?>

                <?php if($_SESSION['is_logged_in'] == true): ?>
                    <form action="controllers/home.php" method="GET">
                        <input type="submit" name="home" value="<?php echo $_SESSION['email']; ?>" class="users-email">
                    </form>
                <?php endif; ?>

            <?php else: ?>
                <?php $activePage = basename($_SERVER['PHP_SELF'], ".php"); ?>
                    <a class="<?php echo ($activePage == 'login') ? 'active' : ''; ?>" href="login.php">Sign In</a>
                    <a class="<?php echo ($activePage == 'register') ? 'active' : ''; ?>" href="register.php">Sign Up</a>
            <?php endif; ?>

        </div>
    </div>
</nav>