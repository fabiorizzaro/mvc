<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Controller {

    function __construct() {
//        echo 'it´s comming from main controller!';
        $this->view = new View();
        Session::Init();
    }

    public function loadModel($name) {
        
        $path = ABS_PATH . '/mvc/models/' . $name . 'Model.php';
        if (file_exists($path)) {
            require 'models/' . $name . 'Model.php';
            $modelName = $name . "Model";
            $this->$modelName = new $modelName();
        } 

     
    }

}
