<?php
    class stage{}
    function titre(){
        include 'database.php';
        $query="SELECT idrole FROM roles";
        $res = mysqli_query($db, $query);
        $nb = $res -> fetch(PDO::FETCH_ASSOC);
        //foreach($nb as $n)
        for($i=1; $i<= count($nb);$i++){
            echo "<script language=javascript>
            var a = alert($nb[$i]);
        </script>";}
    }
?>