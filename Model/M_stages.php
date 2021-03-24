<?php
    class Stage{
        

        public function getAllStages($db){
            $request = $db->query('SELECT intitule_offre,description, nom_entreprise FROM offres_de_stage, entreprises WHERE offres_de_stage.IDENTREPRISE = entreprises.IDENTREPRISE');
            $getstages = $request->fetchAll();
            return $getstages;
        }
        
        /*public function places($db){
            $request = $db->query('SELECT nombres_places FROM offres_de_stage');
            $places = $request->fetchAll();
            return $places;
        }*/
        public function research($db,$value){
            $request = $db->prepare("SELECT intitule_offre,description, nom_entreprise FROM offres_de_stage, entreprises WHERE offres_de_stage.IDENTREPRISE = entreprises.IDENTREPRISE AND intitule_offre LIKE ?");
            $request->execute(array("%$value%"));
            $search = $request->fetchAll();
            return $search;
        }
        public function competences(){
            $request = $db->query('SELECT nom_competence FROM competences ORDER BY nom_competence ASC');
            $infoUser = $request->fetchAll();
            foreach($infoUser as $n){
                echo '<input type="checkbox" value="'.$n["nom_competence"].'"></input><label>'.$n["nom_competence"].'</label>';
            }
        }
        public function add($entreprise,$titre_stage, $description_stage,$nb_places){
            $request = $db->query("INSERT INTO offres_de_stage (identreprise, intitule_offre, description, nombre_places) SELECT identreprise,'$titre_stage','$description_stage','$nb_places' FROM entreprises where nom_entreprise='$entreprise'");
        }
    }
    if(isset($_POST['stage'])){
        add($_POST['entreprise'],$_POST['titre_stage'],$_POST['description'],$_POST['nb_place']);
        header('Location:http://localhost/www/webmaster/home.php');
        die();
    }
?>