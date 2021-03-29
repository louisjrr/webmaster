<?php
session_start();
function noStudent(){
    switch($_SESSION['idRole']):
        case 3:
            header("Location: /");
            break;
        endswitch;
        
}

function noStudentNoPilote(){
    switch($_SESSION['idRole']):
        case 3:
            header("Location: /");
            break;
        case 2:
            header("Location: /");
            break;
        endswitch;
        
}

?>
