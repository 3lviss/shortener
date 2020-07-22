<!-- Success Messages -->
<?php if(isset($_GET['success'])): ?>
    <div class="d-flex justify-content-center align-items-center bg-success messages">
        <p class="message"><?php echo $_GET['success']; ?></p> 
    </div>   
<?php else: ?>
    <p><?php echo ''; ?></p>    
<?php endif; ?>

<!-- Error Messages -->
<?php if(isset($_GET['error'])): ?>
    <div class="d-flex justify-content-center align-items-center bg-danger messages">
        <p class="message"><?php echo $_GET['error']; ?></p> 
    </div>   
<?php else: ?>
    <p><?php echo ''; ?></p>    
<?php endif; ?>
