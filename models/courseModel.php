<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class courseModel extends Model {

    public function __construct() {
        parent::__construct();
    }

    /**
     * COURSE INSERT
     * 
     * @param $_POST fields from Courses/AddEditForm.php 
     * 
     */
    public function insert() {

        try {

            $sth = $this->db->prepare('INSERT INTO CURSO(status, name, shortDescription, smallPicture, longDescription, largePicture, subscribeStartDate, subscribeEndDate,'
                    . 'homeDisplay, displayPosition, dateTime, loadTime, material, target, address, price, paymentMethod, teacher) '
                    . 'VALUES( :status, :name, :shortDescription, :smallPicture, :longDescription, :largePicture, :subscribeStartDate, :subscribeEndDate,'
                    . ':homeDisplay, :displayPosition, :dateTime, :loadTime, :material, :target, :address, :price, :paymentMethod, :teacher )');

            $sth->bindValue(":status", $_POST['status']);
            $sth->bindValue(":name", $_POST['name']);
            $sth->bindValue(":shortDescription", $_POST['shortDescription']);
            $sth->bindValue(":smallPicture", $_FILES['smallPicture']['name']);
            $sth->bindValue(":longDescription", $_POST['longDescription']);
            $sth->bindValue(":largePicture", $_FILES['largePicture']['name']);
            $sth->bindValue(":subscribeStartDate", $_POST['subscribeStartDate']);
            $sth->bindValue(":subscribeEndDate", $_POST['subscribeEndDate']);
            $sth->bindValue(":homeDisplay", $_POST['homeDisplay']);
            $sth->bindValue(":displayPosition", $_POST['displayPosition']);
            $sth->bindValue(":dateTime", $_POST['dateTime']);
            $sth->bindValue(":loadTime", $_POST['loadTime']);
            $sth->bindValue(":material", $_POST['material']);
            $sth->bindValue(":target", $_POST['target']);
            $sth->bindValue(":address", $_POST['address']);
            $sth->bindValue(":price", $_POST['price']);
            $sth->bindValue(":paymentMethod", $_POST['paymentMethod']);
            $sth->bindValue(":teacher", $_POST['teacher']);

            $sth->execute();
        } catch (PDOException $e) {
            $functionError = TRUE;
            return $e->getMessage();
        }

        //$this->uploadImage();
    }

    public function addCourse($arrayCourse, $arrayPaymentMethod) {

        try {

            $this->CRUD->beginTransaction();

            $this->CRUD->setTableName("courses");

            $courseReturn = $this->CRUD->insert($arrayCourse);

            $this->CRUD->setTableName("paymentmethods");

            $arrayPaymentMethod['courseId'] = $courseReturn['lastInsertedId'];

            $paymentReturn = $this->CRUD->insert($arrayPaymentMethod);

            if ($courseReturn['code'] && $paymentReturn['code']) {
                $this->CRUD->commit();
            } else {
                $this->CRUD->rollback();
            }
        } catch (PDOException $e) {

            $this->CRUD->rollback();
            echo 'Error: ' . $e->getMessage();
            die();
        }
    }

    public function search($value) {


        $sql = "SELECT * FROM courses INNER JOIN paymentmethods ON courses.courseId = paymentmethods.courseId WHERE courses.courseId = ?";
        $arrayParam = array($value);
        $teste = $this->CRUD->getSQLGeneric($sql, $arrayParam, FALSE);
    }

    public function delete() {

        try {

            $sth = $this->db->prepare('DELETE FROM CURSO WHERE courseId = :courseId');

            $sth->bindValue(":courseId", $_GET['courseId']);

            $sth->execute();
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function update($arrayCourse, $arrayPaymentMethod, $arrayCond) {

        try {

            $this->CRUD->beginTransaction();

            $this->CRUD->setTableName("courses");

            $courseReturn = $this->CRUD->update($arrayCourse, $arrayCond);

            $this->CRUD->setTableName("paymentmethods");

            $paymentReturn = $this->CRUD->update($arrayPaymentMethod, $arrayCond);

            $this->CRUD->commit();
        } catch (PDOException $e) {
            $this->CRUD->rollback();
            Session::Set("PDO_ERRORS", $e->getMessage());
        }
    }

    public function searchAll() {

        try {

            $sth = $this->db->query('SELECT * FROM courses');

            $sth->execute();

            $data = $sth->fetchAll(PDO::FETCH_ASSOC);

            return $data;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function searchByKey($key, $value) {

        try {

            $sql = "SELECT * FROM courses WHERE $key = ?";
            $arrayParam = array($value);
            $course = $this->CRUD->getSQLGeneric($sql, $arrayParam, FALSE);

//            $sql = "SELECT * FROM paymentMethods WHERE $key = ?";
//            $arrayParam = array($value);
//            $payments = $this->CRUD->getSQLGeneric($sql, $arrayParam, FALSE);
//
//            return array($course, $payments);
             return $course;
            
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    /**
     * 
     * Get the courses to be displayed in HomePage 
     * 
     * @return ARRAY Return the PDO::fetch_all array
     */
    public function getHomeCourses() {

        try {

            $sth = $this->db->query('SELECT * FROM courses WHERE homeDisplay = 1 ORDER BY homePosition LIMIT 6');

            $sth->execute();

            $data = $sth->fetchAll(PDO::FETCH_ASSOC);

            return $data;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function getCourse($key, $value) {

        $sql = "SELECT * FROM courses WHERE $key = ?";
        $arrayParam = array($value);
        $user = $this->CRUD->getSQLGenericClass($sql, $arrayParam, "course", FALSE);
        return $user;
    }

}
