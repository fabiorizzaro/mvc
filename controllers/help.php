<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


class Help extends Controller{
   
    function __construct() {
        parent::__construct();
        
                
    }
    
    public function main(){
       
        $this->view->make('Help');
           
    }

    public function other(){
        $va=$_GET['arg'];
        $arg2 = $_GET['arg2'];
        echo '<br/> We are accesing the other() function in controllers/Help';
        echo '<br/> We have the arg: ' . $va . '-' . $arg2;
    }
    
    
}