<!DOCTYPE html>
<html lang="en">
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
    <?php include "stages.php"?>
    <body>
        <?php include 'header.php'; ?>
        <div class="recherche_p">
            <form class="form-inline my-2 my-lg-0" method='POST' action='home.php'>
                <div class="recherche-barr">
                    <input class="recherche-input" type="search" placeholder="Recherche" aria-label="Search" name="search">
                    <label class="recherche-icone">
                        <i class="fas fa-search"></i>
                    </label>
                </div>
            </form>
        </div>
        <div class="stock">
            <div class="stages"> <!-- Affichage en scroll des offres de stage-->
            <?php 
            if (isset( $_POST['search'])){
                research($_POST['search']);
            }else{
                titre();}; ?>
            </div>
            <div class="affichage"> <!-- Affichage de l'offre de stage sélectionnée au click-->
            
            </div>
        </div>
        <script type='text/javascript' src='./assets/vendors/jquery/jquery-ui.min.js'></script>
        <script type="text/javascript" src="./assets/js/script.js" ></script>
    </body>
</html>