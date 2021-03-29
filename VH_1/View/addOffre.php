<!DOCTYPE html>
<html lang="en">
<?php 
include('./Controller/C_Verif_Autorisations.php');
noStudent();
?>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home</title>
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
        <div class="container-fluid">
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
                    <li class="nav-item">
                        <a class="nav-link" href="Account">Account</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Avis</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    </header>
    <section>
        <div class="create-stage">
            <h2 class=titre-stage>Add New Internship offer</h2>
            <form method='POST' class="addIntForm">
                <fieldset class='form-stage'>
                    <div class="column one">
                        <input type="text" name="entreprise" placeholder="Nom de l'entreprise" required>
                        <input type="text" name="titre_stage" placeholder="Intitulé du post" required>
                        <select name="nb_place" id="nb_place" required>
                            <option value="" disabled selected value>Place(s) disponible(s)</option>
                            <option value="1">1 Place</option>
                            <option value="2">2 Places</option>
                            <option value="3">3 Places</option>
                            <option value="4">4 Places</option>
                        </select>
                        <input name='stage' type="submit" value="Valider">
                    </div>
                    <div class="column two">
                        <textarea name="description" style="height: 150px;width:500px;resize: none;" placeholder="Description de l'offre" required></textarea>
                        <div class="listing">
                            <?php             
                                foreach($competences as $n){
                                    echo '<input type="checkbox" value="'.$n["nom_competence"].'"></input><label>'.$n["nom_competence"].'</label>';
                                }
                            ?>
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
    </section>
    
    <script type='text/javascript' src='http://www.NeedsAssets.com/vendors/jquery/jquery-ui.min.js'></script>
    <script type="text/javascript" src="http://www.NeedsAssets.com/js/script.js" ></script>
    </body>