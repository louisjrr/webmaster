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
        //$res_places = $stage->places($db);
        require('./View/home.php');
    }
    function NewInternship(){
        global $stage;
        $competences=$stage->competences();
        if(isset($_POST['stage'])){
            $stage->add($_POST['entreprise'],$_POST['titre_stage'],$_POST['description'],$_POST['nb_place']);
            header('Location:http://localhost/www/webmaster/');
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
?>