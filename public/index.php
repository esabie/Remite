<?php

require '../helpers.php';

require basePath('/views/signup.php');

$routes = [
    '/' => 'home.php',
    '/register.php' => 'views/register.php',
];

$uri = $_SERVER['REQUEST_URI'];

if ($uri == '/') {

    require 'views/home.php';

} else if ($uri == '/register.php') {

    require 'views/register.php';

}