<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class UserModel extends Model {

    public function __construct() {
        parent::__construct();
    }

    /**
     * Insert Users
     * @return type
     */
    public function insert() {

        $functionError = FALSE;

        try {

            $sth = $this->db->prepare('INSERT INTO usuarios(fullname, rg, cpf, birthday, profession, degree, mobilePhone, homePhone,'
                    . 'businessPhone, email, address, number, complement, neighborhood, city, state, cep) '
                    . 'VALUES( :fullname, :rg, :cpf, :birthday, :profession, :degree, :mobilePhone, :homePhone,'
                    . ':businessPhone, :email, :address, :number, :complement, :neighborhood, :city, :state, :cep)');

            $sth->bindValue(":fullname", $_POST['fullName']);
            $sth->bindValue(":rg", $_POST['rg']);
            $sth->bindValue(":cpf", $_POST['cpf']);
            $sth->bindValue(":birthday", $_POST['birthDay']);
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

            $sth->execute();
        } catch (PDOException $e) {

            $functionError = TRUE;
            return $e->getMessage();
        }
        
        return $functionError;
    }

}
