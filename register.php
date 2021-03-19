<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Needs.com</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Fascinate&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/vendors/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/anime.css">
    <script src="https://kit.fontawesome.com/0c87a70838.js"></script>
</head>

<body class="bodyConnexion">
    <div class="shadow"></div>
    <div class="present">
        <h1 class="titreAccueil">Needs.com</h1>
        <h2 class="slogan">Le site N°1 de recherche de stages</h2>
        <div class="compte">
            <form class="formInscription" method="post" action="">
                <fieldset>
                    <legend>Register</legend>

                    <label for='permission' class="labelPermission">Choose the permission</label><br>
                    <select id='permission'>
                        <option value='student'>student</option>
                        <option value='delegate'>delegate</option>
                        <option value='tutor'>tutor</option>
                    </select><br>
                    <input type="text" placeholder='First name' class='textBox'><br>
                    <input type="text" placeholder='Last name' class='textBox'><br>
                    <input type="text" placeholder='Campus' class='textBox'><br>
                    <input type="text" placeholder='Promotion' class='textBox'><br>
                    <button type="submit" name="submit" class="btn btn-outline-light btn-lg btnInscription" onclick="connect()" >Register</button>
                </fieldset>
            </form><br>
            
        </div>
    </div>
    <script type='text/javascript' src='./assets/vendors/jquery/jquery-ui.min.js'></script>
    <script type="text/javascript" src="./assets/js/script.js" ></script>
</body>
</html>