<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Session {

    public static function Init() {
        @session_start();
    }

    public static function Set($key, $value) {
        $_SESSION[$key] = $value;
    }

    public static function Get($key) {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        }
    }

    public static function Destroy() {
//        unset
        session_destroy();
    }

}
