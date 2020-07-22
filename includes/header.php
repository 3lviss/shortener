<?php
switch($_SERVER['PHP_SELF']){
    case '/shortener/index.php':
        $pageTitle = 'Index';
        break;
    case '/shortener/register.php':
        $pageTitle = 'Register';
        break;
    case '/shortener/login.php':
        $pageTitle = 'Login';
        break;
    case '/shortener/home.php':
        $pageTitle = 'Home';
        break;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@200&display=swap" rel="stylesheet">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Title -->
    <title>URL Shortener | <?php echo $pageTitle; ?></title>
</head>
<body>

    <!-- Require init file -->
    <?php require('config/init.php') ?>

    <!-- Include Navbar -->
    <?php include('includes/navbar.php') ?>

    <!-- Include Messages (succes, error) -->
    <?php include('includes/messages.php') ?>

    <!-- Container div -->
    <div class="container">