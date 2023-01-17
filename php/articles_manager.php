<?php

//insertion articles dans la base de données

    class articles_manager {
        private $db;

        public function __construct(PDO $db) {
            $this -> db = $db;
        }

        public function insert(articles $article) {
            $requete = $this -> db -> prepare ("INSERT INTO sb_signin.articles (titre, contenu, photo) 
                VALUES (:titre, :contenu, :photo);");

            $requete -> bindValue(':titre', $article -> get_titre());
            $requete -> bindValue(':contenu', $article -> get_contenu());
            $requete -> bindValue(':photo', $article -> get_image());

            $requete -> execute();
        }
    }

?>