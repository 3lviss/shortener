<!-- Logout Button-->
<?php if($_SESSION): ?>
    <?php if($_SESSION['is_logged_in'] == true): ?>
        <form action="controllers/logout.php" methoh="GET" class="logout-form">
            <input type="submit" name="logout" value="Logout" class="py-2 px-3">
        </form>
    <?php endif; ?>
<?php else: ?>
<?php endif; ?>