<?php

abstract class Account{
    protected $idRole;

    public function modifProfil($nom, $prenom, $age, $adresse, $id){
            global $db;
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

    public function noterEntreprise($idUser, $note, $com, $identreprise){
        global $db;
        $queryNote = $db->prepare("INSERT INTO evaluations (identreprise, idutilisateur, note, commentaire) VALUES (:idEntreprise, :idUser, :note, :com)");
        $queryNote->execute(array('idEntreprise'=>$identreprise,'idUser'=> $idUser, 'note'=>$note, 'com'=>$com ));
        echo ("tout est ok frr");
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