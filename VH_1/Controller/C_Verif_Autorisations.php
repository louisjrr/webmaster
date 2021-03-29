<?php
session_start();
function noStudent(){
    switch($_SESSION['idRole']):
        case 3:
            header("Location: /");
            break;
        endswitch;
        
}
?>