<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class catabase extends PDO {


    public function __construct() {

        parent::__construct('mysql:host=localhost;dbname=alliqua', 'root', '',array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        
    }

}
