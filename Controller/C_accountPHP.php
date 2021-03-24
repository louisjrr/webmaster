<?php 
      session_start();

      echo  ("<p> prénom:  ".$_SESSION['prenom']." </p></br>");
      echo  ("<p> nom:  ".$_SESSION['nom']." </p></br>");
      echo  ("<p> age:  ".$_SESSION['age']." </p></br>");
      echo  ("<p> adresse:  ".$_SESSION['adresse']." </p></br>");
      
      if(isset($_POST['deconnexion'])){
            session_destroy();
            header('Location: ../View/login.php');
            exit;
      }

?>
