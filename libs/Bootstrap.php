<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Bootstrap {

    function __construct() {

//        $url is defined into .htaccess 

        $url = isset($_GET['url']) ? rtrim($_GET['url'], '/') : 'home';
        $url = explode('/', $url);
        
        if (isset($url[0])) {
            $controller = $url[0];
        }
        if (isset($url[1])) {
            $function = $url[1];
        }

        $parameters = array();

        foreach ($url as $key => $value) {
            if ($key > 1) {

                $parameters[$key] = $value;
            }
        }

        $file = 'controllers/' . $controller . '.php';

        if (file_exists($file)) {

            require $file;
            $this->controller = new $controller;
            $this->controller->loadModel($controller);
        } else {

            //require 'controllers/404.php';
            //$controller = new fourZeroFour();
            echo "bootstrap error";
            echo $file;
            return FALSE;
        }

//        check if that are parameters to be used
        if (!empty($parameters)) {
//         
            $numOfParameters = sizeof($parameters);

            switch ($numOfParameters) {
                case 1:
                    $this->controller->{$function}($parameters[2]);
                    break;
                case 2:
                    $this->controller->{$function}($parameters[2], $parameters[3]);
                    break;
                case 3:
                    $this->controller->{$function}($parameters[2], $parameters[3], $parameters[4]);
                    break;
                case 4:
                    $this->controller->{$function}($parameters[2], $parameters[3], $parameters[4], $parameters[5]);
                    break;
                case 5:
                    $this->controller->{$function}($parameters[2], $parameters[3], $parameters[4], $parameters[5], $parameters[6]);
                    break;
                default:
                    echo 'The maximum of parameters allowed are 5';
                    break;
            }
        } else {

            if (isset($function)) {
                $this->controller->{$function}();
            } else {
                $this->controller->main();
            }
        }
    }

}
