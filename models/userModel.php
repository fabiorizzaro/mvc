<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class userModel extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function insert($userData) {

        try {

            $this->CRUD->setTableName("users");

            $insert = $this->CRUD->insert($userData);

            if ($insert['code']) {
                $userData['userId'] = $insert['lastInsertedId'];
            }

            return $userData;
            
        } catch (PDOException $e) {
            
        }
    }

    /**
     * Insert Users
     * @return type
     */
    public function insert2() {

        $functionError = FALSE;

        try {

            $this->db->beginTransaction();

            $sth = $this->db->prepare('INSERT INTO users(fullname, rg, cpf, birthday, profession, degree, mobilePhone, homePhone,'
                    . 'businessPhone, email, address, number, complement, neighborhood, city, state, cep, username, password, userType) '
                    . 'VALUES( :fullname, :rg, :cpf, :birthday, :profession, :degree, :mobilePhone, :homePhone,'
                    . ':businessPhone, :email, :address, :number, :complement, :neighborhood, :city, :state, :cep, :username, :password, :userType)');

            $sth->bindValue(":fullname", $_POST['fullName']);
            $sth->bindValue(":rg", $_POST['rg']);
            $sth->bindValue(":cpf", $_POST['cpf']);
            $sth->bindValue(":birthday", date_format(DateTime::createFromFormat('d/m/Y', $_POST['birthDay']), 'Y-m-d'));
            $sth->bindValue(":profession", $_POST['profession']);
            $sth->bindValue(":degree", $_POST['degree']);
            $sth->bindValue(":mobilePhone", $_POST['mobilePhone']);
            $sth->bindValue(":homePhone", $_POST['homePhone']);
            $sth->bindValue(":businessPhone", $_POST['businessPhone']);
            $sth->bindValue(":email", $_POST['email']);
            $sth->bindValue(":address", $_POST['address']);
            $sth->bindValue(":number", $_POST['number']);
            $sth->bindValue(":complement", $_POST['complement']);
            $sth->bindValue(":neighborhood", $_POST['neighborhood']);
            $sth->bindValue(":city", $_POST['city']);
            $sth->bindValue(":state", $_POST['state']);
            $sth->bindValue(":cep", $_POST['cep']);
            $sth->bindValue(":username", $_POST['username']);
            $sth->bindValue(":password", MD5($_POST['password']));

            $sth->execute();

            $lastInsertedId = $this->db->lastInsertId();

            $this->db->commit();
        } catch (PDOException $e) {

            return $e->getMessage();
        }

        return $lastInsertedId;
    }

    public function searchByKey($key, $value) {

        try {

            $sth = $this->db->prepare('SELECT * FROM users WHERE ' . $key . '= :value');

            $sth->bindValue(":value", $value);

            $sth->execute();

            $data = $sth->fetch(PDO::FETCH_ASSOC);

            return $data;
        } catch (PDOException $e) {

            echo 'Error: ' . $e->getMessage();
        }
    }

    public function getUser($key, $value) {

        $sql = "SELECT * FROM users WHERE $key = ?";
        $arrayParam = array($value);
        $user = $this->CRUD->getSQLGenericClass($sql, $arrayParam, "User", FALSE);
        return $user;
    }

}
