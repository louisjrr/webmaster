<?php include 'stages.php';?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home</title>
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Fascinate&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="./assets/vendors/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="./assets/css/style.css">
        <script src="https://kit.fontawesome.com/0c87a70838.js"></script>
    </head>
    <body>
    <?php include 'header.php';?>
    <div class="create-stage">
        <h2 class=titre-stage>Add New Internship offer</h2>
        <form method='POST' action='home.php'>
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
                        <?php competences();?>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
    <script type='text/javascript' src='./assets/vendors/jquery/jquery-ui.min.js'></script>
    <script type="text/javascript" src="./assets/js/script.js" ></script>
    </body>