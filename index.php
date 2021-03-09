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
<?php
function OpenCon()
 {
 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $db = "webmaster";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
 return $conn;
 }
 
 $sql= mysqli_query(OpenCon(),"SELECT NOM_ROLE FROM roles WHERE IDAUTORISATION = '2'");
 $result = mysqli_fetch_assoc($sql);
 print_r($result);
function CloseCon($conn)
 {
 $conn -> close();
 }
?>
<body class="bodyConnexion">
    <div class="shadow"></div>
    <div class="present">
        <h1 class="titreAccueil">Needs.com</h1>
        <h2 class="slogan">Le site N°1 de recherche de stages</h2>
        <div class="compte">
            <button type="button" class="btn btn-outline-light btn-lg btnConnexion" >Connexion</button>
            <form class="formConnexion" method="post">
                <i class="fas fa-arrow-left"></i>
                <fieldset>
                    <legend>Connexion</legend>
                    <input type="text" id="login" name="login" placeholder="Identifiant"><br>
                    <input type="password" id="password" name="password" placeholder="Mot de passe"><br>
                    <button type="submit" class="btn btn-outline-light btn-lg btnConnexionF" >Connexion</button>
                </fieldset>
            </form><br>
            <?php
                    session_start();
                    if(isset($_POST['login']) && isset($_POST['password']))
                    {
                        /*----Connexion à la BDD----*/
                        $db_root = 'root';
                        $db_pass = '';
                        $db_name = 'webmaster';
                        $db_host = 'localhost';
                        $db_port = 3306;
                        $db = mysqli_connect($db_host, $db_root, $db_pass, $db_name, $db_port) or die('peut pas se co');
                    }
                    /*----Elimination de toute les attaque de type SQL Injection et XSS----*/
                    $username = mysqli_real_escape_string($db,htmlspecialchars($_POST['username'])); 
                    $password = mysqli_real_escape_string($db,htmlspecialchars($_POST['password']));
                ?>
        </div>
    </div>
    <script type='text/javascript' src='./assets/vendors/jquery/jquery-ui.min.js'></script>
    <script type="text/javascript" src="./assets/js/script.js" ></script>
</body>
</html>