<?php
    error_reporting(E_ALL);
    include_once("./inc/simple_html_dom.php");
    include_once("./party/p12.php");
    $p12 = new P12;
    echo "<pre>";
    print_r($p12->getParty());
    echo "</pre>";
    include_once("./party/stage.php");
    $stage = new Stage;
    echo "<pre>";
    print_r($stage->getParty());
    echo "</pre>";
?>