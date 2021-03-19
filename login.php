<?php
 include 'database.php';
 
    /*----Elimination de toute les attaque de type SQL Injection et XSS----*/
   /* $username = mysqli_real_escape_string($db,htmlspecialchars($_POST['login'])); 
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
            else{
                header("Location: http://localhost/www/webmaster/index.php");
                exit();
                echo "<script language=javascript>
                    var a = alert('Incorrect password');
                </script>";
            }
        }
        else{
            echo "<script language=javascript>
                console.log('non connecté');
            </script>";
        }
    }*/

    if(isset($_POST['connectLogin'])){
        if($_POST['login'] !=="" && $_POST['password'] !==""){
            $requestLogin = $db->prepare('SELECT idutilisateur, mdp FROM utilisateurs WHERE mail = :username');
            $requestLogin->execute(array('username' => $_POST['login']));
            $infoUser = $requestLogin->fetch();

            if(!$infoUser){
                echo 'mauvais identifiant ou mot de passe!';
            }
            else{
                if($_POST['password'] == $infoUser['mdp']){
                    header('Location: home.php');
                    session_start();
                    $_SESSION['id'] = $infoUser['idutilisateur'];
                    echo 'Vous êtes connecté !';
                    exit();
                }
                else{
                    echo 'mauvais identifiant ou mot de passe!';
                }
            }
        }
    }
            
?>