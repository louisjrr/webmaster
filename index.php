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
    Route::add('/Add', function() {
        Add($_POST["titre"], $_POST["description"], $_POST["entreprise"]);
    },"post");
    Route::add('/Home', function() {
        home();
    },"post");
    Route::add('/NewInternShip', function(){
        NewInternship();
    });
    Route::add('/NewInternShip', function(){
        NewInternship();
    },"post");
    Route::add('/Account', function(){
        require('View/account.php');
    });
    Route::add('/ModifAccount', function(){
        require('View/account.php');
    },"post");
    Route::add('/Register', function(){
        require('View/register.php');
    });
    Route::add('/Saving', function(){
        require('Controller/C_user.php');
    },"post");

    Route::run(BASEPATH);
?>