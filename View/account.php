<!DOCTYPE html>
<html lang="fr">
<?php include('./Controller/C_accountPHP.php'); ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Needs.com</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Fascinate&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/vendors/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/responsive.css">
        <link rel="stylesheet" href="./assets/css/style.css">
    <script src="https://kit.fontawesome.com/0c87a70838.js"></script>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-md navbar-light bg-light">
            <div class="container-fluid d-flex flex-row">
                <a class="navbar-brand" href="/"><img class ="logo"src="./assets/images/logo.png"></a>
                <div class ="d-md-none mobile" data-toggle="collapse" data-target="#navbarResponsive">
                    <div class = 'bg-dark line1' data-toggle="collapse" data-target="#navbarResponsive"></div>
                    <div class = 'bg-dark line2' data-toggle="collapse" data-target="#navbarResponsive"></div>
                    <div class = 'bg-dark line3' data-toggle="collapse" data-target="#navbarResponsive"></div>
                </div>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/">Home</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="Account">Account</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="NewInternShip">Avis</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        </header>
        <div class="container-fluid">
            <div class="row">
                <div id="accountAffiche" class="col-md-8">
                    <?php 
                    if($mode=="infogenerales"){
                            echo  ("<div class='divInfoGenerales'><div class='container'><div class='row'>");
                            echo  ("<div class='col-lg-3'><img class='iconPrestige' src='".$_SESSION['prestige']."'></div>");
                            echo  ("<div class='col-lg-2'><p class=> prénom:  ".$_SESSION['prenom']."></p></div>");
                            echo  ("<div class='col-lg-2'><p> nom: ".$_SESSION['nom']." </p></div>");
                            echo  ("<div class='col-lg-2'><p> age:  ".$_SESSION['age']." </p> </div>");
                            echo  ("<div class='col-lg-3'><p> adresse:  ".$_SESSION['adresse']." </p></div>");
                            echo  (" </div></div></div>");
                    }
                    elseif($mode=="modifProfil"){
                            echo  ('<form method="POST">');
                            echo  ('<p>Prenom</p></br>');
                            echo  ("<input type='text' name='prenom' value=".$_SESSION['prenom'].">");
                            echo  ('<p>Nom</p></br>');
                            echo  ("<input type='text' name='nom' value=".$_SESSION['nom'].">");
                            echo  ('<p>Age</p></br>');
                            echo  ("<input type='text' name='age' value=".$_SESSION['age'].">");
                            echo  ('<p>Adresse</p></br>');
                            echo  ("<input type='text'  name='adresse' value=".$_SESSION['adresse'].">");
                            echo  ("<button type='submit' name='modifProfilValided'>Valider les changements</button>");
                    }
                    else{
                            echo  ("<p> prénom:  ".$_SESSION['prenom']." </p></br>");
                            echo  ("<p> nom:  ".$_SESSION['nom']." </p></br>");
                            echo  ("<p> age:  ".$_SESSION['age']." </p></br>");
                            echo  ("<p> adresse:  ".$_SESSION['adresse']." </p></br>");
                    }

                    ?>
                </div>
                <div class="col-md-1"> </div> <!-- pour espacer en bootstrap-->
                <div class="col-md-3">
                    <form method="POST" action="ModifAccount">
                        <button type = "submit" name="infogenerales"  class="infoGeneralesButton">My Profil</button>
                        <button type = "submit" name="modifProfil"  class="infoGeneralesButton">modifier mon Profil</button>
                        <button type = "submit" name="wishlist"  class="infoGeneralesButton">Ma wishlist</button> 
                        <button type = "submit" name="deconnexion"  class="infoGeneralesButton">deconnexion</button> 
                    </form>
                </div> 
            </div>
        </div>

    <p><a href="Register">Create a account</a></p>
    <script type='text/javascript' src='./assets/vendors/jquery/jquery-ui.min.js'></script>
    <script type="text/javascript" src="./assets/js/script.js" ></script>
</body>