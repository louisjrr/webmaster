<?php

 abstract class User{
     protected $idRole;
     private $mail;
     private $password;
     private $Fname;
     private $Lname;
     //private $age;
     private $adresse;
     protected $right;

     public function addUser($idRole, $mail, $password, $Lname, $Fname, $age, $adresse, $idCampus, $idPromo){
        include 'database.php';
        echo $idRole, $mail, $password, $Lname, $Fname, $age, $adresse;
        echo "</br>";
        $query = $db->query("INSERT INTO utilisateurs (idrole, mail, mdp, nom, prenom, age, adresse) VALUES ('$idRole', '$mail', '$password', '$Lname', '$Fname', '$age', '$adresse')");
        $response = $db->query("SELECT MAX(idutilisateur) FROM utilisateurs");
        $idMax = $response->fetch(PDO::FETCH_NUM);
        echo $idMax[0];
        $query = $db->query("INSERT INTO etudier_a (idutilisateur, idcentre) VALUES ('$idMax[0]', '$idCampus')");
        $query = $db->query("INSERT INTO faire_partie_ou_encadrer (idutilisateur, idpromotion) VALUES ('$idMax[0]', '$idPromo')");
     }
 }
 class Admin extends User{
    public $idRole = 1;

    function __construct($mail, $password, $Lname, $Fname, $age, $adresse){
       $this->mail = $mail;
       $this->password = $password;
       $this->Lname = $Lname;
       $this->Fname = $Fname;
       $this->age = $age;
       $this->adresse = $adresse;
     }
 }
    
 class Tutor extends User{
    public $idRole = 2;

    function __construct($mail, $password, $Lname, $Fname, $age, $adresse){
        $this->mail = $mail;
        $this->password = $password;
        $this->Lname = $Lname;
        $this->Fname = $Fname;
        $this->age = $age;
        $this->adresse = $adresse;
     }
 }

 class Student extends User{
     public $idRole = 3;

     function __construct($mail, $password, $Lname, $Fname, $age, $adresse){
         $this->mail = $mail;
         $this->password = $password;
         $this->Lname = $Lname;
         $this->Fname = $Fname;
         $this->age = $age;
         $this->adresse = $adresse;
     }

 }
 class Delegate extends User{
    public $idRole = 4;

     function __construct($mail, $password, $Lname, $Fname, $age, $adresse){
         $this->right = $right;
         $this->mail = $mail;
         $this->password = $password;
         $this->Lname = $Lname;
         $this->Fname = $Fname;
         $this->age = $age;
         $this->adresse = $adresse;
        }
 }

 function getAge($birthdate) { 
    $age = date('Y') - $birthdate; 
   if (date('md') < date('md', strtotime($birthdate))) { 
       return $age - 1; 
   } 
   return $age; 
    }   


 switch($_POST['promotion']){
     case "A1":
        $idPromo = 5;
        break;
    case "A2":
        $idPromo = 5;
        break;
    case "A3":
        $idPromo = 5;
        break;
    case "A4":
        $idPromo = 5;
        break;
    case "A5":
        $idPromo = 5;
        break;
 }

 switch($_POST['role']){
     case "admin":
        $age = getAge($_POST['birthdate']);
        $obj = new Admin($_POST['mail'],$_POST['password'],$_POST['Lname'],$_POST['Fname'], $age, $_POST['password'],$_POST['city']);
        $obj->addUser($obj->idRole,$obj->mail,$obj->password,$obj->Lname,$obj->Fname,$obj->age,$obj->adresse, $idCampus, $idPromo);
        break;
     case "tutor":
        $age = getAge($_POST['birthdate']);
        $obj = new Tutor($_POST['mail'],$_POST['password'],$_POST['Lname'],$_POST['Fname'], $age, $_POST['password'],$_POST['city']);
        $obj->addUser($obj->idRole,$obj->mail,$obj->password,$obj->Lname,$obj->Fname,$obj->age,$obj->adresse, $idCampus, $idPromo);
        break;
     case "student":
        $age = getAge($_POST['birthdate']);
        $obj = new Student($_POST['mail'],$_POST['password'],$_POST['Lname'],$_POST['Fname'], $age, $_POST['password'],$_POST['city']);
        $obj->addUser($obj->idRole,$obj->mail,$obj->password,$obj->Lname,$obj->Fname,$obj->age,$obj->adresse, $_POST['campus'], $_POST['promotion']);
        break;
     case "delegate":
        header("Location:http://localhost/www/webmaster/droits.php");
        exit();
        break;
 }

 header("Location: http://localhost/www/webmaster/index.php");
 exit();
 
?> 