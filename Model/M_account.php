<?php

abstract class Account{
    protected $idRole;

    public function modifProfil($nom, $prenom, $age, $adresse, $id){
            $requestModifProfil = $db->prepare('UPDATE utilisateurs SET nom = :nom, prenom = :prenom, age = :age, adresse = :adresse WHERE idutilisateur = :iduser');
            $requestModifProfil->execute(array('nom' => $nom, 'prenom' => $prenom, 'age' => $age, 'adresse' => $adresse, 'iduser' => $id ));

            $requestUpdatSession = $db->prepare('SELECT idutilisateur,idrole,mail,mdp,nom,prenom,age,adresse,visible FROM utilisateurs WHERE idutilisateur = :iduser');
            $requestUpdatSession->execute(array('iduser' => $id));
            $NEWinfoUser = $requestUpdatSession->fetch();

            $_SESSION['nom'] = $NEWinfoUser['nom'];
            $_SESSION['prenom'] = $NEWinfoUser['prenom'];
            $_SESSION['age'] = $NEWinfoUser['age'];
            $_SESSION['adresse'] = $NEWinfoUser['adresse'];

            header('Location: ./Account');
            exit();
    }

    public function afficher($idRole){
        global $db;
        $query = $db->query("SELECT * FROM utilisateurs WHERE idrole = '$idRole'");
        $account = $query->fetchAll();
        return $account;
    }
 
}
class AccountAdmin extends account{
    function __construct($idRole){
        $this->idRole = $idRole;
    }
}
class AccountPilote extends account{
    function __construct($idRole){
        $this->idRole = $idRole;
    }
}
class AccountStudent extends account{
    function __construct($idRole){
        $this->idRole = $idRole;
    }
}
class AccountDelegate extends account{

    public function afficherDelegate(){
        global $db;
        $query = $db->query("SELECT * FROM utilisateurs WHERE idrole > 3");
        $account = $query->fetchAll();
        return $account;
    }
}

?>