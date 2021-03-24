<?php
    include "route.php";
    include "Controller/C_stages.php";

    define('BASEPATH','/www/webmaster');

    Route::add('/', function(){
        require('View/login.php');
    });
    Route::add('/InConnection', function(){
        require('Model/M_login.php');
    },"post");
    Route::add('/Home', function() {
        home();
    });
    Route::add('/NewInternShip', function(){
        NewInternship();
    });
    Route::add('/Account', function(){
        require('View/account.php');
    });
    Route::add('/ModifAccount', function(){
        require('View/account.php');
    },"post");
    Route::run(BASEPATH);
?>