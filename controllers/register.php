<?php
require('../config/init.php');

if(isset($_POST['register']))
{
    $user = new User; // User object
    $validation = new Validation; // Validation object
    
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    // Check if email are empty
    if(empty($email))
    {
        // Error message
        $message = "Email is required";
        header('Location: ../register.php?error=' . $message);
        exit();
    }
    // Check if password are empty
    elseif(empty($password))
    {
        // Error message
        $message = "Password is required";
        header('Location: ../register.php?error=' . $message);
        exit();
    }

    /* Check if email is valid */
    if($validation->validEmail($email))
    {
        // Error message
        $message = "Enter valid email";
        header('Location: ../register.php?error=' . $message);
        exit();
    }

    // Check if email already exists in database
    if($validation->emailExists($email))
    {
        // Error message
        $message = "This email is already in use";
        header('Location: ../register.php?error=' . $message);
        exit();
    }
    else
    {
        // set email
        $user->setEmail($email);
    }

    // Check min length of password
    if($validation->minLength($password))
    {
        // Error message
        $message = "Password minimum length is 6 characters";
        header('Location: ../register.php?error=' . $message);
        exit();
    }
    else
    {
        // set password
        $user->setPassword($password);
    }
    
    
    try
    {
        // If user succassfully registered
        if($user->register())
        {
            // Redirect to login page with success message
            $message = "You are succassefully registered! Now you can sign in.";
            header('Location: ../login.php?success=' . $message);
        } 
    }
    catch(Exception $e)
    {
        echo $e->getMessage();
    }
}
