<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of matriculaDTO
 *
 * @author QZ54GL
 */
class matriculaDTO {
   
    private $idMatricula;
    private $idUsuario;
    private $idCurso;
    private $dataMatricula;
    private $pagamentoEfetivado;
    private $numeroReferencia;
    private $ativo;
    
    function getIdMatricula() {
        return $this->idMatricula;
    }

    function getIdUsuario() {
        return $this->idUsuario;
    }

    function getIdCurso() {
        return $this->idCurso;
    }

    function getDataMatricula() {
        return $this->dataMatricula;
    }

    function getPagamentoEfetivado() {
        return $this->pagamentoEfetivado;
    }

    function getNumeroReferencia() {
        return $this->numeroReferencia;
    }

    function getAtivo() {
        return $this->ativo;
    }

    function setIdMatricula($idMatricula) {
        $this->idMatricula = $idMatricula;
    }

    function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    function setIdCurso($idCurso) {
        $this->idCurso = $idCurso;
    }

    function setDataMatricula($dataMatricula) {
        $this->dataMatricula = $dataMatricula;
    }

    function setPagamentoEfetivado($pagamentoEfetivado) {
        $this->pagamentoEfetivado = $pagamentoEfetivado;
    }

    function setNumeroReferencia($numeroReferencia) {
        $this->numeroReferencia = $numeroReferencia;
    }

    function setAtivo($ativo) {
        $this->ativo = $ativo;
    }


    
    
    
}
