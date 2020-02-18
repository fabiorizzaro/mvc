<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class login extends Controller {

    function __construct() {
        parent::__construct();
    }

    public function main() {
        $this->view->make('Login/loginBox');
    }

    // Exibe a tela para entrar com Usuário e Senha
    public function loginForm($requestedBy = null) {
        Session::Set('requestedBy', "/$requestedBy");
        $this->view->make('Login/loginBox');
    }

    public function login() {

        header('Content-Type: application/json');

        $username = $_POST['username'];
        $password = $_POST['password'];

        if ($username == "" or $password == "") {

            $data = array(
                'success' => 'false',
                'message' => 'Por favor preencha os dados'
            );
            echo json_encode($data);
        } else {

            $data = $this->loginModel->login($username, $password);
            echo json_encode($data);
        }
    }

    public function logout() {
        Session::Destroy();
        header('location: /');
    }

}
