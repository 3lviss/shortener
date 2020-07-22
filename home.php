<!-- Include header -->
<?php include('includes/header.php') ?>

<!-- Include logout button -->
<?php include('includes/logout.php') ?>

    <!-- Url-list div -->
    <div class="url-list">

        <!-- convert string to object -->
        <?php $urls = json_decode($_GET['urls']); ?> 

        <!-- If object not empty -->
        <?php if(!empty($urls)): ?>

            <!-- Loop trough that object -->
            <?php foreach($urls as $url): ?>
                
                <div class="card mt-1">
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="<?php echo 'controllers/counter.php?url_id=' . $url->id . '&href=' . $url->long_url; ?>" target="_blank"><?php echo urldecode($url->short_url); ?></a>
                        </h5>
                        <p class="card-text"><span>Long url: </span><?php echo $url->long_url; ?></p>
                        <div class="d-flex justify-content-end">
                            <p class="card-text mr-3 borders"><span>Date: </span><?php echo date("d/m/Y", strtotime($url->date_time)); ?></p>
                            <p class="card-text borders"><span>Clicks: </span><?php echo ($url->clicks == 0) ? 0 : $url->clicks; ?></p>
                        </div>
                    </div>
                </div>

            <?php endforeach; ?>
        <!-- If object is empty -->
        <?php else: ?>
            <h4 class="text-center mt-5">No URLs yet!</h4>
        <?php endif; ?>
    </div> <!-- End od url-list div -->

<!-- Include footer -->
<?php include('includes/footer.php') ?>