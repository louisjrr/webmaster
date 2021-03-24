<?php
    include "route.php";
    include "Controller/C_stages.php";

    define('BASEPATH','/www/webmaster');

    Route::add('/', function() {
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