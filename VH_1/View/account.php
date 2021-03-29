<!DOCTYPE html>
<html lang="en">
<?php include('./Controller/C_accountPHP.php'); ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Needs.com</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Fascinate&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="http://www.NeedsAssets.com/vendors/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://www.NeedsAssets.com/css/style.css">
    <link rel="stylesheet" href="http://www.NeedsAssets.com/css/responsive.css">
    <link rel="stylesheet" href="http://www.NeedsAssets.com/css/animation.css">
    <script src="https://kit.fontawesome.com/0c87a70838.js"></script>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-md navbar-light bg-light">
            <div class="container-fluid d-flex flex-row">
                <a class="navbar-brand" href="/"><img class ="logo"src="http://www.NeedsAssets.com/images/logo.png"></a>
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
                                echo  ("<div class='container infogenerales'>");
                                echo  ("<img class='iconPrestige' src='".$_SESSION['prestige']."'>");
                                echo  ("<h3 class='infoProfil'> First Name : </h3><h5>".$_SESSION['prenom']."</h5>");
                                echo  ("<h3 class='infoProfil'> Last Name : </h3><h5>".$_SESSION['nom']." </h5>");
                                echo  ("<h3 class='infoProfil'> Age : </h3><h5>".$_SESSION['age']." years old </h5> ");
                                echo  ("<h3 class='infoProfil'> Address : </h3><h5>".$_SESSION['adresse']." </h5>");
                                echo  ("</div>");
                                break;
                            case "modifProfil":
                                echo  ("<div class='container formModifProfil'>");
                                echo  ('<form method="POST" class="formModifProfil">');
                                echo  ('<label class="labelModifProfil" for="prenom">First Name : </label>');
                                echo  ("<input class='inputModifProfil' type='text' name='prenom' value=".$_SESSION['prenom'].">");
                                echo  ('<label class="labelModifProfil" for="nom">Last Name : </label>');
                                echo  ("<input class='inputModifProfil' type='text' name='nom' value=".$_SESSION['nom'].">");
                                echo  ('<label class="labelModifProfil" for="age">Age : </label>');
                                echo  ("<input class='inputModifProfil' type='text' name='age' value=".$_SESSION['age'].">");
                                echo  ('<label class="labelModifProfil" for="adresse">Address : </label>');
                                echo  ("<input class='inputModifProfil' type='text'  name='adresse' value=".$_SESSION['adresse'].">");
                                echo  ("<button type='submit' class='inputModifProfil' name='modifProfilValided'>Valider les changements</button>");
                                echo  ("</div></form>");
                                break;
                            case "allPilote":
                                foreach($showPilote as $plt){
                                    if($plt['VISIBLE']==1){
                                        echo  ("<div class='show'><div class='case'><div class='container'><div class='row'>");
                                        echo  ("<div class='col-lg-2 divPrenom'><h6>prénom:</h6> <p class='prenom'>".$plt['PRENOM']." </p></div>");
                                        echo  ("<div class='col-lg-3 divNom'><h6>nom:</h6> <p class='nom'>".$plt['NOM']." </p></div>");
                                        echo  ("<div class='col-lg-2 divAge'><h6>age:</h6>  <p class ='age'>".$plt['AGE']." </p></div>");
                                        echo  ("<div class='col-lg-3'><h6>adresse:</h6>  <p>".$plt['ADRESSE']." </p></div>");
                                        echo  ("<div class='col-lg-1'><i class='fas fa-user-edit CRUD editPilote'></i></div>");
                                        echo  ("<div class='col-lg-1'><i class='fas fa-eye eye CRUD eyePilote'></i></div>");
                                        echo  (" </div></div></div></div>");
                                    }else{
                                        echo  ("<div class='show'><div class='case'><div class='container'><div class='row'>");
                                        echo  ("<div class='col-lg-2 divPrenom'><h6>prénom:</h6> <p class='prenom'>".$plt['PRENOM']." </p></div>");
                                        echo  ("<div class='col-lg-3 divNom'><h6>nom:</h6> <p class='nom'>".$plt['NOM']." </p></div>");
                                        echo  ("<div class='col-lg-2 divAge'><h6>age:</h6>  <p class ='age'>".$plt['AGE']." </p></div>");
                                        echo  ("<div class='col-lg-3'><h6>adresse:</h6>  <p>".$plt['ADRESSE']." </p></div>");
                                        echo  ("<div class='col-lg-1'><i class='fas fa-user-edit CRUD editPilote'></i></div>");
                                        echo  ("<div class='col-lg-1'><i class='fas fa-eye-slash eye CRUD eyePilote'></i></div>");
                                        echo  (" </div></div></div></div>");
                                    }
                                }
                                break;
                            case "allDelegate":
                                foreach($showDelegate as $dlg){
                                    if($dlg['VISIBLE']==1){
                                        echo  ("<div class='show'><div class='case'><div class='container'><div class='row'>");
                                        echo  ("<div class='col-lg-2 divPrenom'><h6>prénom:</h6> <p class='prenom'>".$dlg['PRENOM']." </p></div>");
                                        echo  ("<div class='col-lg-3 divNom'><h6>nom:</h6> <p class='nom'>".$dlg['NOM']." </p></div>");
                                        echo  ("<div class='col-lg-2 divAge'><h6>age:</h6>  <p class ='age'>".$dlg['AGE']." </p></div>");
                                        echo  ("<div class='col-lg-3'><h6>adresse:</h6>  <p>".$dlg['ADRESSE']." </p></div>");
                                        echo  ("<div class='col-lg-1'><i class='fas fa-user-edit CRUD editPilote'></i></div>");
                                        echo  ("<div class='col-lg-1'><i class='fas fa-eye eye CRUD eyePilote'></i></div>");
                                        echo  (" </div></div></div></div>");
                                    }else{
                                        echo  ("<div class='show'><div class='case'><div class='container'><div class='row'>");
                                        echo  ("<div class='col-lg-2 divPrenom'><h6>prénom:</h6> <p class='prenom'>".$dlg['PRENOM']." </p></div>");
                                        echo  ("<div class='col-lg-3 divNom'><h6>nom:</h6> <p class='nom'>".$dlg['NOM']." </p></div>");
                                        echo  ("<div class='col-lg-2 divAge'><h6>age:</h6>  <p class ='age'>".$dlg['AGE']." </p></div>");
                                        echo  ("<div class='col-lg-3'><h6>adresse:</h6>  <p>".$dlg['ADRESSE']." </p></div>");
                                        echo  ("<div class='col-lg-1'><i class='fas fa-user-edit CRUD editPilote'></i></div>");
                                        echo  ("<div class='col-lg-1'><i class='fas fa-eye-slash eye CRUD eyePilote'></i></div>");
                                        echo  (" </div></div></div></div>");
                                    }
                                }
                                break;
                            case "allStudent":
                                foreach($showStudent as $std){
                                    if($std['VISIBLE']==1){
                                    echo  ("<div class='show'><div class='case'><div class='container'><div class='row'>");
                                    echo  ("<div class='col-lg-2 divPrenom'><h6>prénom:</h6> <p class='prenom'>".$std['PRENOM']." </p></div>");
                                    echo  ("<div class='col-lg-3 divNom'><h6>nom:</h6> <p class='nom'>".$std['NOM']." </p></div>");
                                    echo  ("<div class='col-lg-2 divAge'><h6>age:</h6>  <p class ='age'>".$std['AGE']." </p></div>");
                                    echo  ("<div class='col-lg-3'><h6>adresse:</h6>  <p>".$std['ADRESSE']." </p></div>");
                                    echo  ("<div class='col-lg-1'><i class='fas fa-user-edit CRUD editPilote'></i></div>");
                                    echo  ("<div class='col-lg-1'><i class='fas fa-eye eye CRUD eyePilote'></i></div>");
                                    echo  (" </div></div></div></div>");
                                }else{
                                    echo  ("<div class='show'><div class='case'><div class='container'><div class='row'>");
                                    echo  ("<div class='col-lg-2 divPrenom'><h6>prénom:</h6> <p class='prenom'>".$std['PRENOM']." </p></div>");
                                    echo  ("<div class='col-lg-3 divNom'><h6>nom:</h6> <p class='nom'>".$std['NOM']." </p></div>");
                                    echo  ("<div class='col-lg-2 divAge'><h6>age:</h6>  <p class ='age'>".$std['AGE']." </p></div>");
                                    echo  ("<div class='col-lg-3'><h6>adresse:</h6>  <p>".$std['ADRESSE']." </p></div>");
                                    echo  ("<div class='col-lg-1'><i class='fas fa-user-edit CRUD editPilote'></i></div>");
                                    echo  ("<div class='col-lg-1'><i class='fas fa-eye-slash eye CRUD eyePilote'></i></div>");
                                    echo  (" </div></div></div></div>");
                                }

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
                                echo ('<div class="scroll_wishlist">');
                                foreach($wishlist as $r){
                                    echo ('<div class="wishlist"><h2 class="titre">'.$r["intitule_offre"].'</h2><i class="fas fa-heart"></i><p class="description">'.$r['description'].'</p><br><h5 class="entreprise">'.$r["nom_entreprise"].'</h5></div>');
                                }
                                echo ('</div>');
                                break;
                            case "postulate":
                                function showPostulate(){
                                    global $db;
                                    $request= $db->query('SELECT intitule_offre, description, nom_entreprise, etat_avancement, statut FROM candidatures, entreprises, offres_de_stage WHERE idutilisateur = '.$_SESSION["id"].' AND offres_de_stage.identreprise = entreprises.identreprise AND candidatures.idoffre = offres_de_stage.idoffre');
                                    $postulate = $request->fetchAll();
                                    return $postulate;
                                }
                                $postulate=showPostulate();
                                foreach($postulate as $p){
                                    echo '<div class="wishlist"><h2 class="titre">'.$p["intitule_offre"].'</h2><i class="fas fa-heart"></i><p class="description">'.$p['description'].'</p><br><h5 class="entreprise">'.$p["nom_entreprise"].'</h5><h5>avancement de la candidature : '.$p['etat_avancement'].'</h5><h5>'.$p['statut'].'</h5></div>';
                                }
                                break;
                            case "rate":
                                function Rate(){
                                    global $db;
                                    $request= $db->query('SELECT nom_entreprise,identreprise FROM entreprises');
                                    $entreprise = $request->fetchAll();
                                    return $entreprise;
                                }
                                $entreprise=Rate();
                                echo "<div style='display:flex; height:100%;'><div class='entreprises'>";
                                foreach($entreprise as $ent){
                                    echo '<div class="entreprise"><h2 class="nom_entreprise">'.$ent["nom_entreprise"].'</h2><p class="identreprise">'.$ent["identreprise"].'</p></div>';
                                }
                                echo "</div><div class='affichage_entreprise'></div></div>";
                                break;

                                case "CreateCompany":
                                    echo("<div><form method = 'post'>");
                                    echo("<label>nom de l'entreprise</label>");
                                    echo("<input type='text' name='nomentreprise' placeholder='nom entreprise'></input>");
                                    echo("<button type'submit' name='addCompany'>Valider</button>");
                                    echo("</div></form>");
                                
                                break;
                        }
                        ?>
                    </div>
                    <div class="col-md-1"> </div> <!-- pour espacer en bootstrap-->
                    <div class="col-md-3 bg-light accountOption">
                    <div class="scroll_account">
                        <form method="POST" action="Account" class="accountForm">
                            <button type = "submit" name="infogenerales"  class="infoGeneralesButton btn btn-dark">My Profil</button>
                            <button type = "submit" name="modifProfil"  class="infoGeneralesButton btn btn-dark modifProfil">Modify my profil</button>
                            <button type = "submit" name="wishlist"  class="infoGeneralesButton btn btn-dark wishlistBtn">My Wishlist</button> 
                            <button type = "submit" name="Postulate"  class="infoGeneralesButton btn btn-dark postulateBtn">My applications</button> 
                            <button type = "submit" name="allPilote" class="infoGeneralesButton btn btn-dark allPilote">All Pilote</button>
                            <button type = "submit" name="allDelegate" class="infoGeneralesButton btn btn-dark allDelegate">All Delegate</button>
                            <button type = "submit" name="allStudent" class="infoGeneralesButton btn btn-dark allStudent">All Student</button>
                            <button type = "submit" name="CreateAccount"  class="infoGeneralesButton btn btn-dark CreateAccount">Create an account</button>
                            <button type = "submit" name="CreateCompany"  class="infoGeneralesButton btn btn-dark CreateCompany">Create a company</button>
                            <button type = "submit" name="CreateInternship"  class="infoGeneralesButton btn btn-dark CreateInternship">Create an internship</button>
                            <button type = "submit" name="Note_Entreprise"  class="infoGeneralesButton btn btn-dark rateCompany">Rate a company</button>
                            <button type = "submit" name="deconnexion"  class="infoGeneralesButton btn btn-dark">Log Out</button>
                        </form>
                    </div>
                    </div> 
                </div>
            </div>
        </section>
        
    <script type='text/javascript' src='http://www.NeedsAssets.com/vendors/jquery/jquery-ui.min.js'></script>
    <script type="text/javascript" src="http://www.NeedsAssets.com/js/script.js" ></script>
</body>