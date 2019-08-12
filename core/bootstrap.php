<?php

use App\core\App;

App::bind('config',require'config.php');

App::bind('database', new Querybuilder(
    Connection::make(
        App::get('config')['database']
        )
    )
);

function view($view,$data=[]){
    extract($data);
    return require "app/views/{$view}.view.php";
}

function redirect($view){
    header("location: /{$view}");
}