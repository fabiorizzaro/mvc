<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class couponModel extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function getCoupon($key, $value) {

        $sql = "SELECT * FROM coupons WHERE $key = ?";
        $arrayParam = array($value);
        $coupon = $this->CRUD->getSQLGeneric($sql, $arrayParam, FALSE);
        return $coupon;
    }

}
