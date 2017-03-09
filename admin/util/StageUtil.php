<?php

    class StageUtil{

        private $party;

        private $url;

        private $context;

        private $response;

        private $html;

        function __construct(){

            include_once("../lib/php/SimpleHtmlDomLib.php");

            $this->party = array();

            $this->url = "http://stagemusicpark.com.br";

            $this->context = stream_context_create(array("http" => array("header" => "User-Agent: Mozilla compatible")));

            $this->response = file_get_contents($this->url, false, $this->context);

            $this->html = str_get_html($this->response);

        }

        public function getImage(){

            foreach($this->html->find(".cal-wrapper") as $key => $element){

                foreach($element->find('.cal-mais-informacoes a') as $pic){

                    $url = $pic->href;

                    $response = file_get_contents($url, false, $this->context);

                    $html = str_get_html($response);

                    foreach($html->find(".interna") as $element){

                        foreach ($element->find('.desc_basica_evento img[src*=evento]') as $pic){

                            $this->party[$key]["image"] = $pic->src;

                        }

                    }

                }

            }

        }

        public function getDate(){

            foreach($this->html->find(".cal-wrapper") as $key => $element){

                foreach($element->find('.cal-mais-informacoes a') as $pic){

                    $url = $pic->href;

                    $response = file_get_contents($url, false, $this->context);

                    $html = str_get_html($response);

                    foreach($html->find(".interna") as $element){

                        foreach ($element->find('.data_interna_evento') as $pic){

                            $x = $pic->plaintext;

                            $x = explode(",", $x);

                            $x = $x[1];

                            $month = date_parse($x);

                            $month = $month["month"];

                            if($month < 10) $month = "0" . $month;

                            $day = substr($x, 1, 2);

                            if($day < 10) $day = "0" . $day;

                            $year = substr( $x, -4, 4);

                            $date = $year . "-" . $month . "-" . $day;

                            $this->party[$key]["date"] = $date;

                        }

                    }

                }

            }


        }

        public function getName(){

            foreach($this->html->find(".cal-wrapper") as $key => $element){

                foreach($element->find('.cal-envento') as $pic){

                    $this->party[$key]["name"] = strtolower(strip_tags($pic->plaintext));

                }

            }

        }

        public function getTicket(){

            foreach($this->html->find(".cal-wrapper") as $key => $element){

                foreach($element->find('.cal-mais-informacoes a') as $pic){

                    $this->party[$key]["ticket"] = $pic->href;

                }

            }

        }

        public function getHour(){

            foreach($this->html->find(".cal-wrapper") as $key => $element){

                foreach($element->find('.cal-mais-informacoes a') as $pic){

                    $url = $pic->href;

                    $response = file_get_contents($url, false, $this->context);

                    $html = str_get_html($response);

                    foreach($html->find(".interna") as $element){

                        foreach ($element->find('.desc_basica_evento span:nth-last-child(2)') as $pic){

                            $x = $pic->plaintext;

                            $x = explode("h", $x);

                            $x = $x[0];

                            $x = explode("Abertura: ", $x);

                            $x = $x[1];

                            $x = explode(":", $x);

                            $x = $x[0];

                            $this->party[$key]["hour"] = $x;

                        }

                    }
                }

            }
        }

        public function getIdPlace(){

            foreach($this->party as $key => $value){

                $this->party[$key]["idPlace"] = 2;

            }

        }

        public function getParty(){

            $this->getIdPlace();

            $this->getImage();

            $this->getName();

            $this->getDate();

            $this->getHour();

            $this->getTicket();

            $this->getIdPlace();

            return $this->party;

        }

    }

?>