<?php

//préparation anle utilisateur ho ampidirina anaty bd

    class users {

        private $erreurs = [];
        private $id, $pseudo, $psw, $email, $photo;

        const LNAME_INVALID = 1;
        const PSW_INVALID = 2;
        const EMAIL_INVALID = 3;

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

        public function set_pseudo($pseudo) {
            if (!is_string($pseudo) || empty($pseudo)) {
                $this -> erreurs[] = self::LNAME_INVALID;
            } else {
                $this -> pseudo = $pseudo;
            }
        }

        public function set_psw($psw) {
            if (!empty($psw) && strlen($psw) >= 4) {
                $this -> psw = $psw;
            } else {
                $this -> erreurs[] = self::PSW_INVALID;
            }
        }

        public function set_email($email) {
            if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $this -> email = $email;
            } else {
                $this -> erreurs[] = self::EMAIL_INVALID;
            }
        }

        public function set_photo ($photo) {
            if (!empty($photo)) {
                $this -> photo = $photo;
            }
        }

        public function get_id() {
            return $this -> id;
        }

        public function get_pseudo() {
            return $this -> pseudo;
        }

        public function get_psw() {
            return $this -> psw;
        }

        public function get_email() {
            return $this -> email;
        }

        public function get_photo () {
            return $this -> photo;
        }

        public function get_erreurs() {
            return $this -> erreurs;
        }

        public function is_user_valid() {
            return !(empty($this -> pseudo) || empty($this -> psw) || empty($this -> email));
        }

    }
?>