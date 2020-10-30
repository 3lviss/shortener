<?php 
require('../config/init.php');

$short_url = "http://" . $_SERVER["HTTP_HOST"] .  $_SERVER["REQUEST_URI"];

$url = Url::getLongUrl($short_url);

header('Location: ' . $url->long_url);