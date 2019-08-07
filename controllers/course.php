<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class course extends controller {

    function __construct() {
        parent::__construct();

        $this->view->css = array();
        $this->loadModel("paymentMethods");
    }

    private function isLogged() {

        if (!Session::Get('loggedIn')) {
            Session::Destroy();
            header('location: ' . ABS_PATH . '/Login');
            exit;
        }
    }

    //Routing
    public function main() {
        $this->searchAll();
        $this->view->make('courses/Index');
    }

    public function listCourses() {
        $this->searchAll();
        $this->view->make('courses/coursesList');
    }

    public function details1() {
        $this->view->make('courses/Details');
    }

    public function view() {
        $this->view->make('courses/AddEditForm');
    }

    public function cadastro() {
        $this->view->make('courses/novoLayout');
    }

    //Database functions

    public function insert() {


        $this->courseModel->insert();
        $this->index();
    }

    public function delete() {
        $this->courseModel->delete();
        header('location: //course');
    }

    public function update() {

        $arrayCourse = array('courseActive' => filter_input(INPUT_POST, 'courseActive'),
            'showHomePage' => filter_input(INPUT_POST, 'showHomePage'),
            'homePosition' => filter_input(INPUT_POST, 'homePosition'),
            'courseName' => filter_input(INPUT_POST, 'courseName'),
            'subscribeStartDate' => filter_input(INPUT_POST, 'subscribeStartDate'),
            'subscribeEndDate' => filter_input(INPUT_POST, 'subscribeEndDate'),
            'shortDescription' => filter_input(INPUT_POST, 'shortDescription'),
            'longDescription' => filter_input(INPUT_POST, 'longDescription'),
            'coursePrice' => filter_input(INPUT_POST, 'coursePrice'),
            'tab1Name' => filter_input(INPUT_POST, 'tab1Name'),
            'tab1Active' => filter_input(INPUT_POST, 'tab1Active'),
            'tab1Content' => filter_input(INPUT_POST, 'tab1Content'),
            'tab2Name' => filter_input(INPUT_POST, 'tab2Name'),
            'tab2Active' => filter_input(INPUT_POST, 'tab2Active'),
            'tab2Content' => filter_input(INPUT_POST, 'tab2Content'),
            'tab3Name' => filter_input(INPUT_POST, 'tab3Name'),
            'tab3Active' => filter_input(INPUT_POST, 'tab3Active'),
            'tab3Content' => filter_input(INPUT_POST, 'tab3Content'),
            'tab4Name' => filter_input(INPUT_POST, 'tab4Name'),
            'tab4Active' => filter_input(INPUT_POST, 'tab4Active'),
            'tab4Content' => filter_input(INPUT_POST, 'tab4Content'),
            'tab5Name' => filter_input(INPUT_POST, 'tab5Name'),
            'tab5Active' => filter_input(INPUT_POST, 'tab5Active'),
            'tab5Content' => filter_input(INPUT_POST, 'tab5Content'));

        $arrayPaymentMethod = array('creditCardInterests' => filter_input(INPUT_POST, 'creditCardInterests'),
            'creditCardDiscount' => filter_input(INPUT_POST, 'creditCardDiscount'),
            'debitCardInterests' => filter_input(INPUT_POST, 'debitCardInterests'),
            'debitCardDiscount' => filter_input(INPUT_POST, 'debitCardDiscount'),
            'boletoInterests' => filter_input(INPUT_POST, 'boletoInterests'),
            'boletoDiscount' => filter_input(INPUT_POST, 'boletoDiscount'),
            'depositInterests' => filter_input(INPUT_POST, 'depositInterests'),
            'depositDiscount' => filter_input(INPUT_POST, 'depositDiscount'));

        if ($_FILES["smallPicture"]["name"] != "") {
            $arrayCourse['smallPicture'] = $_FILES["smallPicture"]["name"];
            $this->uploadImage("smallPicture");
        }
        if ($_FILES["largePicture"]["name"] != "") {
            $arrayCourse['largePicture'] = $_FILES["largePicture"]["name"];
            $this->uploadImage("largePicture");
        }

        $arrayCond = array('courseId=' => filter_input(INPUT_POST, 'courseId'));

        $this->courseModel->update($arrayCourse, $arrayPaymentMethod, $arrayCond);
        $this->searchAll();
        $this->view->make('courses/coursesList');
    }

//    Nova Função de Adcionar CUrso
    public function cadastros() {

        $arrayCourse = array('courseActive' => filter_input(INPUT_POST, 'courseActive'),
            'showHomePage' => filter_input(INPUT_POST, 'showHomePage'),
            'homePosition' => filter_input(INPUT_POST, 'homePosition'),
            'courseName' => filter_input(INPUT_POST, 'courseName'),
            'subscribeStartDate' => filter_input(INPUT_POST, 'subscribeStartDate'),
            'subscribeEndDate' => filter_input(INPUT_POST, 'subscribeEndDate'),
            'smallPicture' => filter_input(INPUT_POST, 'smallPicture'),
            'largePicture' => filter_input(INPUT_POST, 'largePicture'),
            'shortDescription' => filter_input(INPUT_POST, 'shortDescription'),
            'longDescription' => filter_input(INPUT_POST, 'longDescription'),
            'coursePrice' => filter_input(INPUT_POST, 'coursePrice'),
            'tab1Name' => filter_input(INPUT_POST, 'tab1Name'),
            'tab1Active' => filter_input(INPUT_POST, 'tab1Active'),
            'tab1Content' => filter_input(INPUT_POST, 'tab1Content'),
            'tab2Name' => filter_input(INPUT_POST, 'tab2Name'),
            'tab2Active' => filter_input(INPUT_POST, 'tab2Active'),
            'tab2Content' => filter_input(INPUT_POST, 'tab2Content'),
            'tab3Name' => filter_input(INPUT_POST, 'tab3Name'),
            'tab3Active' => filter_input(INPUT_POST, 'tab3Active'),
            'tab3Content' => filter_input(INPUT_POST, 'tab3Content'),
            'tab4Name' => filter_input(INPUT_POST, 'tab4Name'),
            'tab4Active' => filter_input(INPUT_POST, 'tab4Active'),
            'tab4Content' => filter_input(INPUT_POST, 'tab4Content'),
            'tab5Name' => filter_input(INPUT_POST, 'tab5Name'),
            'tab5Active' => filter_input(INPUT_POST, 'tab5Active'),
            'tab5Content' => filter_input(INPUT_POST, 'tab5Content'));

        $arrayPaymentMethod = array('creditCardInterests' => filter_input(INPUT_POST, 'creditCardInterests'),
            'creditCardDiscount' => filter_input(INPUT_POST, 'creditCardDiscount'),
            'debitCardInterests' => filter_input(INPUT_POST, 'debitCardInterests'),
            'debitCardDiscount' => filter_input(INPUT_POST, 'debitCardDiscount'),
            'boletoInterests' => filter_input(INPUT_POST, 'boletoInterests'),
            'boletoDiscount' => filter_input(INPUT_POST, 'boletoDiscount'),
            'depositInterests' => filter_input(INPUT_POST, 'depositInterests'),
            'depositDiscount' => filter_input(INPUT_POST, 'depositDiscount'));

        //Validate Payment Methods Imput
        if (isset($_POST['acceptCreditCard'])) {
            $arrayPaymentMethod['acceptCreditCard'] = "1";
        }
        if (isset($_POST['acceptDebitCard'])) {
            $arrayPaymentMethod['acceptDebitCard'] = "1";
        }
        if (isset($_POST['acceptBoleto'])) {
            $arrayPaymentMethod['acceptBoleto'] = "1";
        }
        if (isset($_POST['acceptDeposit'])) {
            $arrayPaymentMethod['acceptDeposit'] = "1";
        }

        if ($_FILES["smallPicture"]["name"] != "") {
            $arrayCourse['smallPicture'] = $_FILES["smallPicture"]["name"];
            $this->uploadImage("smallPicture");
        }
        if ($_FILES["largePicture"]["name"] != "") {
            $arrayCourse['largePicture'] = $_FILES["largePicture"]["name"];
            $this->uploadImage("largePicture");
        }

        $this->courseModel->addCourse($arrayCourse, $arrayPaymentMethod);
        $this->searchAll();
        $this->view->make('courses/coursesList');
    }

    public function test() {

        $this->view->data = $this->courseModel->search(18);
        $this->view->make('courses/novoLayout');
    }

    public function uploadImage($fileName) {

        if (isset($_FILES[$fileName]["name"]) && $_FILES[$fileName]["name"] != "") {

            $validextensions = array("jpeg", "jpg", "png");
            $temporary = explode(".", $_FILES[$fileName]["name"]);
            $file_extension = end($temporary);

            if ($_FILES[$fileName]["error"] > 0) {
                
            } else {

                if (file_exists("public/upload/" . $_FILES[$fileName]["name"])) {
                    
                } else {
                    $sourcePath = $_FILES[$fileName]['tmp_name']; // Storing source path of the file in a variable
                    $targetPath = "public/upload/" . $_FILES[$fileName]['name']; // Target path where file is to be stored
                    move_uploaded_file($sourcePath, $targetPath); // Moving Uploaded file
                }
            }
        }
    }

    public function searchAll() {
        $this->view->data = $this->courseModel->searchAll();
    }

    // Mudar para show();
    public function edit() {
        $key = 'courseId';
        $value = $_GET['courseId'];

        $this->view->courseData = $this->courseModel->searchByKey($key, $value);
        $this->view->paymentMethodData = $this->paymentMethodsModel->searchByKey($key, $value);
        $this->view->make('courses/novoLayout');
    }

    public function details($courseId = null) {

        $key = 'courseId';
        $value = $courseId;

        $this->view->data = $this->courseModel->searchByKey($key, $value);
        $this->view->make('courses/Details_v2', 'Instituto Alliqua - Curso ' . $this->view->data->courseName);
    }

}
