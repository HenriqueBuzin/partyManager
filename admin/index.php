<?php
    include_once("./config.php");
    echo "Área Administrativa";
    $class = new StageUtil();
    echo "<pre>";
    print_r($class->getParty());
    echo "</pre>";

?>