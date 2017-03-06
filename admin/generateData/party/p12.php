<?php
    error_reporting(E_ALL);
    include_once('../inc/simple_html_dom.php');
    $url = 'http://www.parador12.com.br/agenda.html';
    $context = stream_context_create(array('http' => array('header' => 'User-Agent: Mozilla compatible')));
    $response = file_get_contents($url, false, $context);
    $html = str_get_html($response);
    $party = array();
    foreach($html->find('.boxListaAgenda') as $element){
        $img = $element->find('figure a img');
        foreach ($img as $key => $pic) {
            $party[$key]["img"] = "http://www.parador12.com.br" . $pic->src;
        }
        $img = $element->find('figure a');
        foreach ($img as $key => $pic){
            $x = $pic->href;
            $x = substr($x, 8, 10);
            $party[$key]["date"] = $x;
        }
        $img = $element->find('.size100');
        foreach ($img as $key => $pic){
            $one = explode("<p>", $pic);
            $k1 = strip_tags($one[1]);
            $k2 = strip_tags($one[2]);
            $party[$key]["name"] = $k1;
            if(!empty($k2)) $party[$key]["data"] = $k2;
        }
        $img = $element->find('.btn_ingressos');
        foreach ($img as $key => $pic){
            $x = "http://www.parador12.com.br" . $pic->href;
            $party[$key]["ticket"] = $x;
        }
    }
    foreach ($party as $key => $element){
        $url = $element["ticket"];
        $response = file_get_contents($url, false, $context);
        $html = str_get_html($response);
        foreach ($html->find(".btn_ingressos") as $pic) {
            $party[$key]["ticket"] = $pic->href;
        }
        foreach($html->find(".data span strong") as $pic){
            $x = substr($pic, 27, 2);
            $party[$key]["date"] .= " " . $x . ":00:00";
        }
    }
    echo "<pre>";
    print_r($party);
    echo "</pre>";
?>