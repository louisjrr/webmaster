<?php
    include '../Model/M_stages.php';
    include 'C_database.php';
    $stage = new Stage();
    $res = $stage->getAllStages($db);
    $res_titre = $stage->titre($db);
    $res_entreprise = $stage->entreprise($db);
    $res_description = $stage->description($db);
    $conteneur = "";
    foreach($res as $r){
        $conteneur = $conteneur.'<div class="stage"><h2 class="titre">'.$r["intitule_offre"].'</h2><i class="far fa-heart"></i><p class="description">'.$r['description'].'</p><br><h5 class="entreprise">'.$r["nom_entreprise"].'</h5></div>';
    }
    //$res_places = $stage->places($db);
    require('../View/home.php');
?>