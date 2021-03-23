<?php
 include 'database.php';
 abstract class User{
     protected $idRole;
     private $mail;
     private $password;
     private $Fname;
     private $Lname;
     //private $age;
     private $adresse;

     public function addUser($idRole, $mail, $password, $Lname, $Fname, $age, $adresse, $idCampus, $idPromo){
        include 'database.php';
        $query = $db->query("INSERT INTO utilisateurs (idrole, mail, mdp, nom, prenom, age, adresse, visible) VALUES ('$idRole', '$mail', '$password', '$Lname', '$Fname', '$age', '$adresse', 1)");
        $response = $db->query("SELECT MAX(idutilisateur) FROM utilisateurs");
        $idMax = $response->fetch(PDO::FETCH_NUM);
        $query = $db->query("INSERT INTO etudier_a (idutilisateur, idcentre) VALUES ('$idMax[0]', '$idCampus')");
        $response = $db->query("SELECT MAX(idutilisateur) FROM utilisateurs");
        $idMax = $response->fetch(PDO::FETCH_NUM);
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
     private $right;

     function __construct($mail, $password, $Lname, $Fname, $age, $adresse){
         $this->mail = $mail;
         $this->password = $password;
         $this->Lname = $Lname;
         $this->Fname = $Fname;
         $this->age = $age;
         $this->adresse = $adresse;
        }

     public function addDelegate($mail, $password, $Lname, $Fname, $age, $adresse, $idCampus, $idPromo){
        include 'database.php';
        $query = $db->query("INSERT INTO utilisateurs ( mail, mdp, nom, prenom, age, adresse, visible) VALUES ('$mail', '$password', '$Lname', '$Fname', '$age', '$adresse', 1)");
        $response = $db->query("SELECT MAX(idutilisateur) FROM utilisateurs");
        $idMax = $response->fetch(PDO::FETCH_NUM);
        $query = $db->query("INSERT INTO etudier_a (idutilisateur, idcentre) VALUES ('$idMax[0]', '$idCampus')");
        $response = $db->query("SELECT MAX(idutilisateur) FROM utilisateurs");
        $idMax = $response->fetch(PDO::FETCH_NUM);
        $query = $db->query("INSERT INTO faire_partie_ou_encadrer (idutilisateur, idpromotion) VALUES ('$idMax[0]', '$idPromo')");
    }
 }

 function getAge($birthdate) { 
    $age = date('Y') - $birthdate; 
   if (date('md') < date('md', strtotime($birthdate))) { 
       return $age - 1; 
   } 
   return $age; 
    }


 
?> 