<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Dashboard extends Controller {

    function __construct() {
        parent::__construct();

        if (!Session::Get('loggedIn')) {
            Session::Destroy();
            header('location: ' . ABS_PATH . '/Login');
            exit;
        }
    }

    public function index() {
        $this->view->render('DashboardView');

        
    }

}
