<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class CourseModel extends Model {

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

    public function delete() {

        try {

            $sth = $this->db->prepare('DELETE FROM CURSO WHERE courseId = :courseId');

            $sth->bindValue(":courseId", $_GET['courseId']);

            $sth->execute();
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function update() {

        $this->uploadImage();

        try {

            $sth = $this->db->prepare('UPDATE curso SET '
                    . 'status = :status, '
                    . 'name = :name, '
                    . 'shortDescription=:shortDescription, '
                    . 'smallPicture=:smallPicture, '
                    . 'longDescription=:longDescription, '
                    . 'largePicture=:largePicture, '
                    . 'subscribeStartDate=:subscribeStartDate, '
                    . 'subscribeEndDate=:subscribeEndDate, '
                    . 'homeDisplay=:homeDisplay, '
                    . 'displayPosition=:displayPosition, '
                    . 'dateTime=:dateTime, '
                    . 'loadTime=:loadTime, '
                    . 'material=:material, '
                    . 'target=:target, '
                    . 'address=:address, '
                    . 'price=:price, '
                    . 'paymentMethod=:paymentMethod, '
                    . 'teacher=:teacher '
                    . 'WHERE courseId = :courseId');

            $sth->bindValue(":courseId", $_POST['courseId']);
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
            Session::Set("PDO_ERRORS", $e->getMessage());
        }
    }

    public function searchAll() {

        try {

            $sth = $this->db->query('SELECT * FROM curso');

            $sth->execute();

            $data = $sth->fetchAll(PDO::FETCH_ASSOC);

            return $data;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function searchByKey($key, $value) {

        try {
            $sth = $this->db->prepare('SELECT * FROM curso WHERE ' . $key . '= :value');

            $sth->bindValue(":value", $value);

            $sth->execute();

            $data = $sth->fetch(PDO::FETCH_ASSOC);
            return $data;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    /**
     * 
     * Get the courses to be displayed in HomePage 
     * 
     * @return ARRRAY Return the PDO::fetch_all array
     */
    public function getHomeCourses() {

        try {

            $sth = $this->db->query('SELECT * FROM curso WHERE homeDisplay = 1 ORDER BY displayPosition LIMIT 6');
            
            $sth->execute();
            
            $data = $sth->fetchAll(PDO::FETCH_ASSOC);

            return $data;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
        
        
    }

    public function uploadImage() {

        if (isset($_FILES["homeImage"]["type"])) {

            $validextensions = array("jpeg", "jpg", "png");
            $temporary = explode(".", $_FILES["homeImage"]["name"]);
            $file_extension = end($temporary);



            if ($_FILES["homeImage"]["error"] > 0) {
                
            } else {

                if (file_exists("public/upload/" . $_FILES["homeImage"]["name"])) {
                    
                } else {
                    $sourcePath = $_FILES['homeImage']['tmp_name']; // Storing source path of the file in a variable

                    $targetPath = "public/upload/" . $_FILES['homeImage']['name']; // Target path where file is to be stored

                    move_uploaded_file($sourcePath, $targetPath); // Moving Uploaded file
                }
            }
        }
    }

}
