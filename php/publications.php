<?php
// publication ana articles

    class publications {
        public function get_liste_articles() {
            $requete = $this -> db -> query('SELECT * FROM sb_signin.articles');
            $requete -> setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'articles');

            $list_articles = $requete -> fetchAll();

            $requete -> closeCursor();

            return $list_articles;
        }

        public function get_article($titre) {
            $requete = $this -> db -> prepare('SELECT * FROM sb_signin.articles WHERE titre = :titre');
            $requete -> bindValue(':titre', (int) $titre, PDO::PARAM_INT);

            $requete -> execute();
            $requete -> setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'articles');

            $article_selected = $requete -> fetch();
            return $article_selected;
        }

    }

?>