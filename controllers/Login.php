<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Login extends Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->view->render('LoginView');
  
    } 

    public function doLogin() {
        
        $username = $_POST['username'];
        $password = $_POST['password'];
        
        $this->LoginModel->login2($username, $password);
        header('location: /mvc/Index');
    }
    
    public function logout(){
        Session::Destroy();
        header('location: /mvc/Index');
        
    }

  

}
