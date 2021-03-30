<?php
include './Model/M_notifs.php';

    
    function afficherNotifs(){
        session_start();
        $user = new UserNotif;
        $Notifs = $user->getNotifs($_SESSION['id']);
        foreach($Notifs as $notif){
            echo("<div class='container'>");
                if($notif['vue'] == 0){
                    echo("<div class='alert alert-primary'>");
                    echo("<h2>Offre: ".$user->getoffre($notif['idcandidature'])."</h2>");
                    echo("<p>".$notif['contenu']."</p>");
                    echo("</div>");
                 }
                 elseif($notif['vue'] == 1){
                    echo("<div class='alert alertLight'>");
                    echo("<h2>Offre: ".$user->getoffre($notif['idcandidature'])."</h2>");
                    echo("<p>".$notif['contenu']."</p>");
                    echo("</div>");
                 }

                 echo("</div>");
        }
    }
    function notifications(){
        require './View/notifs.php';
    }

?>