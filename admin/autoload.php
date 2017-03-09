<?php

    spl_autoload_register(function ($class) {

        if (strpos($class, "Controller") > -1) {

            if (file_exists("controllers/{$class}.php")) {

                include_once "controllers/{$class}.php";

            }else if(!file_exists("controllers/{$class}.php")){

                include_once "./view/error/404.php";

                die();

            }

        } else if (strpos($class, "DAO") > -1) {

            if (file_exists("./dao/{$class}.php")) {

                include_once "./dao/{$class}.php";

            }else if(!file_exists("./dao/{$class}.php")){

                include_once "./view/error/404.php";

                die();

            }

        }else if (strpos($class, "Model") > -1) {

            if (file_exists("./models/{$class}.php")) {

                include_once "./models/{$class}.php";

            }else if(!file_exists("./models/{$class}.php")){

                include_once "./view/error/404.php";

                die();

            }

        }else if (strpos($class, "Core") > -1) {

            if (file_exists("./core/{$class}.php")) {

                include_once "./core/{$class}.php";

            }else if(!file_exists("./core/{$class}.php")){

                include_once "./view/error/404.php";

                die();

            }

        }else if (strpos($class, "Util") > -1) {

            if (file_exists("./util/{$class}.php")) {

                include_once "./util/{$class}.php";

            }else if(!file_exists("./util/{$class}.php")){

                include_once "./view/error/404.php";

                die();

            }

        }

    });

?>