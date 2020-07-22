<?php
require('../config/init.php');

if(isset($_GET['logout']))
{
    $user = new User; // User object
    
    try
    {
        // If logout is succassful
        if($user->logout())
        {
            // Redirect to index
            header('Location: ../index.php');
            exit();
        }
        else
        {
            // If logout is unsuccessful, redirect to index with error message
            $message = 'Something went wrong, try again';
            header('Location: ../index.php?error=' . $message);
            exit();
        }
    }
    catch(Exception $e)
    {
        echo $e->getMessage();
    }
}
?>