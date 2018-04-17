<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this temate file, choose Tools | Templates
 * and open the template in the editor.
 */

class Database2 {

    public static $instance;

    private function __construct() {
        //
    }

    public static function getInstance() {
        
        if (!isset(self::$instance)) {
            self::$instance = new PDO('mysql:host=localhost;dbname=alliqua', 'root', '',array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            //self::$instance = new PDO('mysql:host=mysql873.umbler.com;dbname=alliqua', 'alliqua', 'kids1234',array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
            self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$instance->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_EMPTY_STRING);
        }

        return self::$instance;
    }

}
