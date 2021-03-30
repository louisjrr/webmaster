<?php
    include './Model/M_stages.php';
    $stage = new Stage();
    function home(){
        global $stage;
        $res = $stage->getAllStages();
        if (isset( $_POST['search'])){
            $stage-> intitule_offre = $_POST['search'];
            $res = $stage->research();
        };
        $skills = $stage->competences();
        $company = $stage->getCompany();
        //$res_places = $stage->places($db);
        require('./View/home.php');
    }
    function NewInternship(){
        global $stage;
        $competences= $stage->competences();
        $company =$stage->getCompany();
        if(isset($_POST['stage'])){
            $j = $stage->add($_POST['entreprise'],$_POST['titre_stage'],$_POST['description'],$_POST['nb_place']);
            echo 'nbcomptences : '.$j[0][0].', id :'.$j[1];
            for($i=0;$i<=$j[0][0];$i++){
                if(isset($_POST['comp'.$i])){
                    $stage->addCompt($i,$j[1]);
                    echo"coucou";
                }
            }
            //header('Location:http://www.needs.com');
        }
        require('./View/addOffre.php');
    }
    function Add($titre, $description, $entreprise){
        global $stage;
        $stage->addwishlist($titre, $description, $entreprise);
    }
    function Remove($titre, $description, $entreprise){
        global $stage;
        $stage->removewishlist($titre, $description, $entreprise);
    }
    function postulate(){
        global $stage;
        if (isset($_POST["sub_postulate"])){
            $CVName = "";
            $LDMName = "";
            $maxsize= 10000000;
            $ValidExt= '.pdf';
            if($_FILES["cv"]['error']>0){
                echo 'une erreur est survenu lors du transfert';
                die;
            }
            $sizeFile = $_FILES["cv"]['size'];
            if($sizeFile>$maxsize){
                echo"la taille du ficher est supérieure à la taille maximum";
                die;
            }
            $CVName = $_FILES['cv']['name'];
            $LDMName = $_FILES['cv']['name'];
            $CVExt = '.'. strtolower(substr(strrchr($CVName,'.'),1));
            $LDMExt = '.'. strtolower(substr(strrchr($LDMName,'.'),1));

            if($CVExt != $ValidExt){
                echo "L'extension du fichier n'est pas acceptée";
                die;
            }
            $tmpCVName = $_FILES['cv']['tmp_name'];
            $tmpLDMName = $_FILES['motiv']['tmp_name'];
            $uniqueNameCV = md5(uniqid(rand(), true));
            $uniqueNameLDM = md5(uniqid(rand(), true));
            $CVName = "../VH_2/Uploaded_files/".$uniqueNameCV.$CVExt;
            echo $CVName;
            $LDMName = "../VH_2/Uploaded_files/".$uniqueNameLDM.$LDMExt;
            $CVresult = move_uploaded_file($tmpCVName,$CVName);
            $LDMresult = move_uploaded_file($tmpLDMName,$LDMName);
        
        $stage->Postulate($CVName, $LDMName);
        }
        header("Location:Home");
    }
    function stage($titre, $description, $entreprise){
            session_start();
            $_SESSION['titre']= $titre;
            $_SESSION['description']= $description;
            $_SESSION['entreprise']= $entreprise;
        }

    function detailOffre($idOffre, $idUser){
        global $db;
        $queryDetail = $db->prepare("CALL afficher(:idOffre, :idUser)");
        $queryDetail->execute(array('idOffre'=>$idOffre, 'idUser'=> $idUser));
        $table = $queryDetail->fetch();
        return $table;
    }

    /*$tableDetail = detailOffre($idoffre, $iduser);
    for ($i=0; $i = (count($tableDetail)-3);$i++){
        $echo($tableDetail['nom_competence'.$i].'  ');
    }*/
    function AfficherCompetences($idOffre){
        $StringReturn = "";
        $tableDetail = detailOffre($idOffre, $_SESSION['id']); 
        for ($i=0; $i < (count($tableDetail)-6);$i+=2){ 
            $StringReturn = $StringReturn.$tableDetail['nom_competence'.$i/2].' / ';
         } 
        return $StringReturn;
    }
    
?>