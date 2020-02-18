<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class mainController extends controller {

    function __construct() {
        parent::__construct();
        $this->loadModel("Course");
    }

    /*
     *  Routing: 
     */

    public function main() {

        
        $this->view->courses = $this->CourseModel->getHomeCourses();
        $this->view->make('IndexView','fdp');
        
    }

    public function render($path = null) {

        $viewPatch = explode('!', base64_decode($path));

        if (isset($viewPatch[1])) {
            $this->view::renderView($viewPatch[0] . '/' . $viewPatch[1]);
        } else {
            $this->view::renderView($viewPatch[0]);
        }
    }

    public function validateLogin() {

        $this->loadModel("Login");

        $username = $_POST['username'];
        $password = $_POST['password'];

        header('Content-Type: application/json');
        echo json_encode($this->LoginModel->login2($username, $password));
    }

    public function courseDetails($courseId = null) {

        $key = 'courseId';
        $value = $courseId;
        $this->view->data = $this->CourseModel->searchByKey($key, $value);
        $this->view->make('Courses/Details_v2');
        echo "v2";
        die();
        
    }

}
