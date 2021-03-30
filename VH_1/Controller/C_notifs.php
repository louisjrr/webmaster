<?php
include './Model/M_notifs.php';
    session_start();
    
    function afficherNotifs(){
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
                    echo("<div class='alert alert-secondary'>");
                    echo("<h2>Offre: ".$user->getoffre($notif['idcandidature'])."</h2>");
                    echo("<p>".$notif['contenu']."</p>");
                    echo("</div>");
                 }

                 echo("</div>");
        }
        require './View/notifs.php';
    }
?>