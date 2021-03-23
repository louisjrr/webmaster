<?php
    include '../Model/M_user.php';
    include 'C_database.php';
    /*----Redirection vers la page de connexion si l'adresse mail existe déja----*/ 
    $testMail = $_POST['mail'];
    $query = $db->query("SELECT idutilisateur FROM utilisateurs WHERE mail ='$testMail'");
    $response = $query->fetch(PDO::FETCH_NUM);
    echo $response;
    if($response[0] > 0){
        header("Location: ./register.php");
        exit;
    }
    


 switch($_POST['promotion']){
     case "A1":
        $idPromo = 1;
        break;
    case "A2":
        $idPromo = 2;
        break;
    case "A3":
        $idPromo = 3;
        break;
    case "A4":
        $idPromo = 4;
        break;
    case "A5":
        $idPromo = 5;
        break;
 }

 switch($_POST['role']){
     case "admin":
        $age = getAge($_POST['birthdate']);
        $obj = new Admin($_POST['mail'],$_POST['password'],$_POST['Lname'],$_POST['Fname'], $age, $_POST['password'],$_POST['city']);
        $obj->addUser($db, $_POST['campus'], $_POST['promotion']);
        break;
     case "tutor":
        $age = getAge($_POST['birthdate']);
        $obj = new Tutor($_POST['mail'],$_POST['password'],$_POST['Lname'],$_POST['Fname'], $age, $_POST['password'],$_POST['city']);
        $obj->addUser($db, $_POST['campus'], $_POST['promotion']);
        break;
     case "student":
        $age = getAge($_POST['birthdate']);
        $obj = new Student($_POST['mail'],$_POST['password'],$_POST['Lname'],$_POST['Fname'], $age, $_POST['password'],$_POST['city']);
        $obj->addUser($db, $_POST['campus'], $_POST['promotion']);
        break;
     case "delegate":
        $age = getAge($_POST['birthdate']);
        $obj = new Delegate($_POST['mail'],$_POST['password'],$_POST['Lname'],$_POST['Fname'], $age, $_POST['password'],$_POST['city']);
        $obj->addDelegate($db, $_POST['campus'], $_POST['promotion']);
        break;
 }

 if($_POST['role'] == "Delegate"){
    header("Location: ../View/droits.php");
        exit;
 }
 else{
    header("Location: ../View/index.php");
 exit;
 }

?>