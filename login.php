<?php
    session_start();
    if(isset($_POST['login']) && isset($_POST['password']) && isset($_POST['submit']))
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
    $username = mysqli_real_escape_string($db,htmlspecialchars($_POST['login'])); 
    $password = mysqli_real_escape_string($db,htmlspecialchars($_POST['password']));


    if($username !=="" && $password !=="")
    {
        $query="SELECT idutilisateur FROM utilisateurs WHERE mail ='$username'";
        $result = mysqli_query($db, $query);
        if (mysqli_num_rows($result) == 1){
            $query ="SELECT mdp FROM utilisateurs WHERE mail ='$username'";
            $result = mysqli_query($db, $query);
            $row = $result->fetch_assoc();
            if($_POST['password'] == $row['mdp']){
                header("Location: http://localhost/www/webmaster/home.php");
            }
        }
        else{
            echo "<script language=javascript>
                console.log('non connecté');
            </script>";
        }
    }
            
?>