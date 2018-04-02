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

    //Database functions

    public function insert() {

        try {

            $sth = $this->db->prepare('INSERT INTO CURSO(status, name, shortDescription, smallPicture, longDescription, largePicture, subscribeStartDate, subscribeEndDate) '
                    . 'VALUES( :status, :name, :shortDescription, :smallPicture, :longDescription, :largePicture, :subscribeStartDate, :subscribeEndDate )');

            $sth->bindValue(":status", $_POST['status']);
            $sth->bindValue(":name", $_POST['name']);
            $sth->bindValue(":shortDescription", $_POST['shortDescription']);
            $sth->bindValue(":smallPicture", $_POST['smallPicture']);
            $sth->bindValue(":longDescription", $_POST['longDescription']);
            $sth->bindValue(":largePicture", $_POST['largePicture']);
            $sth->bindValue(":subscribeStartDate", $_POST['subscribeStartDate']);
            $sth->bindValue(":subscribeEndDate", $_POST['subscribeEndDate']);
            
            $sth->execute();
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }

        $this->uploadImage();
    }

    public function delete() {

        try {

            $sth = $this->db->prepare('DELETE FROM CURSOS WHERE idCurso = :idCurso');

            $sth->bindValue(":idCurso", $_GET['courseId']);

            $sth->execute();
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function update() {

        $this->uploadImage();
        try {

            $sth = $this->db->prepare('UPDATE cursos SET nomeCurso = :nomeCurso, finalInscricao = :finalInscricao, valor=:valor, pictureSmall=:pictureSmall WHERE idCurso = :idCurso');

            $sth->bindValue(":idCurso", $_POST['courseId']);
            $sth->bindValue(":nomeCurso", $_POST['courseName']);
            $sth->bindValue(":pictureSmall", "/public/upload/" . $_FILES['homeImage']['name']);
            $sth->bindValue(":finalInscricao", $_POST['subscribeLimitDate']);
            $sth->bindValue(":valor", $_POST['courseValue']);


            $sth->execute();
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function searchAll() {

        try {

            $sth = $this->db->query('SELECT * FROM CURSO');

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

            $sth = $this->db->query('SELECT * FROM cursos WHERE homeShow = 1 ORDER BY homePosition LIMIT 6');

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
