<?php
    include '../Model/M_stages.php';
    include 'C_database.php';
    $stage = new Stage();
    $res = $stage->getAllStages($db);
    $conteneur = "";
    if (isset( $_POST['search'])){
        $search = $stage->research($db,$_POST['search']);
        foreach($search as $n){
            $conteneur = $conteneur.'<div class="stage"><h2 class="titre">'.$n["intitule_offre"].'</h2><i class="far fa-heart"></i><p class="description">'.$n['description'].'</p><br><h5 class="entreprise">'.$n["nom_entreprise"].'</h5></div>';
        }
    }else{
        foreach($res as $r){
            $conteneur = $conteneur.'<div class="stage"><h2 class="titre">'.$r["intitule_offre"].'</h2><i class="far fa-heart"></i><p class="description">'.$r['description'].'</p><br><h5 class="entreprise">'.$r["nom_entreprise"].'</h5></div>';
        }
    };
    //$res_places = $stage->places($db);
    require('../View/home.php');
?>