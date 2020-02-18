<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class loginModel extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function login($username, $password) {

        $data = array();

        try {

            $sql = "SELECT userId, username, password, accessLevel FROM users WHERE username = ? AND password = ?";
            $arrayParam = array($username, md5($password));
            $user = $this->CRUD->getSQLGeneric($sql, $arrayParam, FALSE);

            if ($user) {

                Session::Set('loggedIn', true);
                Session::Set('userId', $user->userId);
                Session::Set('username', $user->username);
                Session::Set('accessLevel', $user->accessLevel);

                $data = array(
                    'success' => 'true',
                    'href' => Session::Get('requestedBy') !== NULL ? Session::Get('requestedBy') : '/'
                );
            } else {
                $data = array(
                    'success' => 'false',
                    'message' => 'Usuário ou senha inválido'
                );
            }

            return $data;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            die;
        }
    }

}
