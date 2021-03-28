<?php

        function connect(){
            try
            {
                $db = new PDO('mysql:host=localhost;dbname=webmaster;charset=utf8', 'root', '');
            }
            catch (Exception $e)
            {
                die('Erreur : ' . $e->getMessage());
            }
            return $db;
        }
?>