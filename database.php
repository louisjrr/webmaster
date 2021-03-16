<?php
    session_start();
    function connect()
    {
        /*----Connexion à la BDD----*/
        $db_root = 'root';
        $db_pass = '';
        $db_name = 'webmaster';
        $db_host = 'localhost';
        $db_port = 3306;
        $db = mysqli_connect($db_host, $db_root, $db_pass, $db_name, $db_port) or die('peut pas se co');

        return $db;
    }

    $db = connect();
?>