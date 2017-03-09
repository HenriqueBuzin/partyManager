<?php

    class PlaceModel{

        private $image;

        private $name;

        private $address;

        public function getImage(){

            return $this->image;

        }

        public function getName(){

            return $this->name;

        }

        public function getAddress(){

            return $this->address;

        }

        public function setImage($image){

            $this->image = $image;

        }

        public function setName($name){

            $this->name = $name;

        }

        public function setAddress($address){

            $this->address = $address;

        }

    }

?>