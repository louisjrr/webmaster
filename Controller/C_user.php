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

    function getRight(){
        $right = '1';
        for($i=2;$i<34;$i++){
            if($_POST['SFx'.$i] == 'on'){
                $right = $right .'1';
            }
            elseif($i == 21 || $i == 27 || $i == 28 || $i == 29 || $i == 30 || $i == 31){
                continue;
            }
            else{
                $right = $right . '0';
            }
        }
        return $right;
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
        $right = getRight();
        $obj = new Delegate($_POST['mail'],$_POST['password'],$_POST['Lname'],$_POST['Fname'], $age, $_POST['password'],$_POST['city'], $right);
        $obj->addPermission($db, $right);
        $obj->addDelegate($db, $_POST['campus'], $_POST['promotion']);
        break;
 }

 

 header("Location: ../View/home.php");
 exit;
 

?>