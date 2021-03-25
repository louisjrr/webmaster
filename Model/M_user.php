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

        $query = $db->prepare("INSERT INTO utilisateurs (idrole, mail, mdp, nom, prenom, age, adresse, visible) VALUES (:idrole, :mail, :mdp, :nom, :prenom, :age, :adresse, 1)");
        $query->execute(array('idrole'=>$this->idRole,'mail' =>$this->mail, 'mdp'=>$this->password, 'nom'=>$this->Lname, 'prenom'=>$this->Fname, 'age'=>$this->age, 'adresse'=>$this->adresse));
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
        public function addDelegate($db, $idCampus, $idPromo){
            
            $query = $db->query("SELECT MAX(idrole) FROM roles");
            $idRole = $query->fetch(PDO::FETCH_NUM);
            //$query = $db->query("INSERT INTO utilisateurs (idrole ,mail, mdp, nom, prenom, age, adresse, visible) VALUES ('$idRole[0]','$this->mail', '$this->password', '$this->Lname', '$this->Fname', '$this->age', '$this->adresse', 1)");
            $queryUser = $db->prepare("INSERT INTO utilisateurs (idrole ,mail, mdp, nom, prenom, age, adresse, visible) VALUES (:idRole,:mail,:pass, :Lname', :Fname, :age, :adresse, 1)");
            $queryUser->execute(array('idrole' => $idRole[0], 'mail' => $this->mail, 'pass' => $this->password, 'Lname' => $this->Lname, 'Fname' => $this->Fname, 'age' => $this->age, 'age' => $this->age, 'adresse' => $this->adresse));
            $response = $db->query("SELECT MAX(idutilisateur) FROM utilisateurs");
            $idMax = $response->fetch(PDO::FETCH_NUM);
            $query = $db->query("INSERT INTO etudier_a (idutilisateur, idcentre) VALUES ('$idMax[0]', '$idCampus')");
            $response = $db->query("SELECT MAX(idutilisateur) FROM utilisateurs");
            $idMax = $response->fetch(PDO::FETCH_NUM);
            $query = $db->query("INSERT INTO faire_partie_ou_encadrer (idutilisateur, idpromotion) VALUES ('$idMax[0]', '$idPromo')");
         }
        
     function addPermission($db, $right){
        $query = $db->query("INSERT INTO autorisations (autorisations) VALUES ('$right')");
        $response = $db->query("SELECT MAX(idautorisation) FROM autorisations");
        $idMax = $response->fetch(PDO::FETCH_NUM);
        $query = $db->query("INSERT INTO roles (idautorisation, nom_role) VALUES ('$idMax[0]', 'Délégué')");
        
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