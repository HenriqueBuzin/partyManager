<?php
    include_once("../../lib/SimpleHtmlDomLib.php");
    $files = scandir('party');
    unset($files[0]);
    unset($files[1]);
    foreach ($files as $key => $value){
        include_once("./party/{$value}");
        $value = explode(".", $value);
        $value = $value[0];
        $class = new $value;
        foreach ($class->getParty() as $key => $value){
            $column = "";
            $data = "";
            foreach ($value as $key => $value){
                $column .= "{$key}, ";
                $data .= "{$value}, ";
            }
            $column = substr($column,0, (strlen($column) - 2));
            $data = substr($data,0, (strlen($data) - 2));
            echo "INSERT INTO party ($column) VALUES ($data);";
            echo "<br /><br />";
        }
    }
?>