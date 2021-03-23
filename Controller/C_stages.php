<?php
    include '../Model/M_stages.php';
    include 'C_database.php';
    $stage = new Stage();
    $titre = $stage->titre($db);
    $entreprise = $stage->entreprise($db);
    $description = $stage->description($db);
    $places = $stage->places($db);
    require('../View/home.php');
?>