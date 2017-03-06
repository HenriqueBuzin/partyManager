<?php
    error_reporting(E_ALL);
    include_once('../inc/simple_html_dom.php');
    $url = 'http://stagemusicpark.com.br';
    $context = stream_context_create(array('http' => array('header' => 'User-Agent: Mozilla compatible')));
    $response = file_get_contents($url, false, $context);
    $html = str_get_html($response);
    foreach($html->find(".cal-wrapper") as $key => $element){
        foreach($element->find('.cal-mais-informacoes a') as $pic){
            $party[$key]["ticket"] = $pic->href;
        }
        foreach($element->find('.cal-envento') as $pic){
            $party[$key]["name"] = strip_tags($pic->plaintext);
        }
    }
    foreach ($party as $key => $element) {
        $url = $element["ticket"];
        $response = file_get_contents($url, false, $context);
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
                $party[$key]["date"] = $date;
            }
            foreach ($element->find('.desc_basica_evento img') as $pic){
                $party[$key]["img"] = $pic->src;
            }
            foreach ($element->find('.desc_basica_evento span:nth-last-child(2)') as $pic){
                $x = $pic->plaintext;
                $x = explode("h", $x);
                $x = $x[0];
                $x = explode("Abertura: ", $x);
                $x = $x[1];
                $x = explode(":", $x);
                $x = $x[0];
                $party[$key]["date"] .= " " . $x . ":00:00";
            }
        }
    }
echo "<pre>";
print_r($party);
echo "</pre>";
/*
/*foreach($element->find('.cal-data') as $pic){


//echo date('d/m/Y', strtotime($date));


$x = strip_tags($pic->plaintext);
$date = date_parse($x);
$date["month"];
$day = substr($x, 0, 2);




//if(strtotime($x)) echo 1; else echo 2;

echo $day . "<br />";
//$party[$key]["date"] = ;





}*/
