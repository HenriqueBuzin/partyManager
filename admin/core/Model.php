<?php

    class Model
    {
        protected $db;

        private $link;

        function __construct() {

            $this->conecta();

        }

        public function conecta() {

            try {

                global $config; // ver sem essa linha

                $this->link = "mysql:dbname={$config['dbname']};host={$config['host']};charset={$config['charset']}";

                $this->db = new PDO($this->link, $config["dbuser"], $config["pass"]);

                $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                return $this->db;

            } catch (PDOException $e) {

                echo "Erro: {$e->getMessage()}";

                die();

            }

        }

    }

?>