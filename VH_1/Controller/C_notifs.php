<?php
include './Model/M_notifs.php';

    function afficherNotifs(){
        if(!isset($_SESSION)){
        session_start();
        }
        $user = new UserNotif;
        $Notifs = $user->getNotifs($_SESSION['id']);
        foreach($Notifs as $notif){
            echo("<div class='container'>");
                if($notif['vue'] == 0){
                    echo("<div class='alert alert-primary notification'>");
                    echo("<p class='idNotification'>".$notif['idnotification']."</p>");
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

    function vueSurNotif($idNotif){
        $user = new UserNotif;
        $user->voirNotif($idNotif);
    }

    function cloche(){
        if(!isset($_SESSION)){
            session_start();
            }
        $location = "";
        $notifications = 0;
        $user = new UserNotif;
        $Notifs = $user->getNotifs($_SESSION['id']);
        foreach($Notifs as $notif){
            if($notif['vue'] == 1){
            }
            elseif($notif['vue'] == 0){
                $notifications++;
            }
        }
        if($notifications > 0){
            $location = "images/notif.png";
        }
        elseif($notifications == 0){
            $location = "images/no_notif.png";
        }
        return $location;
    }
?>