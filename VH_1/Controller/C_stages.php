<?php
    include './Model/M_stages.php';
    $stage = new Stage();
    function home(){
        global $stage;
        $res = $stage->getAllStages();
        if (isset( $_POST['search'])){
            $stage-> intitule_offre = $_POST['search'];
            $res = $stage->research();
        };
        //$res_places = $stage->places($db);
        require('./View/home.php');
    }
    function NewInternship(){
        global $stage;
        $competences=$stage->competences();
        if(isset($_POST['stage'])){
            $stage->add($_POST['entreprise'],$_POST['titre_stage'],$_POST['description'],$_POST['nb_place']);
            header('Location:http://localhost/www/webmaster/');
        }
        require('./View/addOffre.php');
    }
    function Add($titre, $description, $entreprise){
        global $stage;
        $stage->addwishlist($titre, $description, $entreprise);
    }
    function Remove($titre, $description, $entreprise){
        global $stage;
        $stage->removewishlist($titre, $description, $entreprise);
    }
    
?>