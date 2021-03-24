<?php
    include './Model/M_stages.php';
    $stage = new Stage();
    function home(){
        global $stage;
        $res = $stage->getAllStages();
        $issearch = false;
        if (isset( $_GET['search'])){
            $stage-> intitule_offre = $_GET['search'];
            $res = $stage->research();
            $issearch = true;
        };
        //$res_places = $stage->places($db);
        require('./View/home.php');
    }
    function NewInternship(){
        global $stage;
        $competences=$stage->competences();
        if(isset($_GET['stage'])){
            $stage->add($_GET['entreprise'],$_GET['titre_stage'],$_GET['description'],$_GET['nb_place']);
            header('Location:http://localhost/www/webmaster/');
        }else{
            echo 'pas de valeurs';
        }
        require('./View/addOffre.php');
    }
    function AddStage(){
        global $stage;
        
    }
    
?>