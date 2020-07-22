<!-- Include header -->
<?php include('includes/header.php') ?>

    <h2 class="text-center log-reg-title">Sign In</h2>
    
    <div class="d-flex align-items-center justify-content-center p-5">
        <form action="controllers/login.php" method="POST" class="d-flex flex-column justify-content-center align-items-center">
            <input type="email" name="email" placeholder="Enter Your Email" class="mb-5 px-2">
            <input type="password" name="password" placeholder="Enter Your Password" class="mb-5 px-2">
            <input type="submit" name="login" value="Login" class="py-1 log-reg-submit">
        </form>
    </div>

<!-- Include footer -->
<?php include('includes/footer.php') ?>