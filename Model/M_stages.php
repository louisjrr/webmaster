<?php
    include_once './Controller/C_database.php';

    if(isset($_POST['stage'])){
        add($_POST['entreprise'],$_POST['titre_stage'],$_POST['description'],$_POST['nb_place']);
        header('Location:http://localhost/www/webmaster/');
    }
    class Stage{


        
        public function getAllStages(){
            global $db;
            $request = $db->query('SELECT intitule_offre,description, nom_entreprise FROM offres_de_stage, entreprises WHERE offres_de_stage.IDENTREPRISE = entreprises.IDENTREPRISE');
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
            $request = $db->query("INSERT INTO offres_de_stage (identreprise, intitule_offre, description, nombre_places) SELECT identreprise,'$titre_stage','$description_stage','$nb_places' FROM entreprises where nom_entreprise='$entreprise'");
        }
    }

?>