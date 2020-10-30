<?php
require('../config/init.php');

if(isset($_POST['shorten']))
{
    $url = new Url; // Url object

    // Check if exists users id, if not set to NULL
    if($_POST['user_id'] === "")
        $user_id = NULL;
    else
        $user_id = $_POST['user_id']; 

    // Long URL
    $long_url = filter_input(INPUT_POST, 'long_url', FILTER_VALIDATE_URL);

    // Check if input are empty
    if(empty($long_url))
    {
        // Error message
        $message = "URL is missing";
        header('Location: ../index.php?error=' . $message);
        exit();
    }
    else
    {
        // Set long url
        $url->setLongUrl($long_url);

        // Urlencode 
        $long_url = urlencode($long_url);

        // Shorten url
        $short_url = Url::shortenUrl();
        $url->setShortUrl($short_url);
    }


    try
    {
        // If url succassfully stored
        if($url->store($user_id))
        {
            // Redirect to index page with long and short url's
            header('Location: ../index.php?short=' . $short_url . '&long=' . $long_url);
        }
    }
    catch(Exception $e)
    {
        echo $e->getMessage();
    }

}