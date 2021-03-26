<?php 
      include_once './Controller/C_database.php';
      session_start();
      $mode;

      if(isset($_POST['infogenerales'])){
            $mode="infogenerales";
      }
      elseif(isset($_POST['modifProfil'])){
            $mode="modifProfil";
      }
      elseif(isset($_POST['wishlist'])){
            $mode="wishlist";
      }
      elseif(isset($_POST['allPilote'])){
            $mode = "allPilote";
      }
      elseif(isset($_POST['allDelgate'])){
            $mode = "allDelegate";
      }
      elseif(isset($_POST['allStudent'])){
            $mode = "allStudent";
      }
      elseif(isset($_POST['CreateAccount'])){
            header('Location: Register');
            exit;
      }
      else{
            $mode="infogenerales";
      }

      if(isset($_POST['deconnexion'])){
            session_destroy();
            header('Location: ./');
            exit;
      }

      if(isset($_POST['modifProfilValided'])){
            global $db;
            $requestModifProfil = $db->prepare('UPDATE utilisateurs SET nom = :nom, prenom = :prenom, age = :age, adresse = :adresse WHERE idutilisateur = :iduser');
            $requestModifProfil->execute(array('nom' => $_POST['nom'], 'prenom' => $_POST['prenom'], 'age' => $_POST['age'], 'adresse' => $_POST['adresse'], 'iduser' => $_SESSION['id'] ));

            $requestUpdatSession = $db->prepare('SELECT idutilisateur,idrole,mail,mdp,nom,prenom,age,adresse,visible FROM utilisateurs WHERE idutilisateur = :iduser');
            $requestUpdatSession->execute(array('iduser' => $_SESSION['id']));
            $NEWinfoUser = $requestUpdatSession->fetch();

            $_SESSION['nom'] = $NEWinfoUser['nom'];
            $_SESSION['prenom'] = $NEWinfoUser['prenom'];
            $_SESSION['age'] = $NEWinfoUser['age'];
            $_SESSION['adresse'] = $NEWinfoUser['adresse'];

            header('Location: ./Account');
            exit();
      }
      //idutilisateur,idrole,mail,mdp,nom,prenom,age,adresse,visible

      switch($_SESSION['role']){
            case "Administrateur":
                  global $db;
                  $query = $db->query("SELECT * FROM utilisateurs WHERE idrole = 2");
                  $pilote = $query->fetchAll();

                  $query = $db->query("SELECT * FROM utilisateurs WHERE idrole = 3");
                  $student = $query->fetchAll();

                  $query = $db->query("SELECT * FROM utilisateurs WHERE idrole  >3");
                  $delegate = $query->fetchAll();
                  break;
                  
            case "Pilote":
                  global $db;
                  $query = $db->query("SELECT * FROM utilisateurs WHERE idrole = 3");
                  $student = $query->fetchAll();
                  $query = $db->query("SELECT * FROM utilisateurs WHERE idrole > 3");
                  $delegate = $query->fetchAll();
                  break;
            case "Etudiant":
                  global $db;
                  $query = $db->query("SELECT * FROM utilisateurs WHERE idrole = 2");
                  $pilote = $query->fetchAll();
                  break;
            case "Délégué":
                  global $db;
                  //fonction de vérification des droits de délégué
                  break;
      }

?>
