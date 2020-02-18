<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Controller {

    function __construct() {

        $this->view = new View();
        Session::Init();
    }

    public function loadModel($name) {
       
        $path = ABS_PATH . '/models/' . $name . 'Model.php';
        
        if (file_exists($path)) {
            require 'models/' . $name . 'Model.php';
            $modelName = $name . "Model";
            $this->$modelName = new $modelName();
        } 
    
    }

}
