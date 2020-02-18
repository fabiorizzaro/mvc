<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Charge
 *
 * @author QZ54GL
 */
class Charge {

    private $chargeReference;
    private $chargeAmount;
    private $chargeCode;
    private $chargeDueDate;
    private $chargeCheckoutUrl;
    private $chargeLink;
    private $chargeInstallmentLink;
    private $chargePayNumber;
    private $paymentId;
    private $paymentAmount;
    private $paymentDate;
    private $paymentFee;
    private $paymentStatus;
    private $paymentType;
    private $billetBankAccount;
    private $billetOurNumber;
    private $billetBarcodeNumber;
    private $billetPortfolio;
    
    public function getChargeReference() {
        return $this->chargeReference;
    }

    public function getChargeAmount() {
        return $this->chargeAmount;
    }

    public function getChargeCode() {
        return $this->chargeCode;
    }

    public function getChargeDueDate() {
        return $this->chargeDueDate;
    }

    public function getChargeCheckoutUrl() {
        return $this->chargeCheckoutUrl;
    }

    public function getChargeLink() {
        return $this->chargeLink;
    }

    public function getChargeInstallmentLink() {
        return $this->chargeInstallmentLink;
    }

    public function getChargePayNumber() {
        return $this->chargePayNumber;
    }

    public function getPaymentId() {
        return $this->paymentId;
    }

    public function getPaymentAmount() {
        return $this->paymentAmount;
    }

    public function getPaymentDate() {
        return $this->paymentDate;
    }

    public function getPaymentFee() {
        return $this->paymentFee;
    }

    public function getPaymentStatus() {
        return $this->paymentStatus;
    }

    public function getPaymentType() {
        return $this->paymentType;
    }

    public function getBilletBankAccount() {
        return $this->billetBankAccount;
    }

    public function getBilletOurNumber() {
        return $this->billetOurNumber;
    }

    public function getBilletBarcodeNumber() {
        return $this->billetBarcodeNumber;
    }

    public function getBilletPortfolio() {
        return $this->billetPortfolio;
    }

    public function setChargeReference($chargeReference) {
        $this->chargeReference = $chargeReference;
    }

    public function setChargeAmount($chargeAmount) {
        $this->chargeAmount = $chargeAmount;
    }

    public function setChargeCode($chargeCode) {
        $this->chargeCode = $chargeCode;
    }

    public function setChargeDueDate($chargeDueDate) {
        $this->chargeDueDate = $chargeDueDate;
    }

    public function setChargeCheckoutUrl($chargeCheckoutUrl) {
        $this->chargeCheckoutUrl = $chargeCheckoutUrl;
    }

    public function setChargeLink($chargeLink) {
        $this->chargeLink = $chargeLink;
    }

    public function setChargeInstallmentLink($chargeInstallmentLink) {
        $this->chargeInstallmentLink = $chargeInstallmentLink;
    }

    public function setChargePayNumber($chargePayNumber) {
        $this->chargePayNumber = $chargePayNumber;
    }

    public function setPaymentId($paymentId) {
        $this->paymentId = $paymentId;
    }

    public function setPaymentAmount($paymentAmount) {
        $this->paymentAmount = $paymentAmount;
    }

    public function setPaymentDate($paymentDate) {
        $this->paymentDate = $paymentDate;
    }

    public function setPaymentFee($paymentFee) {
        $this->paymentFee = $paymentFee;
    }

    public function setPaymentStatus($paymentStatus) {
        $this->paymentStatus = $paymentStatus;
    }

    public function setPaymentType($paymentType) {
        $this->paymentType = $paymentType;
    }

    public function setBilletBankAccount($billetBankAccount) {
        $this->billetBankAccount = $billetBankAccount;
    }

    public function setBilletOurNumber($billetOurNumber) {
        $this->billetOurNumber = $billetOurNumber;
    }

    public function setBilletBarcodeNumber($billetBarcodeNumber) {
        $this->billetBarcodeNumber = $billetBarcodeNumber;
    }

    public function setBilletPortfolio($billetPortfolio) {
        $this->billetPortfolio = $billetPortfolio;
    }



}
