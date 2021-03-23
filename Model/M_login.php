<?php
 include '../Controller/C_database.php';
 
    if(isset($_POST['connectLogin'])){
        if($_POST['login'] !=="" && $_POST['password'] !==""){
            $requestLogin = $db->prepare('SELECT idutilisateur,idrole,mail,mdp,nom,prenom,age,adresse,visible FROM utilisateurs WHERE mail = :username');
            $requestLogin->execute(array('username' => $_POST['login']));
            $infoUser = $requestLogin->fetch();

            
            if(!$infoUser){
                echo 'mauvais identifiant ou mot de passe!';
            }
            else{
                if($_POST['password'] == $infoUser['mdp']){
                    /*$requestCentre = $db->prepare('SELECT idutilisateur,idrole,mail,mdp,nom,prenom,age,adresse,visible FROM utilisateurs WHERE mail = :username');
                    $requestCentre->execute(array('username' => $_POST['login']));
                    $infoUserCentre = $requestCentre->fetch();*/
                    session_start();
                    $_SESSION['id'] = $infoUser['idutilisateur'];
                    $_SESSION['idRole'] = $infoUser['idrole'];
                    $_SESSION['mail'] = $infoUser['mail'];
                    $_SESSION['nom'] = $infoUser['nom'];
                    $_SESSION['prenom'] = $infoUser['prenom'];
                    $_SESSION['age'] = $infoUser['age'];
                    $_SESSION['adresse'] = $infoUser['adresse'];
                    $_SESSION['visible'] = $infoUser['visible'];
                    echo 'Vous êtes connecté !';
                    header('Location: ../View/home.php');
                    
                    exit();
                }
                else{
                    echo 'mauvais identifiant ou mot de passe!';
                }
            }
        }
    }
            
?>