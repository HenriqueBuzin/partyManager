<?php

    error_reporting(E_ALL);

    ini_set('display_errors', 'On');

    define('BASE', 'http://localhost/partyManager/');

    include_once "autoload.php";

    global $config;

    $config = array();

    $config['dbname'] = 'party';

    $config['host'] = 'localhost';

    $config['charset'] = 'utf8';

    $config['dbuser'] = 'root';

    $config['pass'] = 'root';

?>