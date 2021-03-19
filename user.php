<?php
 include 'user.php';

 abstract class user{
     private $idRole;
     private $mail;
     private $password;
     private $Fname;
     private $Lname;
     private $age;
     private $adresse;
     private $right;
 }

 class student extends user{
     public $right = 11111111000100000000000000111110010;
     public $idRole = 3;

     function __construct($mail, $password, $Fname, $age, $adresse){
         $this->mail = $mail;
         $this->password = $password;
         $this->Fname = $Fname;
         $this->age = $age;
         $this->adresse = $adresse;
     }
 }
 class delegate extends user{
    public $idRole = 4;

     function __construct($right, $mail, $password, $Fname, $age, $adresse){
         $this->right = $right;
         $this->mail = $mail;
         $this->password = $password;
         $this->Fname = $Fname;
         $this->age = $age;
         $this->adresse = $adresse;
     }
 }
 class tutor extends user{
    public $right = 11111111111100001111111111000001100;
    public $idRole = 2;
 }
 class admin extends user{
     public $right = 11111111111111111111111111111111111;
     public $idRole = 1;

     function __construct($mail, $password, $Fname, $age, $adresse){
        $this->mail = $mail;
        $this->password = $password;
        $this->Fname = $Fname;
        $this->age = $age;
        $this->adresse = $adresse;
     }
 }
?>