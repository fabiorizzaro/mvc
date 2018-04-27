<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Course
 *
 * @author QZ54GL
 */
class Course {

    private $courseId;
    private $status;
    private $title;
    private $shortDescription;
    private $smallPicture;
    private $longDescription;
    private $largePicture;
    private $subscribeStartDate;
    private $subscribeEndDate;
    private $homeDisplay;
    private $displayPosition;
    private $dateTimeDesc;
    private $loadTimeDesc;
    private $materialDesc;
    private $targetDesc;
    private $addressDesc;
    private $paymentMethodDesc;
    private $teachersDesc;
    private $price;
    private $acceptBoleto;
    private $installmentsBoleto;
    private $acceptCreditCard;
    private $installmentsCreditCard;
    private $acceptMoney;
    private $acceptTransfer;
    private $acceptDeposit;
   
    public function getCourseId() {
        return $this->courseId;
    }

    public function getStatus() {
        return $this->status;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getShortDescription() {
        return $this->shortDescription;
    }

    public function getSmallPicture() {
        return $this->smallPicture;
    }

    public function getLongDescription() {
        return $this->longDescription;
    }

    public function getLargePicture() {
        return $this->largePicture;
    }

    public function getSubscribeStartDate() {
        return $this->subscribeStartDate;
    }

    public function getSubscribeEndDate() {
        return $this->subscribeEndDate;
    }

    public function getHomeDisplay() {
        return $this->homeDisplay;
    }

    public function getDisplayPosition() {
        return $this->displayPosition;
    }

    public function getDateTimeDesc() {
        return $this->dateTimeDesc;
    }

    public function getLoadTimeDesc() {
        return $this->loadTimeDesc;
    }

    public function getMaterialDesc() {
        return $this->materialDesc;
    }

    public function getTargetDesc() {
        return $this->targetDesc;
    }

    public function getAddressDesc() {
        return $this->addressDesc;
    }

    public function getPaymentMethodDesc() {
        return $this->paymentMethodDesc;
    }

    public function getTeachersDesc() {
        return $this->teachersDesc;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getAcceptBoleto() {
        return $this->acceptBoleto;
    }

    public function getInstallmentsBoleto() {
        return $this->installmentsBoleto;
    }

    public function getAcceptCreditCard() {
        return $this->acceptCreditCard;
    }

    public function getInstallmentsCreditCard() {
        return $this->installmentsCreditCard;
    }

    public function getAcceptMoney() {
        return $this->acceptMoney;
    }

    public function getAcceptTransfer() {
        return $this->acceptTransfer;
    }

    public function getAcceptDeposit() {
        return $this->acceptDeposit;
    }

    public function setCourseId($courseId) {
        $this->courseId = $courseId;
    }

    public function setStatus($status) {
        $this->status = $status;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function setShortDescription($shortDescription) {
        $this->shortDescription = $shortDescription;
    }

    public function setSmallPicture($smallPicture) {
        $this->smallPicture = $smallPicture;
    }

    public function setLongDescription($longDescription) {
        $this->longDescription = $longDescription;
    }

    public function setLargePicture($largePicture) {
        $this->largePicture = $largePicture;
    }

    public function setSubscribeStartDate($subscribeStartDate) {
        $this->subscribeStartDate = $subscribeStartDate;
    }

    public function setSubscribeEndDate($subscribeEndDate) {
        $this->subscribeEndDate = $subscribeEndDate;
    }

    public function setHomeDisplay($homeDisplay) {
        $this->homeDisplay = $homeDisplay;
    }

    public function setDisplayPosition($displayPosition) {
        $this->displayPosition = $displayPosition;
    }

    public function setDateTimeDesc($dateTimeDesc) {
        $this->dateTimeDesc = $dateTimeDesc;
    }

    public function setLoadTimeDesc($loadTimeDesc) {
        $this->loadTimeDesc = $loadTimeDesc;
    }

    public function setMaterialDesc($materialDesc) {
        $this->materialDesc = $materialDesc;
    }

    public function setTargetDesc($targetDesc) {
        $this->targetDesc = $targetDesc;
    }

    public function setAddressDesc($addressDesc) {
        $this->addressDesc = $addressDesc;
    }

    public function setPaymentMethodDesc($paymentMethodDesc) {
        $this->paymentMethodDesc = $paymentMethodDesc;
    }

    public function setTeachersDesc($teachersDesc) {
        $this->teachersDesc = $teachersDesc;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function setAcceptBoleto($acceptBoleto) {
        $this->acceptBoleto = $acceptBoleto;
    }

    public function setInstallmentsBoleto($installmentsBoleto) {
        $this->installmentsBoleto = $installmentsBoleto;
    }

    public function setAcceptCreditCard($acceptCreditCard) {
        $this->acceptCreditCard = $acceptCreditCard;
    }

    public function setInstallmentsCreditCard($installmentsCreditCard) {
        $this->installmentsCreditCard = $installmentsCreditCard;
    }

    public function setAcceptMoney($acceptMoney) {
        $this->acceptMoney = $acceptMoney;
    }

    public function setAcceptTransfer($acceptTransfer) {
        $this->acceptTransfer = $acceptTransfer;
    }

    public function setAcceptDeposit($acceptDeposit) {
        $this->acceptDeposit = $acceptDeposit;
    }



}
