<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class LoginModel extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function login() {
        try {
            
            $sth = $this->db->prepare("select username, password FROM usuarios WHERE username = :nome and password = :senha");
            
            $sth->bindValue(":nome", $_POST['user']);
            $sth->bindValue(":senha", md5($_POST['password']));
            
            $sth->execute();
            
            $result = $sth->fetch(PDO::FETCH_ASSOC);
            $count = $sth->rowCount();
            
            if($count > 0){
                Session::Set('loggedIn', true);
                Session::Set('username', $result['username']);
//                header('location: '.ABS_PATH.'/Dashboard');
            }
            
                        
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    
    

}
