<?php 

// préparation anle article ho inserer-na

    class articles {
        private $erreurs = [];
        private $id, $titre, $contenu, $image;

        const TITRE_INVALID = 1;
        const CONTENU_INVALID = 2;

        public function __construct($donnees = []) {
            if (!empty($donnees)) {
                $this -> hydrater($donnees);
            }
        }

        public function hydrater($donnees) {
            foreach ($donnees as $attribut => $value) {
                $method_setters = 'set_' . $attribut;
                $this -> $method_setters($value);
            }
        }

        //Setters
        public function set_id($id) {
            if (!empty($id)) {
                $this -> id = (int) $id;
            }
        }

        public function set_titre($titre) {
            if (!is_string($titre) || empty($titre)) {
                $this -> erreurs[] = self::TITRE_INVALID;
            } else {
                $this -> titre = $titre;
            }
        }

        public function set_contenu($contenu) {
            if (!empty($contenu)) {
                $this -> contenu = $contenu;
            } else {
                $this -> erreurs[] = self::CONTENU_INVALID;
            }
        }

        public function set_image($image) {
            if (!empty($image)) {
                $this -> image = $image;
            }
        }

        public function get_id() {
            return $this -> id;
        }

        public function get_titre() {
            return $this -> titre;
        }

        public function get_contenu() {
            return $this -> contenu;
        }

        public function get_image() {
            return $this -> image;
        }

        public function get_erreurs() {
            return $this -> erreurs;
        }

        public function is_article_valid() {
            return !(empty($this -> titre) || empty($this -> contenu));
        }
    }
?>