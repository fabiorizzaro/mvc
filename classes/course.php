<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Course
 *
 * @author QZ54GL
 */
class course {

//    private $courseId;
//    private $status;
//    private $title;
//    private $shortDescription;
//    private $smallPicture;
//    private $longDescription;
//    private $largePicture;
//    private $subscribeStartDate;
//    private $subscribeEndDate;
//    private $homeDisplay;
//    private $displayPosition;
//    private $dateTimeDesc;
//    private $loadTimeDesc;
//    private $materialDesc;
//    private $targetDesc;
//    private $addressDesc;
//    private $paymentMethodDesc;
//    private $teachersDesc;
//    private $price;
//    private $acceptBoleto;
//    private $installmentsBoleto;
//    private $acceptCreditCard;
//    private $installmentsCreditCard;
//    private $acceptMoney;
//    private $acceptTransfer;
//    private $acceptDeposit;

    private $courseId;
    private $showHomePage;
    private $homePosition;
    private $courseActive;
    private $courseName;
    private $shortDescription;
    private $longDescription;
    private $smallPicture;
    private $largePicture;
    private $subscribeStartDate;
    private $subscribeEndDate;
    private $coursePrice;
    private $tab1Name;
    private $tab1Active;
    private $tab1Content;
    private $tab2Name;
    private $tab2Active;
    private $tab2Content;
    private $tab3Name;
    private $tab3Active;
    private $tab3Content;
    private $tab4Name;
    private $tab4Active;
    private $tab4Content;
    private $tab5Name;
    private $tab5Active;
    private $tab5Content;

    
    public function getCourseId() {
        return $this->courseId;
    }

    public function getShowHomePage() {
        return $this->showHomePage;
    }

    public function getHomePosition() {
        return $this->homePosition;
    }

    public function getCourseActive() {
        return $this->courseActive;
    }

    public function getCourseName() {
        return $this->courseName;
    }

    public function getShortDescription() {
        return $this->shortDescription;
    }

    public function getLongDescription() {
        return $this->longDescription;
    }

    public function getSmallPicture() {
        return $this->smallPicture;
    }

    public function getLargePicture() {
        return $this->largePicture;
    }

    public function getSubscribeStartDate() {
        return $this->subscribeStartDate;
    }

    public function getSubscribeEndDate() {
        return $this->subscribeEndDate;
    }

    public function getCoursePrice() {
        return $this->coursePrice;
    }

    public function getTab1Name() {
        return $this->tab1Name;
    }

    public function getTab1Active() {
        return $this->tab1Active;
    }

    public function getTab1Content() {
        return $this->tab1Content;
    }

    public function getTab2Name() {
        return $this->tab2Name;
    }

    public function getTab2Active() {
        return $this->tab2Active;
    }

    public function getTab2Content() {
        return $this->tab2Content;
    }

    public function getTab3Name() {
        return $this->tab3Name;
    }

    public function getTab3Active() {
        return $this->tab3Active;
    }

    public function getTab3Content() {
        return $this->tab3Content;
    }

    public function getTab4Name() {
        return $this->tab4Name;
    }

    public function getTab4Active() {
        return $this->tab4Active;
    }

    public function getTab4Content() {
        return $this->tab4Content;
    }

    public function getTab5Name() {
        return $this->tab5Name;
    }

    public function getTab5Active() {
        return $this->tab5Active;
    }

    public function getTab5Content() {
        return $this->tab5Content;
    }

    public function setCourseId($courseId) {
        $this->courseId = $courseId;
    }

    public function setShowHomePage($showHomePage) {
        $this->showHomePage = $showHomePage;
    }

    public function setHomePosition($homePosition) {
        $this->homePosition = $homePosition;
    }

    public function setCourseActive($courseActive) {
        $this->courseActive = $courseActive;
    }

    public function setCourseName($courseName) {
        $this->courseName = $courseName;
    }

    public function setShortDescription($shortDescription) {
        $this->shortDescription = $shortDescription;
    }

    public function setLongDescription($longDescription) {
        $this->longDescription = $longDescription;
    }

    public function setSmallPicture($smallPicture) {
        $this->smallPicture = $smallPicture;
    }

    public function setLargePicture($largePicture) {
        $this->largePicture = $largePicture;
    }

    public function setSubscribeStartDate($subscribeStartDate) {
        $this->subscribeStartDate = $subscribeStartDate;
    }

    public function setSubscribeEndDate($subscribeEndDate) {
        $this->subscribeEndDate = $subscribeEndDate;
    }

    public function setCoursePrice($coursePrice) {
        $this->coursePrice = $coursePrice;
    }

    public function setTab1Name($tab1Name) {
        $this->tab1Name = $tab1Name;
    }

    public function setTab1Active($tab1Active) {
        $this->tab1Active = $tab1Active;
    }

    public function setTab1Content($tab1Content) {
        $this->tab1Content = $tab1Content;
    }

    public function setTab2Name($tab2Name) {
        $this->tab2Name = $tab2Name;
    }

    public function setTab2Active($tab2Active) {
        $this->tab2Active = $tab2Active;
    }

    public function setTab2Content($tab2Content) {
        $this->tab2Content = $tab2Content;
    }

    public function setTab3Name($tab3Name) {
        $this->tab3Name = $tab3Name;
    }

    public function setTab3Active($tab3Active) {
        $this->tab3Active = $tab3Active;
    }

    public function setTab3Content($tab3Content) {
        $this->tab3Content = $tab3Content;
    }

    public function setTab4Name($tab4Name) {
        $this->tab4Name = $tab4Name;
    }

    public function setTab4Active($tab4Active) {
        $this->tab4Active = $tab4Active;
    }

    public function setTab4Content($tab4Content) {
        $this->tab4Content = $tab4Content;
    }

    public function setTab5Name($tab5Name) {
        $this->tab5Name = $tab5Name;
    }

    public function setTab5Active($tab5Active) {
        $this->tab5Active = $tab5Active;
    }

    public function setTab5Content($tab5Content) {
        $this->tab5Content = $tab5Content;
    }



}
