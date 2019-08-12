<?php

    use App\core\{Request, Router};
    require 'vendor/autoload.php';
    require 'core/bootstrap.php';
 
    Router::load('app/routes.php')
        ->direct(Request::getURI(),Request::getMethod());