<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Coupon
 *
 * @author QZ54GL
 */
class coupon {

    private $couponID;
    private $courseId;
    private $userId;
    private $value;
    private $quantity;
    private $dueDate;

    public function getCouponID() {
        return $this->couponID;
    }

    public function getCourseId() {
        return $this->courseId;
    }

    public function getUserId() {
        return $this->userId;
    }

    public function getValue() {
        return $this->value;
    }

    public function getQuantity() {
        return $this->quantity;
    }

    public function getDueDate() {
        return $this->dueDate;
    }

    public function setCouponID($couponID) {
        $this->couponID = $couponID;
    }

    public function setCourseId($courseId) {
        $this->courseId = $courseId;
    }

    public function setUserId($userId) {
        $this->userId = $userId;
    }

    public function setValue($value) {
        $this->value = $value;
    }

    public function setQuantity($quantity) {
        $this->quantity = $quantity;
    }

    public function setDueDate($dueDate) {
        $this->dueDate = $dueDate;
    }


}
