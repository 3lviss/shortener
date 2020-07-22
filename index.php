<!-- Include header -->
<?php include('includes/header.php') ?>

<!-- Include logout button -->
<?php include('includes/logout.php') ?>

    <!-- Shorten url div -->
    <div class="shorten-url">
        <form action="controllers/shorter.php" method="POST" class="d-flex justify-content-center">
            <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'] ?? null; ?>">
            <input type="text" name="long_url" placeholder="Paste your URL" class="pl-2 py-1">
            <input type="submit" name="shorten" value="Shorten">
        </form>
    </div>

    <!-- url-list div -->
    <div class="url-list">

        <!-- If isset long and short url's in GET -->
        <?php if(isset($_GET['long']) && isset($_GET['short'])): ?>

            <div class="card mt-5">
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="<?php echo 'controllers/redirect.php?long=' . $_GET['long']; ?>" target="_blank"><?php echo $_GET['short']; ?></a>
                    </h5>
                    <p class="card-text"><span>Long url: </span><?php echo $_GET['long']; ?></p>
                    <p class="card-text mr-3 borders"><span>Date: </span><?php echo date("d/m/Y", time()); ?></p>
                </div>
            </div>

        <?php endif; ?>

    </div><!-- end url-list div -->

    <!-- If SESSION is empty -->
    <?php if(empty($_SESSION)): ?>

        <!-- Advertise div -->
        <div class="d-flex flex-column align-items-center ads">
            <p class="text-center">Want to know how many clicks has Your link?</p>
            <p class="text-center">Want to track all previous links?</p>
            <p class="text-center">Sign up <span>now</span>, it's <span>free!</span></p>
        </div>

    <?php endif; ?>

<!-- Include footer -->
<?php include('includes/footer.php') ?>