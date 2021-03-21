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
            <form class="formInscription" method="post" action="user.php">
                <i class="fas fa-arrow-left btnBack"></i>
                <fieldset>
                    <legend>Register</legend>

                    <label for='permission' class="labelPermission">Choose the permission</label><br>
                    <select id='permission' name='role'>
                        <option value='student'>student</option>
                        <option value='delegate'>delegate</option>
                        <option value='tutor'>tutor</option>
                        <option value='admin'>admin</option>
                    </select><br>
                    <input type="text" placeholder='First name' class='textBox' name='Fname'><br>
                    <input type="text" placeholder='Last name' class='textBox' name='Lname'><br>
                    <input type="date" placeholder='Birthdate' class='textBox' name='birthdate'><br>
                    <input type="text" placeholder='city' class='textBox' name='city'><br>
                    <input type="Email" placeholder='Email' class='textBox' name='mail'><br>
                    <input type="password" placeholder='Password' class='textBox' name='password'><br>
                    <select id='centres' name='campus'>
                        <option value="1">Rouen</option>
                        <option value="2">Nanterre</option>
                        <option value="3">Arras</option>
                        <option value="4">Caen</option>
                        <option value="5">Bordeaux</option>
                        <option value="6">Lyon</option>
                        <option value="7">Toulouse</option>
                        <option value="8">Orléans</option>
                        <option value="9">Lille</option>
                        <option value="10">Brest</option>
                        <option value="11">Saint-Nazaire</option>
                        <option value="12">Le Mans</option>
                        <option value="13">Reims</option>
                        <option value="14">Nancy</option>
                        <option value="15">Strasbourg</option>
                        <option value="16">Dijon</option>
                        <option value="17">Grenoble</option>
                        <option value="18">Nice</option>
                        <option value="19">Aix-en-Provence</option>
                        <option value="20">Montpelier</option>
                        <option value="21">Pau</option>
                        <option value="22">Angoulême</option>
                        <option value="23">La Rochelle</option>
                        <option value="24">Châteauroux</option>
                        <option value="25">Nantes</option>
                    </select>
                    <label></label>
                    <select id='promotion' name='promotion'>
                        <option value="1">A1</option>
                        <option value="2">A2</option>
                        <option value="A3">A3</option>
                        <option value="A4">A4</option>
                        <option value="A5">A5</option>
                    </select></br></br>
                    <button type="submit" name="submit" class="btn btn-outline-light btn-lg btnInscription" onclick="connect()" >Register</button>
                </fieldset>
            </form><br>
            
        </div>
    </div>
    <script type='text/javascript' src='./assets/vendors/jquery/jquery-ui.min.js'></script>
    <script type="text/javascript" src="./assets/js/script.js" ></script>
</body>
</html>