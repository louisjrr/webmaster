<?php
class UserNotif{
    public function getNotifs($idUser){
        global $db;
        $queryNotif = $db->prepare("SELECT idnotification, idcandidature, contenu, vue FROM notifications WHERE idutilisateur = :iduser");
        $queryNotif->execute(array('iduser'=> $idUser));
        $table = $queryNotif->fetchAll();
        return $table;
    }
    public function getOffre($iCandidature){
        $queryCandid = $db->prepare("SELECT idoffre, intitule_offre FROM offres_de_stage WHERE idoffre = :idcand");
        $queryCandid->execute(array('idcand'=> $idCandidature));
        $result = $queryNotif->fetchAll();
        $name = $result['intitule_offre'];
        return $name;
    }
}

?>