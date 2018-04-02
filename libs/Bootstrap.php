<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Bootstrap {

    function __construct() {

//        $url is defined into .htaccess 

        $url = isset($_GET['url']) ? rtrim($_GET['url'], '/') : 'Index';
        $url = explode('/', $url);

//        There are some thing going wrong with the Index name.....
//        I don´t know why
//        echo 'Variable $url has these values: ';
//        print_r($url);

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

            require 'controllers/404.php';
            $controller = new fourZeroFour();
            return FALSE;
            
        }
       
//        check if that are parameters to be used
//        if (!empty($parameters)) {
//            call_user_func_array(array($controller, $function), $parameters);
//        } 

//        check if need to call a function
        if(isset($function)) {
            $this->controller->{$function}();
        }else{
            $this->controller->index();
        }
        
    }

}
