<?php

    $right = '1';

    for($i=2;$i<34;$i++){
        if($_POST['SFx'.$i] == 'on'){
            $right = $right .'1';
        }
        elseif($i == 21 || $i == 27 || $i == 28 || $i == 29 || $i == 30 || $i == 31){
            continue;
        }
        else{
            $right = $right . '0';
        }
    }
   
?>

