<?php
    include "route.php";
    include "Controller/C_stages.php";
    include "Controller/C_user.php";
    //include "Controller/C_login.php";
    //include "Controller/C_accountPHP.php";

    define('BASEPATH','/www/webmaster');

    Route::add('/', function(){
        require('Controller/C_login.php');
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
    Route::add('/Remove', function() {
        Remove($_POST["titre"], $_POST["description"], $_POST["entreprise"]);
    },"post");
    Route::add('/Postulate', function() {
        Postulate($_POST["titre"], $_POST["description"], $_POST["entreprise"]);
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
        Register();
    },"post");

    Route::run(BASEPATH);
?>