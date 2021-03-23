<?php
include '../Controller/C_database.php';
    class Stages{
        
        private $titre;
        private $entreprise;
        private $description;
        private $places;
        function __construct($titre,$entreprise,$description,$places){
            $this->titre = $titre;
            $this->entreprise = $entreprise;
            $this->description = $description;
            $this->places = $places;
        }
        public function titre(){
            $request = $db->query('SELECT intitule_offre FROM offres_de_stage');
            $titre = $request->fetchAll();
        }
        public function entreprise(){
            $request = $db->query('SELECT IDOFFRE, NOM_ENTREPRISE FROM offres_de_stage, entreprises WHERE offres_de_stage.IDENTREPRISE = entreprises.IDENTREPRISE');
            $entreprise = $request->fetchAll();
        }
        public function description(){
            $request = $db->query('SELECT description FROM offres_de_stage');
            $description = $request->fetchAll();
        }
        public function places(){
            $request = $db->query('SELECT nombres_places FROM offres_de_stage');
            $places = $request->fetchAll();
        }
        public function research($value){
            $request = $db->prepare("SELECT intitule_offre,description,identreprise FROM offres_de_stage WHERE intitule_offre LIKE ?");
            $request->execute(array("%$value%"));
            $infoUser = $request->fetchAll();
            foreach($infoUser as $n){
                echo '<div class="stage"><h2 class="titre">'.$n["intitule_offre"].'</h2><i class="far fa-heart"></i><p class="description">'.$n['description'].'</p>';
                $request2 = $db->query('SELECT nom_entreprise FROM entreprises WHERE identreprise = '.$n["identreprise"].'');
                $nom = $request2->fetchAll();
                foreach($nom as $m){
                echo '<br><h5 class="entreprise">'.$m["nom_entreprise"].'</h5></div>';
                }
            }
        }
        public function competences(){
            include 'M_database.php';
            $request = $db->query('SELECT nom_competence FROM competences ORDER BY nom_competence ASC');
            $infoUser = $request->fetchAll();
            foreach($infoUser as $n){
                echo '<input type="checkbox" value="'.$n["nom_competence"].'"></input><label>'.$n["nom_competence"].'</label>';
            }
        }
        public function add($entreprise,$titre_stage, $description_stage,$nb_places){
            include 'M_database.php';
            $request = $db->query("INSERT INTO offres_de_stage (identreprise, intitule_offre, description, nombre_places) SELECT identreprise,'$titre_stage','$description_stage','$nb_places' FROM entreprises where nom_entreprise='$entreprise'");
        }
    }
    if(isset($_POST['stage'])){
        add($_POST['entreprise'],$_POST['titre_stage'],$_POST['description'],$_POST['nb_place']);
        header('Location:http://localhost/www/webmaster/home.php');
        die();
    }
?>