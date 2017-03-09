<?php

    interface CRUD
    {
        public function editar($obj);
        public function listar();
        public function selecionar($url);
        public function excluir($url);
        public function cadastrar($obj);
    }
?>