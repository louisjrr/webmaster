<?php
        /*----Connexion à la BDD----*/
        try
        {
            $db = new PDO('mysql:host=localhost;dbname=webmaster;charset=utf8', 'root', '');
        }
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }
?>