<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author QZ54GL
 */
class User {
    
    private $userId;
    private $fullName;
    private $rg;
    private $cpf;
    private $birthday;
    private $profession;
    private $degree;
    private $mobilePhone;
    private $homePhone;
    private $businessPhone;
    private $email;
    private $address;
    private $number;
    private $complement;
    private $neighborhood;
    private $city;
    private $state;
    private $cep;
    private $username;
    private $password;
    private $userType;
    private $accessLevel;
    private $active;
    
    public function getUserId() {
        return $this->userId;
    }

    public function getFullName() {
        return $this->fullName;
    }

    public function getRg() {
        return $this->rg;
    }

    public function getCpf() {
        return $this->cpf;
    }

    public function getBirthday() {
        return $this->birthday;
    }

    public function getProfession() {
        return $this->profession;
    }

    public function getDegree() {
        return $this->degree;
    }

    public function getMobilePhone() {
        return $this->mobilePhone;
    }

    public function getHomePhone() {
        return $this->homePhone;
    }

    public function getBusinessPhone() {
        return $this->businessPhone;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getAddress() {
        return $this->address;
    }

    public function getNumber() {
        return $this->number;
    }

    public function getComplement() {
        return $this->complement;
    }

    public function getNeighborhood() {
        return $this->neighborhood;
    }

    public function getCity() {
        return $this->city;
    }

    public function getState() {
        return $this->state;
    }

    public function getCep() {
        return $this->cep;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getUserType() {
        return $this->userType;
    }

    public function getAccessLevel() {
        return $this->accessLevel;
    }

    public function getActive() {
        return $this->active;
    }

    public function setUserId($userId) {
        $this->userId = $userId;
    }

    public function setFullName($fullName) {
        $this->fullName = $fullName;
    }

    public function setRg($rg) {
        $this->rg = $rg;
    }

    public function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    public function setBirthday($birthday) {
        $this->birthday = $birthday;
    }

    public function setProfession($profession) {
        $this->profession = $profession;
    }

    public function setDegree($degree) {
        $this->degree = $degree;
    }

    public function setMobilePhone($mobilePhone) {
        $this->mobilePhone = $mobilePhone;
    }

    public function setHomePhone($homePhone) {
        $this->homePhone = $homePhone;
    }

    public function setBusinessPhone($businessPhone) {
        $this->businessPhone = $businessPhone;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

    public function setNumber($number) {
        $this->number = $number;
    }

    public function setComplement($complement) {
        $this->complement = $complement;
    }

    public function setNeighborhood($neighborhood) {
        $this->neighborhood = $neighborhood;
    }

    public function setCity($city) {
        $this->city = $city;
    }

    public function setState($state) {
        $this->state = $state;
    }

    public function setCep($cep) {
        $this->cep = $cep;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function setUserType($userType) {
        $this->userType = $userType;
    }

    public function setAccessLevel($accessLevel) {
        $this->accessLevel = $accessLevel;
    }

    public function setActive($active) {
        $this->active = $active;
    }




}
