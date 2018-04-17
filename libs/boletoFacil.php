<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of boletoFacil
 *
 * @author QZ54GL
 */
class boletoFacil {

    const productionToken = "42189FC623CA189D33E2F07DEBC8CC5AC10FCD1801F4EA6F3F0A132F94C350C1";
    const sandBoxToken = "8B02AFD591FF7964612F78967FAABF5B6DF05ACACAAFC23A";
    const urlProduction = "https://www.boletobancario.com/boletofacil/integration/api/v1/issue-charge?";
    const urlSandBox = "https://sandbox.boletobancario.com/boletofacil/integration/api/v1/issue-charge?";

    private $description;
    private $reference;
    private $amount;
    private $dueDate;
    private $installments;
    private $maxOverdueDays;
    private $fine;
    private $interest;
    private $discountAmount;
    private $discountDays;
    private $payerName;
    private $payerCpfCnpj;
    private $payerEmail;
    private $payerSecondaryEmail;
    private $payerPhone;
    private $payerBirthDate;
    private $billingAddressStreet;
    private $billingAddressNumber;
    private $billingAddressComplement;
    private $billingAddressCity;
    private $billingAddressState;
    private $billingAddressPostcode;
    private $notifyPayer;
    private $notificationUrl;
    private $responseType;
    private $feeSchemaToken;
    private $splitRecipient;
    private $paymentTypes;
    private $creditCardNumber;
    private $creditCardHolderName;
    private $creditCardSecurityCode;
    private $creditCardExpirationMonth;
    private $creditCardExpirationYear;
    private $paymentAdvance;

//******************************************************************************
//********************************FUNÇÕES***************************************   
//******************************************************************************   

    public function doPayment() {

        //CARREGA OS PARAMETROS A SEREM ENVIADOS
        $params = array(
            'token' => $this::sandBoxToken,
            'description' => $this->description,
            'reference' => $this->reference,
            'amount' => $this->amount,
            'dueDate' => $this->dueDate,
            'installments' => $this->installments,
            'maxOverdueDays' => $this->maxOverdueDays,
            'fine' => $this->fine,
            'interest' => $this->interest,
            'discountAmount' => $this->discountAmount,
            'discountDays' => $this->discountDays,
            'payerName' => $this->payerName,
            'payerCpfCnpj' => $this->payerCpfCnpj,
            'payerEmail' => $this->payerEmail,
            'payerSecondaryEmail' => $this->payerSecondaryEmail,
            'payerPhone' => $this->payerPhone,
            'payerBirthDate' => $this->payerBirthDate,
            'billingAddressStreet' => $this->billingAddressStreet,
            'billingAddressNumber' => $this->billingAddressNumber,
            'billingAddressComplement' => $this->billingAddressComplement,
            'billingAddressCity' => $this->billingAddressCity,
            'billingAddressState' => $this->billingAddressState,
            'billingAddressPostcode' => $this->billingAddressPostcode,
            'notifyPayer' => $this->notifyPayer,
            'notificationUrl' => $this->notificationUrl,
            'responseType' => $this->responseType,
            'feeSchemaToken' => $this->feeSchemaToken,
            'splitRecipient' => $this->splitRecipient,
            'paymentTypes' => $this->paymentTypes,
            'creditCardNumber' => $this->creditCardNumber,
            'creditCardHolderName' => $this->creditCardHolderName,
            'creditCardSecurityCode' => $this->creditCardSecurityCode,
            'creditCardExpirationMonth' => $this->creditCardExpirationMonth,
            'creditCardExpirationYear' => $this->creditCardExpirationYear,
            'paymentAdvance' => $this->paymentAdvance
        );

               
        $ch = curl_init();
        // Disable SSL verification
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        // Will return the response, if false it print the response
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
 
        // Set the url
        curl_setopt($ch, CURLOPT_URL, $this::urlSandBox);

        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        // Execute
        $result = curl_exec($ch);
        // Closing
        curl_close($ch);
               
        return $result;
    }

//******************************************************************************
//**************************SETTER AND GETTERS**********************************
//******************************************************************************  

    function getDescription() {
        return $this->description;
    }

    function getReference() {
        return $this->reference;
    }

    function getAmount() {
        return $this->amount;
    }

    function getDueDate() {
        return $this->dueDate;
    }

    function getInstallments() {
        return $this->installments;
    }

    function getMaxOverdueDays() {
        return $this->maxOverdueDays;
    }

    function getFine() {
        return $this->fine;
    }

    function getInterest() {
        return $this->interest;
    }

    function getDiscountAmount() {
        return $this->discountAmount;
    }

    function getDiscountDays() {
        return $this->discountDays;
    }

    function getPayerName() {
        return $this->payerName;
    }

    function getPayerCpfCnpj() {
        return $this->payerCpfCnpj;
    }

    function getPayerEmail() {
        return $this->payerEmail;
    }

    function getPayerSecondaryEmail() {
        return $this->payerSecondaryEmail;
    }

    function getPayerPhone() {
        return $this->payerPhone;
    }

    function getPayerBirthDate() {
        return $this->payerBirthDate;
    }

    function getBillingAddressStreet() {
        return $this->billingAddressStreet;
    }

    function getBillingAddressComplement() {
        return $this->billingAddressComplement;
    }

    function getBillingAddressCity() {
        return $this->billingAddressCity;
    }

    function getBillingAddressState() {
        return $this->billingAddressState;
    }

    function getBillingAddressPostcode() {
        return $this->billingAddressPostcode;
    }

    function getNotifyPayer() {
        return $this->notifyPayer;
    }

    function getNotificationUrl() {
        return $this->notificationUrl;
    }

    function getResponseType() {
        return $this->responseType;
    }

    function getFeeSchemaToken() {
        return $this->feeSchemaToken;
    }

    function getSplitRecipient() {
        return $this->splitRecipient;
    }

    function setDescription($description) {
        $this->description = $description;
    }

    function setReference($reference) {
        $this->reference = $reference;
    }

    function setAmount($amount) {
        $this->amount = $amount;
    }

    function setDueDate($dueDate) {
        $this->dueDate = $dueDate;
    }

    function setInstallments($installments) {
        $this->installments = $installments;
    }

    function setMaxOverdueDays($maxOverdueDays) {
        $this->maxOverdueDays = $maxOverdueDays;
    }

    function setFine($fine) {
        $this->fine = $fine;
    }

    function setInterest($interest) {
        $this->interest = $interest;
    }

    function setDiscountAmount($discountAmount) {
        $this->discountAmount = $discountAmount;
    }

    function setDiscountDays($discountDays) {
        $this->discountDays = $discountDays;
    }

    function setPayerName($payerName) {
        $this->payerName = $payerName;
    }

    function setPayerCpfCnpj($payerCpfCnpj) {
        $this->payerCpfCnpj = $payerCpfCnpj;
    }

    function setPayerEmail($payerEmail) {
        $this->payerEmail = $payerEmail;
    }

    function setPayerSecondaryEmail($payerSecondaryEmail) {
        $this->payerSecondaryEmail = $payerSecondaryEmail;
    }

    function setPayerPhone($payerPhone) {
        $this->payerPhone = $payerPhone;
    }

    function setPayerBirthDate($payerBirthDate) {
        $this->payerBirthDate = $payerBirthDate;
    }

    function setBillingAddressStreet($billingAddressStreet) {
        $this->billingAddressStreet = $billingAddressStreet;
    }

    function setBillingAddressComplement($billingAddressComplement) {
        $this->billingAddressComplement = $billingAddressComplement;
    }

    function setBillingAddressCity($billingAddressCity) {
        $this->billingAddressCity = $billingAddressCity;
    }

    function setBillingAddressState($billingAddressState) {
        $this->billingAddressState = $billingAddressState;
    }

    function setBillingAddressPostcode($billingAddressPostcode) {
        $this->billingAddressPostcode = $billingAddressPostcode;
    }

    function setNotifyPayer($notifyPayer) {
        $this->notifyPayer = $notifyPayer;
    }

    function setNotificationUrl($notificationUrl) {
        $this->notificationUrl = $notificationUrl;
    }

    function setResponseType($responseType) {
        $this->responseType = $responseType;
    }

    function setFeeSchemaToken($feeSchemaToken) {
        $this->feeSchemaToken = $feeSchemaToken;
    }

    function setSplitRecipient($splitRecipient) {
        $this->splitRecipient = $splitRecipient;
    }

    public function getPaymentTypes() {
        return $this->paymentTypes;
    }

    public function setPaymentTypes($paymentTypes) {
        $this->paymentTypes = $paymentTypes;
    }

    public function getCreditCardNumber() {
        return $this->creditCardNumber;
    }

    public function setCreditCardNumber($creditCardNumber) {
        $this->creditCardNumber = $creditCardNumber;
    }

    public function getCreditCardHolderName() {
        return $this->creditCardHolderName;
    }

    public function setCreditCardHolderName($creditCardHolderName) {
        $this->creditCardHolderName = $creditCardHolderName;
    }

    public function getCreditCardSecurityCode() {
        return $this->creditCardSecurityCode;
    }

    public function setCreditCardSecurityCode($creditCardSecurityCode) {
        $this->creditCardSecurityCode = $creditCardSecurityCode;
    }

    public function getCreditCardExpirationMonth() {
        return $this->creditCardExpirationMonth;
    }

    public function setCreditCardExpirationMonth($creditCardExpirationMonth) {
        $this->creditCardExpirationMonth = $creditCardExpirationMonth;
    }

    public function getCreditCardExpirationYear() {
        return $this->creditCardExpirationYear;
    }

    public function setCreditCardExpirationYear($creditCardExpirationYear) {
        $this->creditCardExpirationYear = $creditCardExpirationYear;
    }

    public function getPaymentAdvance() {
        return $this->paymentAdvance;
    }

    public function setPaymentAdvance($paymentAdvance) {
        $this->paymentAdvance = $paymentAdvance;
    }

    public function getBillingAddressNumber() {
        return $this->billingAddressNumber;
    }

    public function setBillingAddressNumber($billingAddressNumber) {
        $this->billingAddressNumber = $billingAddressNumber;
    }

}
