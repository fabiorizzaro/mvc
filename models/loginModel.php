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

    public function login() {

        try {

            $stmt = $this->db->prepare("SELECT userId, username, password FROM users WHERE username = :username and password = :password");

            $stmt->bindValue(":username", $_POST['username']);
            $stmt->bindValue(":password", md5($_POST['password']));

            $stmt->execute();

            $userData = $stmt->fetch(PDO::FETCH_ASSOC);
            $rowCount = $stmt->rowCount();

            if ($rowCount > 0) {

                Session::Set('loggedIn', true);
                Session::Set('userId', $userData['userId']);
                Session::Set('username', $userData['username']);
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            die;
        }
    }

    public function login2($username, $password) {

        $data = array();

        try {

            $stmt = $this->db->prepare("SELECT userId, username, password FROM users WHERE username = :username and password = :password");

            $stmt->bindValue(":username", $username);
            $stmt->bindValue(":password", md5($password));

            $stmt->execute();

            $userData = $stmt->fetch(PDO::FETCH_ASSOC);
            $rowCount = $stmt->rowCount();
            $status = "";

            if ($rowCount > 0) {

                Session::Set('loggedIn', true);
                Session::Set('userId', $userData['userId']);
                Session::Set('username', $userData['username']);

                $data = array(
                    'success' => 'true',
                    'href' => Session::Get('requestedBy') !== NULL ? Session::Get('requestedBy') :'/'
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
