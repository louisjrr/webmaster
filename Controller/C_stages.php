<?php
    include './Model/M_stages.php';
    $stage = new Stage();
    function home(){
        global $stage;
        $res = $stage->getAllStages();
        $issearch = false;
        if (isset( $_POST['search'])){
            $stage-> intitule_offre = $_POST['search'];
            $res = $stage->research();
            $issearch = true;
        };
        //$res_places = $stage->places($db);
        require('./View/home.php');
    }
    function NewInternship(){
        global $stage;
        $competences=$stage->competences();
        require('./View/addOffre.php');
    }
    function AddStage(){
        global $stage;

    }
    
?>