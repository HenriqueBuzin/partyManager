<?php

    class PartyController{

        private $partyModel;

        private $partyDAO;

        function __construct(){

            //$this->partyModel = new PartyModel();

            //$this->partyDAO = new PartyModel();

        }

        public function editarAction(){

        }

        public function listarAction(){

            $partys = array();

            $partys = $this->partyDAO->listar();

            include_once "views/partys/listar.php";

        }

        public function selecionarAction($id){

        }

        public function excluirAction(){

        }

        public function cadastrarAction(){

            $files = scandir('../util');

            $files = array_diff($files, array('.', '..', '.DS_Store'));

            $party = array();

            $i = 0;

            foreach($files as $value){

                include("../util/{$value}");

                $value = explode(".", $value);

                $value = $value[0];

                $class = new $value;

                foreach($class->getParty() as $value){

                    foreach ($value as $key => $value){

                        $party[$i][$key] = $value;

                    }

                    $i++;

                }

            }

            return $party;

        }

    }

    $class = new PartyController;

    $class = $class->cadastrarAction();

    echo "<pre>";

    print_r($class);

    echo "</pre>";

?>