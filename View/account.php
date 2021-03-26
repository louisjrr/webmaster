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
    <link rel="stylesheet" href="./assets/css/animation.css">
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
        <section class = "pageAccount">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-8 bg-light accountAffiche">
                        <?php 
                        switch($mode){
                            case "infogenerales":
                                echo  ("<div class='container'><div class='row'>");
                                echo  ("<div class='col-lg-2'><img class='iconPrestige' src='".$_SESSION['prestige']."'></div>");
                                echo  ("<div class='col-lg-2'><p class=> prénom: ".$_SESSION['prenom']."</p></div>");
                                echo  ("<div class='col-lg-3'><p> nom: ".$_SESSION['nom']." </p></div>");
                                echo  ("<div class='col-lg-2'><p> age:  ".$_SESSION['age']." </p> </div>");
                                echo  ("<div class='col-lg-3'><p> adresse:  ".$_SESSION['adresse']." </p></div>");
                                echo  (" </div></div>");
                                break;
                            case "modifProfil":
                                echo  ('<form method="POST">');
                                echo  ("<div class='container'><div class='column'>");
                                echo  ('<label for="prenom">Prenom</label>');
                                echo  ("<input type='text' name='prenom' value=".$_SESSION['prenom'].">");
                                echo  ('<label for="nom">Nom</label>');
                                echo  ("<input type='text' name='nom' value=".$_SESSION['nom'].">");
                                echo  ('<p>Age</p></br>');
                                echo  ("<input type='text' name='age' value=".$_SESSION['age'].">");
                                echo  ('<p>Adresse</p></br>');
                                echo  ("<input type='text'  name='adresse' value=".$_SESSION['adresse'].">");
                                echo  ("<button type='submit' name='modifProfilValided'>Valider les changements</button>");
                                echo  (" </div></div>");
                                break;
                            case "allPilote":
                                foreach($showPilote as $plt){
                                    echo  ("<div class='divInfoGenerales'><div class='container'><div class='row'>");
                                    echo  ("<div class='col-lg-2'><p class=> prénom: ".$plt['PRENOM']." </p></div>");
                                    echo  ("<div class='col-lg-3'><p> nom: ".$plt['NOM']." </p></div>");
                                    echo  ("<div class='col-lg-2'><p> age:  ".$plt['AGE']." </p></div>");
                                    echo  ("<div class='col-lg-3'><p> adresse:  ".$plt['ADRESSE']." </p></div>");
                                    echo  (" </div></div>");
                                }
                                break;
                            case "allDelegate":
                                foreach($showDelegate as $dlg){
                                    echo  ("<div class='divInfoGenerales'><div class='container'><div class='row'>");
                                    echo  ("<div class='col-lg-2'><p class=> prénom: ".$dlg['PRENOM']." </p></div>");
                                    echo  ("<div class='col-lg-3'><p> nom: ".$dlg['NOM']." </p></div>");
                                    echo  ("<div class='col-lg-2'><p> age:  ".$dlg['AGE']." </p></div>");
                                    echo  ("<div class='col-lg-3'><p> adresse:  ".$dlg['ADRESSE']." </p></div>");
                                    echo  (" </div></div>");
                                }
                                break;
                            case "allStudent":
                                foreach($showStudent as $std){
                                    echo  ("<div class='divInfoGenerales'><div class='container'><div class='row'>");
                                    echo  ("<div class='col-lg-2'><p class=> prénom: ".$std['PRENOM']." </p></div>");
                                    echo  ("<div class='col-lg-3'><p> nom: ".$std['NOM']." </p></div>");
                                    echo  ("<div class='col-lg-2'><p> age:  ".$std['AGE']." </p></div>");
                                    echo  ("<div class='col-lg-3'><p> adresse:  ".$std['ADRESSE']." </p></div>");
                                    echo  (" </div></div>");
                                }
                                break;
                            case "wishlist":
                                //Mettre dans le model et le controller
                                function Wishlist(){
                                    global $db;
                                    $request= $db->query('SELECT intitule_offre, description, nom_entreprise FROM offres_de_stage, entreprises, met_en_wishlist WHERE met_en_wishlist.idutilisateur = '.$_SESSION["id"].' AND met_en_wishlist.idoffre = offres_de_stage.idoffre AND offres_de_stage.identreprise = entreprises.identreprise');
                                    $wishlist = $request->fetchAll();
                                    return $wishlist;
                                }
                                $wishlist=Wishlist();
                                foreach($wishlist as $r){
                                    echo ('<div class="wishlist"><h2 class="titre">'.$r["intitule_offre"].'</h2><i class="fas fa-heart"></i><p class="description">'.$r['description'].'</p><br><h5 class="entreprise">'.$r["nom_entreprise"].'</h5></div>');
                                }
                                break;
                            case "rate":
                                function Rate(){
                                    global $db;
                                    $request= $db->query('SELECT nom_entreprise FROM entreprises');
                                    $entreprise = $request->fetchAll();
                                    return $entreprise;
                                }
                                $entreprise=Rate();
                                echo "<div class='entreprises'>";
                                foreach($entreprise as $ent){
                                    echo '<div class="entreprise"><h2 class="nom_entreprise">'.$ent["nom_entreprise"].'</h2></div>';
                                }
                                echo "</div><div class='affichage_entreprise'></div>";
                                break;
                        }
                        ?>
                    </div>
                    <div class="col-md-1"> </div> <!-- pour espacer en bootstrap-->
                    <div class="col-md-3 bg-light accountOption">
                    <div class="scroll_account">
                        <form method="POST" action="ModifAccount" class="accountForm">
                            <button type = "submit" name="infogenerales"  class="infoGeneralesButton btn btn-dark">My Profil</button>
                            <button type = "submit" name="modifProfil"  class="infoGeneralesButton btn btn-dark">Modify my profil</button>
                            <button type = "submit" name="wishlist"  class="infoGeneralesButton btn btn-dark">My Wishlist</button> 
                            <button type = "submit" name="allPilote" class="infoGeneralesButton btn btn-dark">All Pilote</button>
                            <button type = "submit" name="allDelegate" class="infoGeneralesButton btn btn-dark">All Delegate</button>
                            <button type = "submit" name="allStudent" class="infoGeneralesButton btn btn-dark">All Student</button>
                            <button type = "submit" name="CreateAccount"  class="infoGeneralesButton btn btn-dark">Create an account</button>
                            <button type = "submit" name="Note_Entreprise"  class="infoGeneralesButton btn btn-dark">Rate a company</button>
                            <button type = "submit" name="deconnexion"  class="infoGeneralesButton btn btn-dark">Deconnexion</button>
                        </form>
                    </div>
                    </div> 
                </div>
            </div>
        </section>
        

    <script type='text/javascript' src='./assets/vendors/jquery/jquery-ui.min.js'></script>
    <script type="text/javascript" src="./assets/js/script.js" ></script>
</body>