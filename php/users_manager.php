<?php

// mampiditra utlisateurs anaty bd 

    class users_manager {

        private $db;

        public function __construct(PDO $db) {

            $this -> db = $db;
        }

        public function insert (users $user) {

            $requete = $this -> db -> prepare ("INSERT INTO sb_signin.users (pseudo, psw, email) 
                VALUES (:pseudo, :psw, :email);");

            $requete -> bindValue(':pseudo', $user -> get_pseudo());
            $requete -> bindValue(':psw', $user -> get_psw());
            $requete -> bindValue(':email', $user -> get_email());

            $requete -> execute();
        }
    }

?>