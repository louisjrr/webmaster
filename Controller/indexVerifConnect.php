<?php
    session_start();
    if(isset($_SESSION['id'])){
        header('Location: ../View/home.php');
        exit;
    }
?>