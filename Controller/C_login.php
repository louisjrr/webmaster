<?php
    session_start();
    if(isset($_SESSION['id'])){
        header('Location: ../Controller/C_stages.php');
        exit;
    }
?>