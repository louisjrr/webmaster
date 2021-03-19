<?php
    
    
    function titre(){
        include 'database.php';
        $request = $db->query('SELECT intitule_offre,description FROM offres_de_stage');
        $infoUser = $request->fetchAll();
        foreach($infoUser as $n){
            echo '<div class="stage"><h2 class="titre">'.$n["intitule_offre"].'</h2><i class="far fa-heart"></i><br><p class="description">'.$n['description'].'</p></div>';
        }
    };
    
    function description(){
        include 'database.php';
        $requestLogin = $db->prepare('SELECT idoffre FROM offres_de_stage WHERE intitule_offre=:titre_stage');
        $requestLogin->execute(array('titre_stage' => $_POST["Refonte d'un intranet"]));
        $infoUser = $requestLogin->fetch();

        foreach($infoUser as $n){
            echo '<p>'.$n["idoffre"].'</p>';
        }
    };
?>