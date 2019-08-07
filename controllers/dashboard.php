<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class dashboard extends controller {

    function __construct() {
        parent::__construct();

        if (!Session::Get('loggedIn')) {
            Session::Destroy();
            header('location: /login');
            exit;
        }
    }

    public function main() {
        $this->view->make('Users/dashboard');
        
    }

}
