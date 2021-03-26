<?php
    include_once './Controller/C_database.php';

    if(isset($_POST['connectLogin'])){
        if($_POST['login'] !=="" && $_POST['password'] !==""){
            global $db;
            $requestLogin = $db->prepare('SELECT idutilisateur,idrole,mail,mdp,nom,prenom,age,adresse,visible FROM utilisateurs WHERE mail = :username');
            $requestLogin->execute(array('username' => $_POST['login']));
            $infoUser = $requestLogin->fetch();

            
            if(!$infoUser){
                echo 'mauvais identifiant ou mot de passe!';
            }
            else{
                if($_POST['password'] == $infoUser['mdp']){
                    
                    session_start();
                    $_SESSION['id'] = $infoUser['idutilisateur'];
                    $_SESSION['idRole'] = $infoUser['idrole'];
                    $_SESSION['mail'] = $infoUser['mail'];
                    $_SESSION['nom'] = $infoUser['nom'];
                    $_SESSION['prenom'] = $infoUser['prenom'];
                    $_SESSION['age'] = $infoUser['age'];
                    $_SESSION['adresse'] = $infoUser['adresse'];
                    $_SESSION['visible'] = $infoUser['visible'];

                    $requestRole = $db->prepare('SELECT idrole,nom_role FROM roles WHERE idrole = :idrole');
                    $requestRole->execute(array('idrole' => $_SESSION['idRole']));
                    $infoRole = $requestRole->fetch();

                    $_SESSION['role'] = $infoRole['nom_role'];
                    if($_SESSION['role'] == 'Administrateur'){
                        $_SESSION['prestige'] = './assets/images/iconRole3.ico';
                    }
                    elseif($_SESSION['role'] == 'Pilote'){
                        $_SESSION['prestige'] = './assets/images/iconRole2.ico';
                    }
                    elseif($_SESSION['role'] == 'Délégué'){
                        $_SESSION['prestige'] = './assets/images/iconRole1.ico';
                        $queryAutorisations = $db->prepare("SELECT CONVERT(autorisations USING utf8) FROM autorisations, utilisateurs, roles WHERE idutilisateur = :idUser AND utilisateurs.idrole = roles.idrole AND roles.idautorisation = autorisations.idautorisation;");
                        $queryAutorisations->execute(array('idUser' => $_SESSION["id"])); 
                        $infoAutorisations = $queryAutorisations->fetch();
                        $_SESSION['autorisations'] = $infoAutorisations[0];
                        foreach ($_SESSION['autorisations'] as $bit){
                            if($bit = 1){

                            }
                        }
                        
                    }
                    else{
                        $_SESSION['prestige'] = './assets/images/iconRole1.ico';
                    }

                    echo 'Vous êtes connecté !';
                    header('Location: ./Home');
                    
                    exit();
                }
                else{
                    echo 'mauvais identifiant ou mot de passe!';
                }
            }
        }
        
    }
?>