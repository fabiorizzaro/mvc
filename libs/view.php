<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class View {

    function __construct() {
        
    }

    public function make($viewName, $pageTitle = "Instituto Alliqua") {

        $this->pageTitle = $pageTitle;
        require 'views/' . $viewName . ".php";
        
    }

    public function redirect($destination) {

        header("location: $destination");
    }

}
