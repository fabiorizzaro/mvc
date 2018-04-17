<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class SubscribeModel extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function insert() {

        try {

            $this->db->beginTransaction();

            $stmt = $this->db->prepare('INSERT INTO subscriptions(courseId, userId, dateTime, paymentType, reference, installments, paymentStatus) '
                    . 'VALUES( :courseId, :userId, :dateTime, :paymentType, :reference, :installments, :paymentStatus)');

            $stmt->bindValue(":courseId", $this->courseData['courseId']);
            $stmt->bindValue(":userId", $this->userData['userId']);
            $stmt->bindValue(":dateTime", $this->today->format('Y-m-d'));
            $stmt->bindValue(":paymentType", $this->paymentMethod);
            $stmt->bindValue(":reference", $this->referenceNumber);
            $stmt->bindValue(":installments", $this->installments);
            $stmt->bindValue(":paymentStatus", $this->installments);

            $stmt->execute();

            $this->db->commit();
        } catch (PDOException $e) {

            return $e->getMessage();
        }
    }

    public function update() {

        try {

            $this->db->beginTransaction();

//            $stmt = $this->db->prepare('UPDATE subscriptions SET '
//                    . 'courseId = :courseId, '
//                    . 'userId = :userId, '
//                    . 'dateTime = :dateTime, '
//                    . 'paymentType = :paymentType, '
//                    . 'reference = :reference, '
//                    . 'installments, :installments, '
//                    . 'paymentStatus, :paymentStatus '
//                    . 'WHERE reference = :reference');
//
//            $stmt->bindValue(":subscriptionId", $subscriptionId);
//            $stmt->bindValue(":courseId", $this->courseData['courseId']);
//            $stmt->bindValue(":userId", $this->userData['userId']);
//            $stmt->bindValue(":dateTime", $this->today);
//            $stmt->bindValue(":paymentType", $this->paymentMethod);
//            $stmt->bindValue(":reference", $this->referenceNumber);
//            $stmt->bindValue(":installments", $this->installments);
//            $stmt->bindValue(":paymentStatus", 'pago');

            $stmt = $this->db->prepare('UPDATE subscriptions SET '
                    . 'paymentStatus = :paymentStatus '
                    . 'WHERE reference = :reference');

            $stmt->bindValue(":reference", $this->referenceNumber);
            $stmt->bindValue(":paymentStatus", $this->paymentStatus);

            $stmt->execute();

            $this->db->commit();
        } catch (PDOException $e) {

            echo $e->getMessage();
            die;
        }
    }

    public function searchByKey($key, $value) {

        try {

            $sth = $this->db->prepare('SELECT * FROM subscriptions WHERE ' . $key . '= :value');

            $sth->bindValue(":value", $value);

            $sth->execute();

            $data = $sth->fetch(PDO::FETCH_ASSOC);

            return $data;
        } catch (PDOException $e) {

            echo 'Error: ' . $e->getMessage();
        }
    }

    public function enroll() {

        // Set a unique reference to be used to identify the transaction
        $this->referenceNumber = strtoupper(uniqid());

        // Set the default due date Today + 1 day
        $this->today = new DateTime();
        $defaulDueDate = $this->today->add(new DateInterval('P2D'));

        // Verify if the subscription is inside the allowed windows.
        $subscribeStartDate = DateTime::createFromFormat('Y-m-d', $this->courseData['subscribeStartDate']);
        $subscribeEndDate = DateTime::createFromFormat('Y-m-d', $this->courseData['subscribeEndDate']);

        if ($subscribeStartDate < $this->today && $this->today < $subscribeEndDate) {
            echo 'dentro do perido de inscrição';
        } else {
            echo 'fora do periodo de inscrição';
        }

        //Get payment method
        $this->paymentMethod = $_GET['paymentMethod'];
        
        echo $this->paymentMethod;
        

        // Get Credit Card parameters
        if ($this->paymentMethod == 'CREDIT_CARD') {
            $this->creditCard['creditCardNumber'] = $_POST['creditCardNumber'];
            $this->creditCard['creditCardHolderName'] = $_POST['creditCardHolderName'];
            $this->creditCard['creditCardSecurityCode'] = $_POST['creditCardSecurityCode'];
            $this->creditCard['creditCardExpirationMonth'] = $_POST['creditCardExpirationMonth'];
            $this->creditCard['creditCardExpirationYear'] = $_POST['creditCardExpirationYear'];
        }

        // Get installments and set to 1 if not received
        $this->installments = $_POST['installments'];
                
        if (!isset($this->installments)){
            $this->installments = 1;
        }
       
        //Divide the price / installments
        $tempPrice = $this->courseData['price'] / $this->installments;
        $this->finalPrice = number_format($tempPrice, 2, '.', '');
        
        // Set BoletoFácil Object
        $this->payment = new boletoFacil();

        //Check Payment Methods
        $this->payment->setDescription($this->courseData['name']);
        $this->payment->setReference($this->referenceNumber);
        $this->payment->setAmount($this->finalPrice);
        $this->payment->setDueDate($defaulDueDate->format('d/m/Y'));
        $this->payment->setPayerName($this->userData['fullName']);
        $this->payment->setPayerEmail($this->userData['email']);
        $this->payment->setPayerCpfCnpj($this->userData['cpf']);
        $this->payment->setInstallments($this->installments);
        $this->payment->setBillingAddressStreet($this->userData['address']);
        $this->payment->setBillingAddressNumber($this->userData['number']);
        $this->payment->setBillingAddressCity($this->userData['city']);
        $this->payment->setBillingAddressState($this->userData['state']);
        $this->payment->setBillingAddressPostcode($this->userData['cep']);



        if ($this->paymentMethod == 'CREDIT_CARD') {
            $this->payment->setPaymentTypes($this->paymentMethod);
            $this->payment->setCreditCardNumber($this->creditCard['creditCardNumber']);
            $this->payment->setCreditCardHolderName($this->creditCard['creditCardHolderName']);
            $this->payment->setCreditCardSecurityCode($this->creditCard['creditCardSecurityCode']);
            $this->payment->setCreditCardExpirationMonth($this->creditCard['creditCardExpirationMonth']);
            $this->payment->setCreditCardExpirationYear($this->creditCard['creditCardExpirationYear']);
        }


        $returnData = json_decode($this->payment->doPayment());

        //var_dump($returnData->data->charges[0]->billetDetails);
        // var_dump($returnData->data->charges[1]->billetDetails);

        foreach ($returnData->data->charges as $value) {
            echo '<p>' . $value->code . '</p>';
        }

        if ($returnData->success) {
            $this->insert();
        } else {
            echo $returnData->errorMessage;
        }
    }

    /**
     * This function receive data from BoletoFácil, and check the payment status.
     */
    public function validatePayment() {

        $validationUrl = 'https://sandbox.boletobancario.com/boletofacil/integration/api/v1/fetch-payment-details';

        $params = array(
            'paymentToken' => $this->paymentNotification['paymentToken']
        );

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $validationUrl);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);


        $returnData = json_decode(curl_exec($ch));
        if (!is_null($returnData)) {
            $this->referenceNumber = $returnData->data->payment->charge->reference;
            $this->paymentStatus = $returnData->data->payment->status;
            var_dump($returnData->data);
            $this->update();
            $error = 0;
        } else {
            $error = 1;
        }

        curl_close($ch);
        return $error;
    }

    public function test() {

        $crud = Crud::getInstance($this->db, 'usuarios');
        $arrayUser = array(1);
        $sql = "SELECT * FROM usuarios WHERE active = ?";
        $retorno = $crud->getSQLGeneric($sql, $arrayUser, TRUE);

        var_dump($retorno);
    }

}
