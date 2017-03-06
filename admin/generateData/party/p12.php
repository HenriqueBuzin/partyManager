<?php
    class P12
    {
        private $party;
        private $url;
        private $context;
        private $response;
        private $html;
        function __construct(){
            $this->party = array();
            $this->url = "http://www.parador12.com.br/agenda.html";
            $this->context = stream_context_create(array("http" => array("header" => "User-Agent: Mozilla compatible")));
            $this->response = file_get_contents($this->url, false, $this->context);
            $this->html = str_get_html($this->response);
        }
        private function getImage()
        {
            foreach($this->html->find('.boxListaAgenda') as $element) {
                foreach ($element->find('figure a img') as $key => $pic) {
                    $this->party[$key]["image"] = "http://www.parador12.com.br" . $pic->src;
                }
            }
        }
        private function getDate()
        {
            foreach($this->html->find('.boxListaAgenda') as $element) {
                foreach ($element->find('figure a') as $key => $pic) {
                    $x = $pic->href;
                    $x = substr($x, 8, 10);
                    $x = explode("-", $x);
                    $x = $x[2] . "-" . $x[1] . "-" . $x[0];
                    $this->party[$key]["date"] = $x;
                }
            }
        }
        private function getTicket()
        {
            foreach($this->html->find('.boxListaAgenda') as $element) {
                foreach ($element->find('.btn_ingressos') as $key => $pic) {
                    $x = "http://www.parador12.com.br" . $pic->href;
                    $this->party[$key]["ticket"] = $x;
                }
            }
        }
        private function getData()
        {
            foreach($this->html->find('.boxListaAgenda') as $element) {
                foreach ($element->find('.size100') as $key => $pic) {
                    $one = explode('<p>', $pic);
                    $k2 = strip_tags($one[2]);
                    if(!empty($k2)) $this->party[$key]["data"] = $k2;
                }
            }
        }
        private function getName()
        {
            foreach($this->html->find('.boxListaAgenda') as $element) {
                foreach ($element->find('.size100') as $key => $pic) {
                    $one = explode('<p>', $pic);
                    $k1 = strip_tags($one[1]);
                    $this->party[$key]["name"] = $k1;
                }
            }
        }
        private function getHour()
        {
            foreach($this->html->find('.boxListaAgenda') as $element) {
                foreach ($element->find('.btn_ingressos') as $key => $pic) {
                    $url = "http://www.parador12.com.br" . $pic->href;
                    $response = file_get_contents($url, false, $this->context);
                    $html = str_get_html($response);
                    foreach($html->find(".data span strong") as $pic){
                        $x = substr($pic, 27, 2);
                        $this->party[$key]["hour"] = $x;
                    }
                }
            }
        }
        public function getParty(){
            $this->getImage();
            $this->getName();
            $this->getData();
            $this->getDate();
            $this->getHour();
            $this->getTicket();
            return $this->party;
        }
    }
?>