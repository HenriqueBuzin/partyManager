<?php

    spl_autoload_register(function ($class) {

        if (strpos($class, "Controller") > -1) {

            if (file_exists("controllers/{$class}.php")) {

                include_once "controllers/{$class}.php";

            }else if(!file_exists("controllers/{$class}.php")){

                include_once "admin/view/error/404.php";

                die();

            }

        } else if (strpos($class, "DAO") > -1) {

            if (file_exists("admin/dao/{$class}.php")) {

                include_once "admin/dao/{$class}.php";

            }else if(!file_exists("admin/dao/{$class}.php")){

                include_once "admin/view/error/404.php";

                die();

            }

        }else if (strpos($class, "Model") > -1) {

            if (file_exists("admin/models/{$class}.php")) {

                include_once "admin/models/{$class}.php";

            }else if(!file_exists("admin/models/{$class}.php")){

                include_once "admin/view/error/404.php";

                die();

            }

        }else if (strpos($class, "Core") > -1) {

            if (file_exists("admin/core/{$class}.php")) {

                include_once "admin/core/{$class}.php";

            }else if(!file_exists("admin/core/{$class}.php")){

                include_once "admin/view/error/404.php";

                die();

            }

        }else if (strpos($class, "Util") > -1) {

            if (file_exists("admin/util/{$class}.php")) {

                include_once "admin/util/{$class}.php";

            }else if(!file_exists("admin/util/{$class}.php")){

                include_once "admin/view/error/404.php";

                die();

            }

        }

    });

?>