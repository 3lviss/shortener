<?php

if(!session_id()) 
    session_start();

require_once('config.php');

//Autoloader
spl_autoload_register(function($class) 
{
    include '../classes/' . $class . '.class.php';
})

?>