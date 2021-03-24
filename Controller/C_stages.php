<?php
    include '../Model/M_stages.php';
    include 'C_database.php';
    $stage = new Stage();
    $res = $stage->getAllStages($db);
    //$res_places = $stage->places($db);
    require('../View/home.php');
?>