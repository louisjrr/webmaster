<?php
 include 'user.php';

 abstract class user{
     private $role;
     private $mail;
     private $password;
     private $Fname;
     private $Lname;
     private $age;
     private $adresse;
 }

 class stutend extends user{}
 class delegate extends user{}
 class tutor extends user{}
 class admin extends user{}
?>