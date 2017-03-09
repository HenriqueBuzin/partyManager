<?php

    class PlaceController{

        private $placeModel;

        private $placeDAO;

        function __construct(){

            $this->placeModel = new PlaceModel();

            $this->placeDAO = new PlaceDAO();

        }

        public function editarAction(){

        }

        public function listarAction(){

            $places = array();

            $places = $this->placeDAO->listar();

            include_once "views/places/listar.php";

        }

        public function selecionarAction($id){

        }

        public function excluirAction(){

        }

        public function cadastrarAction(){

        }


    }

?>