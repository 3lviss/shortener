<?php
require('../config/init.php');
                    
if(isset($_GET['href']))
{
    $url = new Url; // Url object

    $url_id = $_GET['url_id'];
        
    try
    {
        if($url->counter($url_id))
            header('Location: ' . $_GET['href'] . '');
    }
    catch(Exception $e)
    {
        echo $e->getMessage();
    }
}

