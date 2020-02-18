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
    public function create($arrayCourse, $arrayPaymentMethod) {

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

    public function search($value) {

        $sql = "SELECT * FROM courses INNER JOIN paymentmethods ON courses.courseId = paymentmethods.courseId WHERE courses.courseId = ?";
        $arrayParam = array($value);
        $teste = $this->CRUD->getSQLGeneric($sql, $arrayParam, FALSE);
    }

    public function delete($arrayCond) {

        try {
            
            $this->CRUD->beginTransaction();
            
            
            $this->CRUD->setTableName("courses");
            $return =  $this->CRUD->delete($arrayCond);
           
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
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

            $sth = $this->db->query('SELECT * FROM courses WHERE showHomePage = 1 ORDER BY homePosition LIMIT 6');

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
        $user = $this->CRUD->getSQLGenericClass($sql, $arrayParam, "Course", FALSE);
        return $user;
    }

      public function getPaymentMethods($key, $value) {

        $sql = "SELECT * FROM paymentmethods WHERE $key = ?";
        $arrayParam = array($value);
        $user = $this->CRUD->getSQLGeneric($sql, $arrayParam, FALSE);
        return $user;
    }
}
