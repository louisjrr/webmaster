<?php

abstract class account{
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

    public function afficher(){
        global $db;

        $query = $db->query("SELECT * FROM utilisateurs WHERE idrole = '$this->idRole'");
        $account = $query->fetchAll();

    }
 
}
class accountPilote extends account{
    function __construct($idRole){
        $this->idRole = $idRole;
    }
}
class accountEtudiant extends account{
    function __construct($idRole){
        $this->idRole = $idRole;
    }
}
class accountDelegate extends account{
    function __construct($idRole){
        $this->idRole = $idRole;
    }
    function afficher(){
        global $db;
        $query = $db->query("SELECT * FROM utilisateurs WHERE idrole = $idRole > 3");
        $account = $query->fetchAll();

    }
}

?>