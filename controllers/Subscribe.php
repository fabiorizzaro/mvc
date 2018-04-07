<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Subscribe extends Controller {

    function __construct() {

        parent::__construct();

        //Aditional Models
        $this->loadModel("User");
        $this->loadModel("Login");
        $this->loadModel("Course");
    }
    
    /**
     * 
     *  Check if the user is logged
     * 
     */
    public function index() {

        Session::Set('courseId', $_GET['courseId']);

        if (!Session::Get('loggedIn')) {
            header('location: /mvc/User/validation');
            exit;
        } else {
            
            $this->view->courseData = $this->CourseModel->searchByKey("courseId", $_GET['courseId']);
            $this->view->render('Courses/Enroll');
        }
    }

    public function newUser() {
        $this->view->render('users/addEditForm');
    }

    /**
     * 
     * Public function insert
     * 
     */
    public function insert() {

        if (!$this->UserModel->insert()) {
            $this->view->render('Courses/Enroll');
        }
    }

    public function checkLogin() {

        $this->LoginModel->login();
        $this->view->render('Courses/Enroll');
    }

    public function enroll() {
        $this->view->render('users/addEditForm');
    }

}
