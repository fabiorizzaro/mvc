<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class paymentMethodsModel extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function searchByKey($key, $value) {

        try {

            $sql = "SELECT * FROM paymentMethods WHERE $key = ?";
            $arrayParam = array($value);
            $payments = $this->CRUD->getSQLGeneric($sql, $arrayParam, FALSE);

            return $payments;
            
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            
        }
    }

}
