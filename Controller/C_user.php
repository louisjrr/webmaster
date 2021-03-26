<?php
    include './Model/M_user.php';
    
    function Register(){
        /*----Redirection vers la page de connexion si l'adresse mail existe déja----*/ 
        $response = CheckMail();
        if($response > 0){
            header("Location: Register");
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
                $obj = new Admin($_POST['mail'],$_POST['password'],$_POST['Lname'],$_POST['Fname'], $age, $_POST['city']);
                $obj->addUser($_POST['campus'], $_POST['promotion']);
                break;
            case "tutor":
                $age = getAge($_POST['birthdate']);
                $obj = new Tutor($_POST['mail'],$_POST['password'],$_POST['Lname'],$_POST['Fname'], $age,$_POST['city']);
                $obj->addUser($_POST['campus'], $_POST['promotion']);
                break;
            case "student":
                $age = getAge($_POST['birthdate']);
                $obj = new Student($_POST['mail'],$_POST['password'],$_POST['Lname'],$_POST['Fname'], $age, $_POST['city']);
                $obj->addUser($_POST['campus'], $_POST['promotion']);
                break;
            case "delegate":
                $age = getAge($_POST['birthdate']);
                $right = getRight();
                $obj = new Delegate($_POST['mail'],$_POST['password'],$_POST['Lname'],$_POST['Fname'], $age, $_POST['city'], $right);
                $obj->addPermission($right);
                $obj->addDelegate($_POST['campus'], $_POST['promotion']);
                break;
        }
        header("Location: Home");
    }

?>