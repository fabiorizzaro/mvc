<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class user extends controller {

    function __construct() {
        parent::__construct();

//        if (!Session::Get('loggedIn')) {
//            Session::Destroy();
//            header('location: ' . ABS_PATH . '/Login');
//            exit;
//        }

        $this->loadModel("login");
        $this->loadModel("course");
    }

    //Routing
    public function userForm() {

        $this->view->make('Users/addEditForm');
    }

    public function validation() {

        $this->view->make('Users/userValidation');
    }

    /**
     * Redirect to the users 
     */
    public function insert() {

        $this->view->make('users/addEditForm');
    }

    /**
     * Função para adicionar um novo usuário no DB
     * 
     */
    public function create() {

//        No Controller fica o tratamento dos dados que serão enviados para o Model
//        e o controle do fluxo de paginas

        $userData = array(
            'fullName' => filter_input(INPUT_POST, 'fullName'),
            'rg' => filter_input(INPUT_POST, 'rg'),
            'cpf' => filter_input(INPUT_POST, 'cpf'),
            'birthday' => filter_input(INPUT_POST, 'birthday'),
            'profession' => filter_input(INPUT_POST, 'profession'),
            'degree' => filter_input(INPUT_POST, 'degree'),
            'mobilePhone' => filter_input(INPUT_POST, 'mobilePhone'),
            'homePhone' => filter_input(INPUT_POST, 'homePhone'),
            'businessPhone' => filter_input(INPUT_POST, 'businessPhone'),
            'email' => filter_input(INPUT_POST, 'email'),
            'address' => filter_input(INPUT_POST, 'address'),
            'number' => filter_input(INPUT_POST, 'number'),
            'complement' => filter_input(INPUT_POST, 'complement'),
            'neighborhood' => filter_input(INPUT_POST, 'neighborhood'),
            'city' => filter_input(INPUT_POST, 'city'),
            'state' => filter_input(INPUT_POST, 'state'),
            'cep' => filter_input(INPUT_POST, 'cep'),
            'username' => filter_input(INPUT_POST, 'username'),
            'password' =>  MD5(filter_input(INPUT_POST, 'password')),
            'userType' => filter_input(INPUT_POST, 'userType'),
            'accessLevel' => filter_input(INPUT_POST, 'accessLevel'),
            'active' => filter_input(INPUT_POST, 'active')            
        );

        $userData = $this->userModel->insert($userData);
        
        $username = filter_input(INPUT_POST, 'username');
        $password = filter_input(INPUT_POST, 'password');
        $loginData = $this->loginModel->login($username,$password);
        
        //$this->view->redirect('/subscribe/main');
        $this->view->redirect($loginData['href']);
    }

}
