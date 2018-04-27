<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Index
 *
 * @author qz54gl
 */
class Index extends Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        
        
        $this->loadModel("Course");
        //chamar model para pegar os dados dos cursos
        
       
        $this->view->courses = $this->CourseModel->getHomeCourses(); 
        
        $this->view->make('IndexView');
    }

}
