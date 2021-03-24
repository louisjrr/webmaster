<?php

 abstract class User{
     protected $idRole;
     protected $mail;
     protected $password;
     protected $Fname;
     protected $Lname;
     protected $age;
     protected $adresse;
     public $db;


     public function addUser($db, $idCampus, $idPromo){

        $query = $db->query("INSERT INTO utilisateurs (idrole, mail, mdp, nom, prenom, age, adresse, visible) VALUES ('$this->idRole', '$this->mail', '$this->password', '$this->Lname', '$this->Fname', '$this->age', '$this->adresse', 1)");
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

     function __construct($mail, $password, $Lname, $Fname, $age, $adresse, $right){
         $this->mail = $mail;
         $this->password = $password;
         $this->Lname = $Lname;
         $this->Fname = $Fname;
         $this->age = $age;
         $this->adresse = $adresse;
         $this->right = $right;
        }
     function addPermission($db){
        $query = $db->query("INSERT INTO autorisations (autorisations) VALUES ('$right')");
        $response = $db->query("SELECT MAX(idautorisation) FROM autorisations");
        $idMax = $response->fetch(PDO::FETCH_NUM);
        $query = $db->query("INSERT INTO roles (idautorisation, nom_role) VALUES ('$idMax[0]', Délégué)");
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