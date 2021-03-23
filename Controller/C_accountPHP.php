<?php 
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
      }
      else{
            echo  ("<p> prénom:  ".$_SESSION['prenom']." </p></br>");
            echo  ("<p> nom:  ".$_SESSION['nom']." </p></br>");
            echo  ("<p> age:  ".$_SESSION['age']." </p></br>");
            echo  ("<p> adresse:  ".$_SESSION['adresse']." </p></br>");
      }
      if(isset($_POST['deconnexion'])){
            session_destroy();
            header('Location: ../View/index.php');
            exit;
      }

?>
