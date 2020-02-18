<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class subscribe extends Controller {

    function __construct() {

        parent::__construct();
        $this->loadModel("user");
        $this->loadModel("login");
        $this->loadModel("course");
        $this->loadModel("coupon");
    }
    
    /*
     * 
     * 
     * @param $courseId
     */
    public function main($courseId = null) {
        // Verifica se o usuário está logado e um curso foi selecionado.
        if ($this->validateCourse($courseId) > 0 && $this->validateUser() === TRUE) {
            $this->view->userData = $this->userModel->searchByKey("userId", Session::Get('userId'));
            $this->view->courseData = $this->courseModel->searchByKey("courseId", Session::Get('courseId'));
            $this->view->paymentMethodsData = $this->courseModel->getPaymentMethods("courseId", Session::Get('courseId'));
            $this->view->make('Courses/Enroll_3','Instituto Alliqua - Checkout');
        } else {
            
            $this->view->redirect("/login/loginForm/subscribe");
        }
    }
    
    /*
     * Verifica se já foi selecionado um curso, caso já tenha sido selecionado
     * retorna o ID do curso, caso não tenha sido retorna 0
     * 
     * @param $courseId
     * @return int
     */
    private function validateCourse($courseId) {

        if ($courseId === NULL && Session::Get('courseId') === NULL) {
            return 0;
        }
        if ($courseId === NULL && Session::Get('courseId') > "0") {

            return Session::Get('courseId');
        }
        if ($courseId !== NULL && Session::Get('courseId') === NULL) {

            Session::Set('courseId', $courseId);
            return $courseId;
        }
        if ($courseId !== NULL && Session::Get('courseId') === $courseId) {
            return $courseId;
        } else {

            Session::Set('courseId', $courseId);
            return $courseId;
        }
    }

    /*
     * Verifica se usuário está logado!
     * 
     * @return boolean
     */
    private function validateUser() {

        if (!Session::Get('loggedIn')) {
            return FALSE;
        } else {
            return TRUE;
        }
    }


    /**
     * 
     * 
     * @param type $paymentType
     */
    public function enroll($paymentType) {
       
        $user = $this->userModel->getUser('userId', Session::Get('userId'));
        $course = $this->courseModel->getCourse('courseId', Session::Get('courseId'));

        //Verifica se um cupon foi usado!
        if (filter_input(INPUT_POST, 'coupon') === "") {
            $coupon = new Coupon();
        } else {
            $coupon = $this->couponModel->getCoupon('couponId', filter_input(INPUT_POST, 'coupon'));
        }

        //Verifica o numero de parcelas
        if (filter_input(INPUT_POST, 'installments')) {
            $installments = filter_input(INPUT_POST, 'installments');
        } else {
            $installments = '1';
        }

        switch ($paymentType) {

            case 'BOLETO':

                $returnData = $this->subscribeModel->boletoPayment($installments, $course, $user, $coupon);
                Session::Set('subscribe', $returnData);
                Session::Set('fullName', $user->getFullName());

                $this->view->redirect('/Subscribe/confirmation');

                break;

            case 'CREDIT_CARD':

                $creditCard = array(
                    'creditCardHash' => filter_input(INPUT_POST, 'creditCardHash'),
                    'creditCardNumber' => filter_input(INPUT_POST, 'creditCardNumber'),
                    'creditCardHolderName' => filter_input(INPUT_POST, 'creditCardHolderName'),
                    'creditCardSecurityCode' => filter_input(INPUT_POST, 'creditCardSecurityCode'),
                    'creditCardExpirationMonth' => filter_input(INPUT_POST, 'creditCardExpirationMonth'),
                    'creditCardExpirationYear' => filter_input(INPUT_POST, 'creditCardExpirationYear')
                );

                $this->subscribeModel->creditCardPayment($creditCard, $installments, $course, $user, $coupon);
                
                $this->view->redirect('/Subscribe/confirmation');
                
                break;
        }
    }

    /*
     * Every time a charge has an update BoletoFacil does a POST on this URL
     * @param $_POST $paymentToken Token de Identificação do Pagamento.
     */
    public function paymentNotification() {

        $this->subscribeModel->paymentNotification['paymentToken'] = $_POST['paymentToken'];
        $this->subscribeModel->paymentNotification['chargeReference'] = $_POST['chargeReference'];
        $this->subscribeModel->paymentNotification['chargeCode'] = $_POST['chargeCode'];

        $this->subscribeModel->validatePayment();
    }

    public function test($var = null, $var2 = null, $var3 = null, $var4 = null, $var5 = null) {

        //$this->subscribeModel->test();
        
        
        echo (filter_input(INPUT_POST, 'pag'));
        
    }
    
    /*
     * Valida se o Cupom é válido
     * 
     * @retun JSON
     */
    public function validateCoupons() {

        $couponId = filter_input(INPUT_POST, 'couponId');
        $userId = filter_input(INPUT_POST, 'userId');
        $courseId = filter_input(INPUT_POST, 'courseId');

        header('Content-Type: application/json');

        $data = $this->subscribeModel->validateCoupons($couponId, $userId, $courseId);

        echo json_encode($data);
    }

    public function confirmation() {
        $this->view->make('subscribe/confirmation');
    }

}
