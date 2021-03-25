<?php
    include_once './Controller/C_database.php';

    
    class Stage{
        
        public function getAllStages(){
            global $db;
            session_start();
            $request = $db->query('SELECT intitule_offre, description, nom_entreprise FROM offres_de_stage, entreprises WHERE offres_de_stage.IDENTREPRISE = entreprises.IDENTREPRISE AND NOT EXISTS (SELECT IDOFFRE FROM candidatures WHERE IDUTILISATEUR = '.$_SESSION['id'].' AND offres_de_stage.IDOFFRE = candidatures.IDOFFRE) AND NOT EXISTS (SELECT IDOFFRE FROM met_en_wishlist WHERE IDUTILISATEUR = '.$_SESSION['id'].' AND offres_de_stage.IDOFFRE = met_en_wishlist.IDOFFRE);');
            $getstages = $request->fetchAll();
            return $getstages;
        }
        public function research(){
            global $db;
            $request = $db->prepare("SELECT intitule_offre,description, nom_entreprise FROM offres_de_stage, entreprises WHERE offres_de_stage.IDENTREPRISE = entreprises.IDENTREPRISE AND intitule_offre LIKE ?");
            $request->execute(array("%".$this->intitule_offre."%"));
            $search = $request->fetchAll();
            return $search;
        }
        public function competences(){
            global $db;
            $request = $db->query('SELECT nom_competence FROM competences ORDER BY nom_competence ASC');
            $competences = $request->fetchAll();
            return $competences;
        }        
        /*public function places($db){
            $request = $db->query('SELECT nombres_places FROM offres_de_stage');
            $places = $request->fetchAll();
            return $places;
        }*/
        public function add($entreprise,$titre_stage, $description_stage,$nb_places){
            global $db;
            $request = $db->prepare("INSERT INTO offres_de_stage (identreprise, intitule_offre, description, nombre_places) SELECT identreprise,:titre,:description,:places FROM entreprises where nom_entreprise=:entreprise");
            $request->execute(array('titre'=>$titre_stage,'description'=>$description_stage,'places'=>$nb_places,'entreprise'=>$entreprise));
        }
        public function addwishlist($titre, $description, $entreprise){
            global $db;
            session_start();
            $request = $db->query('INSERT INTO met_en_wishlist (idutilisateur, idoffre) SELECT '.$_SESSION["id"].', idoffre FROM offres_de_stage, entreprises WHERE offres_de_stage.identreprise = entreprises.identreprise AND intitule_offre="'.$titre.'" AND description="'.$description.'" AND nom_entreprise="'.$entreprise.'"');
        }
        public function removewishlist($titre, $description, $entreprise){
            global $db;
            session_start();
            $request = $db->query('DELETE FROM met_en_wishlist WHERE idutilisateur = '.$_SESSION["id"].' AND idoffre IN (SELECT idoffre FROM offres_de_stage, entreprises WHERE offres_de_stage.identreprise = entreprises.identreprise AND intitule_offre = "'.$titre.'" AND description = "'.$description.'" AND nom_entreprise = "'.$entreprise.'")');
        }
        public function Postulate($titre, $description, $entreprise){
            global $db;
            session_start();
            echo $titre.$description.$entreprise.$_GET['cv'].$_GET['motiv'];
            $request = $db->query('INSERT INTO candidatures (idoffre, idutilisateur, etat_avancement, statut, cv, ldm) SELECT idoffre, '.$_SESSION["id"].', 1, 1, '.$_GET["cv"].', '.$_GET["motiv"].' FROM offres_de_stage, entreprises WHERE offres_de_stage.identreprise = entreprises.identreprise AND intitule_offre = "'.$titre.'" AND description = "'.$description.'" AND nom_entreprise = "'.$entreprise.'";');
            
        }
    }
?>