<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class User extends Controller {

    function __construct() {
        parent::__construct();

//        if (!Session::Get('loggedIn')) {
//            Session::Destroy();
//            header('location: ' . ABS_PATH . '/Login');
//            exit;
//        }
    }

    //Routing
    public function index() {
       
        $this->view->render('Users/userValidation');
    }
    
     public function validation() {
       
        $this->view->render('Users/userValidation');
    }
    
    /**
     * Redirect to the users 
     */
    public function insert(){
        
        $this->view->render('users/addEditForm');
        
    }
}
