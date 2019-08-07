<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class subscribeModel extends Model {

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

            echo $e->getMessage();
        }
    }

    public function update() {

        try {

            $this->db->beginTransaction();

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

    /*
     * Processa o pagamento - BOLETO
     * Usa o Boleto Facíl para processar o pagamento
     * 
     * @param $installments, $course, $user, $coupon
     * 
     */

    public function boletoPayment($installments, Course $course, User $user, $coupon) {

        //Cria o Numero de Referencia
        $referenceNumber = strtoupper(uniqid());

        //Calcula o valor da parcela
        $installmentsValue = '';
        if ($coupon->getCouponID() === null) {
            $installmentsValue = $course->getPrice() / $installments;
        } else {
            $installmentsValue = ($course->getPrice() - $coupon->getValue()) / $installments;
        }

        // Set the default due date Today + 1 day
        $today = new DateTime();
        $defaultDueDate = new DateTime();
        $defaultDueDate->add(new DateInterval('P2D'));

        $creditCardPayment = new boletoFacil();

        $creditCardPayment->setDescription($course->getTitle());
        $creditCardPayment->setReference($referenceNumber);
        $creditCardPayment->setAmount($installmentsValue);
        $creditCardPayment->setDueDate($defaultDueDate->format('d/m/Y'));
        $creditCardPayment->setPayerName($user->getFullName());
        $creditCardPayment->setPayerEmail($user->getEmail());
        $creditCardPayment->setPayerCpfCnpj($user->getCpf());
        $creditCardPayment->setNotifyPayer('false');
        $creditCardPayment->setInstallments($installments);
        $creditCardPayment->setBillingAddressStreet($user->getAddress());
        $creditCardPayment->setBillingAddressNumber($user->getNumber());
        $creditCardPayment->setBillingAddressCity($user->getCity());
        $creditCardPayment->setBillingAddressState($user->getState());
        $creditCardPayment->setBillingAddressPostcode($user->getCep());
        $creditCardPayment->setPaymentTypes('BOLETO');

        $returnData = json_decode($creditCardPayment->doPayment());

        if ($returnData->success) {

            $this->CRUD->beginTransaction();

            $this->CRUD->setTableName("subscriptions");

            $subscriptionsArray = array(
                'courseID' => $course->getCourseId(),
                'userId' => $user->getUserId(),
                'chargeReference' => $referenceNumber,
                'dateTime' => date("Y-m-d H:i:s"),
            );

            $this->CRUD->insert($subscriptionsArray);

            $this->CRUD->setTableName("charges");

            foreach ($returnData->data->charges as $value) {

                $chargeArray = array(
                    'chargeReference' => $referenceNumber,
                    'chargeCode' => $value->code,
                    'chargeAmount' => $installmentsValue,
                    'chargeDueDate' => $value->dueDate,
                    'chargeCheckoutUrl' => $value->checkoutUrl,
                    'chargeLink' => $value->link,
                    'chargeInstallmentLink' => $value->installmentLink,
                    'chargePayNumber' => $value->payNumber,
                    'billetBankAccount' => $value->billetDetails->bankAccount,
                    'billetOurNumber' => $value->billetDetails->ourNumber,
                    'billetBarcodeNumber' => $value->billetDetails->barcodeNumber,
                    'billetPortfolio' => $value->billetDetails->portfolio
                );

                $this->CRUD->insert($chargeArray);
            }
            $this->CRUD->commit();
            
            // send confitmation e-mail
            
        } else {

            echo "falhou";
        }

        return $chargeArray;
    }

    /*
     * Processa o pagamento - CARTÃO DE CRÉDITO
     * Usa o Boleto Facíl para processar o pagamento
     * 
     * @param $creditCardData $installments, $course, $user, $coupon
     * 
     */

    public function creditCardPayment(Array $creditCard, $installments, Course $course, User $user, $coupon) {

        //Cria o Numero de Referencia
        $referenceNumber = strtoupper(uniqid());

        //Calcula o valor da parcela
        $installmentsValue = '';
        if ($coupon->getCouponID() === null) {
            $installmentsValue = $course->getPrice() / $installments;
        } else {
            $installmentsValue = ($course->getPrice() - $coupon->getValue()) / $installments;
        }

        // Set the default due date Today + 1 day
        $today = new DateTime();
        $defaultDueDate = new DateTime();
        $defaultDueDate->add(new DateInterval('P2D'));

        $creditCardPayment = new boletoFacil();

        $creditCardPayment->setDescription($course->getTitle());
        $creditCardPayment->setReference($referenceNumber);
        $creditCardPayment->setAmount($installmentsValue);
        $creditCardPayment->setDueDate($defaultDueDate->format('d/m/Y'));
        $creditCardPayment->setPayerName($user->getFullName());
        $creditCardPayment->setPayerEmail($user->getEmail());
        $creditCardPayment->setPayerCpfCnpj($user->getCpf());
        $creditCardPayment->setNotifyPayer('false');
        $creditCardPayment->setInstallments($installments);
        $creditCardPayment->setBillingAddressStreet($user->getAddress());
        $creditCardPayment->setBillingAddressNumber($user->getNumber());
        $creditCardPayment->setBillingAddressCity($user->getCity());
        $creditCardPayment->setBillingAddressState($user->getState());
        $creditCardPayment->setBillingAddressPostcode($user->getCep());
        $creditCardPayment->setPaymentTypes('CREDIT_CARD');
        $creditCardPayment->setCreditCardHash($creditCard['creditCardHash']);
        $creditCardPayment->setCreditCardNumber(str_replace(".", "", $creditCard['creditCardNumber']));
        $creditCardPayment->setCreditCardHolderName($creditCard['creditCardHolderName']);
        $creditCardPayment->setCreditCardSecurityCode($creditCard['creditCardSecurityCode']);
        $creditCardPayment->setCreditCardExpirationMonth($creditCard['creditCardExpirationMonth']);
        $creditCardPayment->setCreditCardExpirationYear($creditCard['creditCardExpirationYear']);

        $returnData = json_decode($creditCardPayment->doPayment());

        if ($returnData->success) {

            $this->CRUD->beginTransaction();

            $this->CRUD->setTableName("subscriptions");

            $subscriptionsArray = array(
                'courseID' => $course->getCourseId(),
                'userId' => $user->getUserId(),
                'chargeReference' => $referenceNumber,
                'dateTime' => date("Y-m-d H:i:s"),
            );

            $this->CRUD->insert($subscriptionsArray);

            $this->CRUD->setTableName("charges");

            foreach ($returnData->data->charges as $value) {

                $chargeArray = array(
                    'chargeReference' => $referenceNumber,
                    'chargeCode' => $value->code,
                    'chargeAmount' => $installmentsValue,
                    'chargeDueDate' => $value->dueDate,
                    'chargeCheckoutUrl' => $value->checkoutUrl,
                    'chargeLink' => $value->link,
                    'chargeInstallmentLink' => $value->installmentLink,
                    'chargePayNumber' => $value->payNumber
                );

                $this->CRUD->insert($chargeArray);
            }
            $this->CRUD->commit();
            
        } else {

            echo "erro: " . $returnData->errorMessage;
            
        }
    }

    /**
     * This function receive data from BoletoFácil, and check the payment status.
     */
    public function validatePayment() {
        $error = "";

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

            $this->CRUD->setTableName("charges");

            $arrayUser = array('paymentId' => $returnData->data->payment->id,
                'paymentAmount' => $returnData->data->payment->amount,
                'paymentDate' => $returnData->data->payment->date,
                'paymentFee' => $returnData->data->payment->fee,
                'paymentStatus' => $returnData->data->payment->status,
                'paymentType' => $returnData->data->payment->type
            );

            $arrayCond = array('chargeReference=' => $returnData->data->payment->charge->reference,
                'chargeCode=' => $returnData->data->payment->charge->code
            );

            $this->CRUD->update($arrayUser, $arrayCond);
        } else {
            $error = 1;
        }

        curl_close($ch);
        return $error;
    }

    /*
     * Verifica se o Cupon é válido
     * 
     * @param $couponId $userId $courseId
     * 
     */

    public function validateCoupons($couponId, $userId, $courseId) {

        $CRUD = Crud::getInstance($this->db);

        $sql = "SELECT coupons.couponId, coupons.value, courses.price FROM coupons "
                . "INNER JOIN courses ON coupons.courseId = courses.courseId "
                . "WHERE coupons.couponId = ? "
                . "AND coupons.courseId = ? "
                . "AND coupons.userId = ? "
                . "AND coupons . quantity > 0 "
                . "AND coupons . dueDate >= CURDATE();";

        $arrayParam = array($couponId, $userId, $courseId);

        $couponData = $CRUD->getSQLGeneric($sql, $arrayParam, FALSE);

        $result = array();

        if ($couponData) {
            $result = array(
                'error' => FALSE,
                'message' => '',
                'value' => $couponData->value,
                'price' => $couponData->price,
                'finalPrice' => number_format($couponData->price - $couponData->value, 2, ',', ' '));
        } else {
            $result = array(
                'error' => TRUE,
                'message' => 'Cupon Inválido');
        }

        return $result;
    }

    public function test() {

        $sql = "SELECT coupons.couponId, coupons.value, courses.price FROM coupons "
                . "INNER JOIN courses ON coupons.courseId = courses.courseId "
                . "WHERE coupons.couponId = ? "
                . "AND coupons.courseId = ? "
                . "AND coupons.userId = ? "
                . "AND coupons . quantity > 0 "
                . "AND coupons . dueDate >= CURDATE();";

        $sql = "SELECT * from users WHERE cpf = ?";

        $arrayParam = array('223.170.638-57');

        $dados = $this->CRUD->getSQLGeneric($sql, $arrayParam, FALSE);

        if ($dados === false) {
            echo "falhou";
        } else {
            echo "foi";
        }
        var_dump($dados);
    }

    public function email($to, $subject, $content) {

        $htmlContent = file_get_contents($content);

        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: Contato<contato@alliqua.com.br>' . "\r\n";

        mail($to, $subject, $htmlContent, $headers);
    }

    
    //***************************** TO BE DELETED ******************************
    
    /*
     * @Deprecated
     */
    public function enroll($paymentMethod) {

        // Set a unique reference to be used to identify the transaction
        $this->referenceNumber = strtoupper(uniqid());

        // Set the default due date Today + 1 day
        $this->today = new DateTime();

        $this->defaultDueDate = new DateTime();
        $this->defaultDueDate->add(new DateInterval('P2D'));

        // Get installments and set to 1 if not received
        $this->installments = isset($_POST['installments']) ? $_POST['installments'] : 1;

        // Verify if the subscription is inside the allowed windows.
        $subscribeStartDate = DateTime::createFromFormat('Y-m-d', $this->courseData['subscribeStartDate']);
        $subscribeEndDate = DateTime::createFromFormat('Y-m-d', $this->courseData['subscribeEndDate']);

        if ($subscribeStartDate < $this->today && $this->today > $subscribeEndDate) {

            $this->processPayment($paymentMethod);
        } else {
            var_dump($this->today, $subscribeEndDate);
            echo 'Infelizmente as inscriçoes estão encerradas para este curso';
        }
    }

    /*
     * @Deprecated
     */
    private function processPayment($paymentMethod) {

        $installments = isset($_POST['installments']) ? $_POST['installments'] : 1;

        $this->paymentMethod = $paymentMethod;
        $this->couponId = filter_input(INPUT_POST, 'coupon');


        $sql = "SELECT * FROM coupons WHERE couponId = ?";
        $arrayParam = array($this->couponId);
        $couponData = $this->CRUD->getSQLGeneric($sql, $arrayParam, FALSE);


        //Calcula o preço final e valor da parcela

        if ($couponData) {

            $finalPrice = $this->courseData['price'] - $couponData->value;
            $installmentValue = $finalPrice / $installments;
        } else {
            $installmentValue = $this->courseData['price'] / $installments;
        }

        $this->creditCard['creditCardNumber'] = $_POST['creditCardNumber'];
        $this->creditCard['creditCardHolderName'] = $_POST['creditCardHolderName'];
        $this->creditCard['creditCardSecurityCode'] = $_POST['creditCardSecurityCode'];
        $this->creditCard['creditCardExpirationMonth'] = $_POST['creditCardExpirationMonth'];
        $this->creditCard['creditCardExpirationYear'] = $_POST['creditCardExpirationYear'];


        //Divide the price / installments
        //$tempPrice = $this->courseData['price'] / $this->installments;
        $this->finalPrice = number_format($this->courseData['price'] / $this->installments, 2, '.', '');

        // Set BoletoFácil Object
        $creditCardPayment = new boletoFacil();


        $creditCardPayment->setDescription($this->courseData['title']);
        $creditCardPayment->setReference($this->referenceNumber);
        $creditCardPayment->setAmount($installmentValue);
        $creditCardPayment->setDueDate($this->defaultDueDate->format('d/m/Y'));
        $creditCardPayment->setPayerName($this->userData['fullName']);
        $creditCardPayment->setPayerEmail($this->userData['email']);
        $creditCardPayment->setPayerCpfCnpj($this->userData['cpf']);
        $creditCardPayment->setNotifyPayer('false');
        $creditCardPayment->setInstallments(5);
        $creditCardPayment->setBillingAddressStreet($this->userData['address']);
        $creditCardPayment->setBillingAddressNumber($this->userData['number']);
        $creditCardPayment->setBillingAddressCity($this->userData['city']);
        $creditCardPayment->setBillingAddressState($this->userData['state']);
        $creditCardPayment->setBillingAddressPostcode($this->userData['cep']);
        $creditCardPayment->setPaymentTypes($this->paymentMethod);
        $creditCardPayment->setCreditCardNumber($this->creditCard['creditCardNumber']);
        $creditCardPayment->setCreditCardHolderName($this->creditCard['creditCardHolderName']);
        $creditCardPayment->setCreditCardSecurityCode($this->creditCard['creditCardSecurityCode']);
        $creditCardPayment->setCreditCardExpirationMonth($this->creditCard['creditCardExpirationMonth']);
        $creditCardPayment->setCreditCardExpirationYear($this->creditCard['creditCardExpirationYear']);


        $returnData = json_decode($creditCardPayment->doPayment());

        if ($returnData->success) {

            $this->CRUD->beginTransaction();

            $this->CRUD->setTableName("subscriptions");

            $subscriptionsArray = array(
                'courseID' => $this->courseData['courseId'],
                'userId' => $this->userData['userId'],
                'chargeReference' => $this->referenceNumber,
                'dateTime' => date("Y-m-d H:i:s"),
            );

            $this->CRUD->insert($subscriptionsArray);

            $this->CRUD->setTableName("charges");

            foreach ($returnData->data->charges as $value) {

                $chargeArray = array(
                    'chargeReference' => $this->referenceNumber,
                    'chargeCode' => $value->code,
                    'chargeAmount' => $installmentValue,
                    'chargeDueDate' => $value->dueDate,
                    'chargeCheckoutUrl' => $value->checkoutUrl,
                    'chargeLink' => $value->link,
                    'chargeInstallmentLink' => $value->installmentLink,
                    'chargePayNumber' => $value->payNumber,
                    'billetBankAccount' => $value->billetDetails->bankAccount,
                    'billetOurNumber' => $value->billetDetails->ourNumber,
                    'billetBarcodeNumber' => $value->billetDetails->barcodeNumber,
                    'billetPortfolio' => $value->billetDetails->portfolio
                );

                $this->CRUD->insert($chargeArray);
            }
            $this->CRUD->commit();
            return $chargeArray;
        } else {

            echo "falhou";
        }
    }

}
