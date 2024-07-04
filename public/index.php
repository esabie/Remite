<?php

require '../helpers.php';

require basePath('/views/register.php');

$routes = [
    '/' => 'controllers/home.php',
    '/send-money' => 'controllers/register.php',
];

$uri = $_SERVER['REQUEST_URI'];