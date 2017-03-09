<?php

    class PartyModel
    {

        private $idPlace;

        private $name;

        private $data;

        private $date;

        private $hour;

        private $image;

        private $ticket;

        public function getIdPlace(){

            return $this->idPlace;

        }

        public function getName(){

            return $this->name;

        }

        public function getData(){

            return $this->data;

        }

        public function getDate(){

            return $this->date;
        }

        public function getHour(){

            return $this->hour;

        }

        public function getImage(){

            return $this->image;

        }

        public function getTicket(){

            return $this->ticket;

        }

        public function setIdPlace($idPlace){

            $this->idPlace = $idPlace;

        }

        public function setName($name){

            $this->name = $name;

        }

        public function setData($data){

            $this->data = $data;

        }

        public function setDate($date){

            $this->date = $date;

        }

        public function setHour($hour){

            $this->hour = $hour;

        }

        public function setImage($image){

            $this->image = $image;

        }

        public function setTicket($ticket){

            $this->ticket = $ticket;

        }

    }

?>