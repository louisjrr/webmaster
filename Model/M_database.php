<?php
/*
    class Database {
        private $host;
        private $db_name;
        private $db_user;
        private $db_password;

        function __construct($host, $db_name, $db_user, $db_password){
            $this->host = $host;
            $this->db_name = $db_name;
            $this->db_user = $db_user;
            $this->db_password = $db_password;
        }

        public function Connexion(){
             try
            {
                $db = new PDO('mysql:host=localhost;dbname=webmaster;charset=utf8', 'root', '');
            }
            catch (Exception $e)
            {
                die('Erreur : ' . $e->getMessage());
            }
        }
    }
        */

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