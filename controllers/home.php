<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class home extends controller {

    function __construct() {
        parent::__construct();
        $this->loadModel("course");
    }

    /*
     *  Routing: 
     */

    public function main() {
        
       
        $this->view->courses = $this->courseModel->getHomeCourses();
        
        $this->view->make('IndexView','Home - Instituto Alliqua');
        
    }

    

}
