<?php
require('../config/init.php');

if(isset($_SESSION['is_logged_in']))
{
    $user_id = $_SESSION['user_id'];

    try
    {
        // Send all URLs of authenticated user
        $urls = Url::getAllUrls($user_id);

        header('Location: ../home.php?urls=' . htmlentities($urls)); 
    }
    catch(Exception $e)
    {
        echo $e->getMessage();
    }
}