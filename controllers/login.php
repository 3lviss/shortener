<?php
require('../config/init.php');

if(isset($_POST['login']))
{
    $user = new User; // User object
    $validation = new Validation; // Validation object
    
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    // Check if inputs are empty
    if(empty($email) || empty($password))
    {
        $message = "Email and password are required";
        header('Location: ../login.php?error=' . $message);
        exit();
    }

    // Set users email and password
    $user->setEmail($email);
    $user->setPassword($password);

    try
    {
        // If login successfully
        if($row = $user->login())
        {
            // Set users data
            $user->setUserData($row);

            // Redirect to index page
            header('Location: ../index.php');
            exit();
        }
        else
        {
            // If login is unsuccessful, redirect to login with error message
            $message = "Wrong email or password. Try again";
            header('Location: ../login.php?error=' . $message);
            exit();
        }
    }
    catch(Exception $e)
    {
        echo $e->getMessage();
    }
}