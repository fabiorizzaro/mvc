<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Course extends Controller {

    function __construct() {
        parent::__construct();

        if (!Session::Get('loggedIn')) {
            Session::Destroy();
            header('location: ' . ABS_PATH . '/Login');
            exit;
        }
    }

    //Routing
    public function index() {
        $this->searchAll();
        $this->view->render('Courses/Index');
    }

    public function details() {
        $this->view->render('Courses/Details');
    }

    public function view() {
        $this->view->render('Courses/AddEditForm');
    }

    //Database functions

    public function insert() {
        $this->model->insert();
        header('location: ' . ABS_PATH . '/course');
    }

    public function delete() {
        $this->model->delete();
        header('location: ' . ABS_PATH . '/course');
    }

    public function update() {
        $this->model->update();
       header('location: ' . ABS_PATH . '/course');
       
    }

    public function searchAll() {
        $this->view->data = $this->model->searchAll();
    }
    
    // Mudar para show();
    
    public function edit() {
        $key = 'courseId';
        $value = $_GET['courseId'];
                
        $this->view->data = $this->model->searchByKey($key,$value);
        $this->view->render('Courses/AddEditForm');
    }

    public function viewDetails() {
        
        $key = 'idCurso';
        $value = $_GET['courseId'];
        $this->view->data = $this->model->searchByKey($key,$value);
        $this->view->render('Courses/Details');
    }
    
}
