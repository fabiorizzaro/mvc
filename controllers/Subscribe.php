<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Subscribe extends Controller {

    function __construct() {

        parent::__construct();
        $this->loadModel("User");
        $this->loadModel("Login");
        $this->loadModel("Course");
    }

    /**
     * 
     *  Check if the user is logged
     * 
     */
    public function index() {

        //Come from CourseDetais - Parameter is in the link

        if ($_GET['courseId']) {
            Session::Set('courseId', $_GET['courseId']);
            $this->validateUser();
        } else {
            header('location: /mvc/Index');
        }
    }

    public function validateUser() {

        if (!Session::Get('loggedIn')) {
            $this->view->render('Users/userValidation');
            exit;
        } else {
            $this->view->userData = $this->UserModel->searchByKey("userId", Session::Get('userId'));
            $this->view->courseData = $this->CourseModel->searchByKey("courseId", Session::Get('courseId'));
            $this->view->render('Courses/Enroll');
        }
    }

    /**
     * Call the form to add a new user
     */
    public function newUser() {
        $this->view->render('users/addEditForm');
    }

    /**
     * 
     * @todo Change the funcion name to addNewUser
     * @todo Send wellcome e-mail to user
     */
    public function addUser() {
        
        $userId = $this->UserModel->insert();
        
        $username = $_POST['username'];
        $password = $_POST['password'];

        $this->LoginModel->login2($username, $password);

        $this->view->userData = $this->UserModel->searchByKey("userId", $userId);
        $this->view->courseData = $this->CourseModel->searchByKey("courseId", Session::Get('courseId'));
        
        $this->view->render('Courses/Enroll');
    }

    public function checkLogin() {

        $this->LoginModel->login();

        $this->view->userData = $this->UserModel->searchByKey("userId", Session::Get('userId'));
        $this->view->courseData = $this->CourseModel->searchByKey("courseId", Session::Get('courseId'));

        $this->view->render('Courses/Enroll');
    }

    public function enroll() {

        $this->SubscribeModel->userData = $this->UserModel->searchByKey("userId", Session::Get('userId'));
        $this->SubscribeModel->courseData = $this->CourseModel->searchByKey("courseId", Session::Get('courseId'));

        $this->SubscribeModel->enroll();
    }

    public function paymentNotification() {

        $this->SubscribeModel->paymentNotification['paymentToken'] = $_POST['paymentToken'];
        $this->SubscribeModel->paymentNotification['chargeReference'] = $_POST['chargeReference'];
        $this->SubscribeModel->paymentNotification['chargeCode'] = $_POST['chargeCode'];
        
        $this->SubscribeModel->validatePayment();
    }
    
    public function confirmation(){
        
        $this->view->render('Subscribe/confirmation');
    }
 
    public function test($var = null, $var2 = null, $var3 = null, $var4 = null, $var5 = null){
      
         $this->SubscribeModel->test();
        
    }
}
