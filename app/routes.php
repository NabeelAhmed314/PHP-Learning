<?php

    $router->get('','PagesController@login');
    $router->get('index','PagesController@home');
    $router->get('about','PagesController@about');
    $router->get('about/culture','PagesController@aboutCulture');
    $router->get('contact','PagesController@contact');
    $router->get('settings','PagesController@settings');
    $router->get('passwordSetting','PagesController@passwordSetting');
    $router->get('verification','PagesController@verification');
    $router->get('signup','PagesController@signup');
    $router->get('verify','PagesController@verify');
    $router->get('forgetPass','PagesController@forgetPass');
    $router->get('changePass','PagesController@changePass');



    $router->get('users','UsersController@index');
    $router->get('logout','UsersController@logout');

        
    $router->post('signup','UsersController@signup');
    $router->post('login','UsersController@login');
    $router->post('updateSignup','UsersController@update');
    $router->post('updatePassword','UsersController@updatePassword');
    $router->post('changePassword','UsersController@changePassword');
    $router->post('forgetPass','UsersController@forgetPass');

