<?php 
      include_once './Controller/C_database.php';
      session_start();
      if(isset($_POST['infogenerales'])){
            echo  ("<p> prénom:  ".$_SESSION['prenom']." </p></br>");
            echo  ("<p> nom:  ".$_SESSION['nom']." </p></br>");
            echo  ("<p> age:  ".$_SESSION['age']." </p></br>");
            echo  ("<p> adresse:  ".$_SESSION['adresse']." </p></br>");
      }
      elseif(isset($_POST['modifProfil'])){
            echo  ('<form method="POST">');
            echo  ('<p>Prenom</p></br>');
            echo  ("<input type='text' name='prenom' value=".$_SESSION['prenom']."></br>");
            echo  ('<p>Nom</p></br>');
            echo  ("<input type='text' name='nom' value=".$_SESSION['nom']."></br>");
            echo  ('<p>Age</p></br>');
            echo  ("<input type='text' name='age' value=".$_SESSION['age']."></br>");
            echo  ('<p>Adresse</p></br>');
            echo  ("<input type='text'  name='adresse' value=".$_SESSION['adresse']."></br>");
            echo  ("<button type='submit' name='modifProfilValided'>Valider les changements</button>");
      }
      else{
            echo  ("<p> prénom:  ".$_SESSION['prenom']." </p></br>");
            echo  ("<p> nom:  ".$_SESSION['nom']." </p></br>");
            echo  ("<p> age:  ".$_SESSION['age']." </p></br>");
            echo  ("<p> adresse:  ".$_SESSION['adresse']." </p></br>");
      }
      if(isset($_POST['deconnexion'])){
            session_destroy();
            header('Location: ./View/login.php');
            exit;
      }

      if(isset($_POST['modifProfilValided'])){
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

?>
