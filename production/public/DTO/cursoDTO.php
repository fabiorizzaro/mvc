<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of cursoDTO
 *
 * @author QZ54GL
 */
class cursoDTO {
    //put your code here
    
    private $idCurso;
    private $nomeCurso;
    private $fimPrazoInscricao;
    private $valor;
   
    function getIdCurso() {
        return $this->idCurso;
    }

    function getNomeCurso() {
        return $this->nomeCurso;
    }

    function getFimPrazoInscricao() {
        return $this->fimPrazoInscricao;
    }

    function getValor() {
        return $this->valor;
    }

    function setIdCurso($idCurso) {
        $this->idCurso = $idCurso;
    }

    function setNomeCurso($nomeCurso) {
        $this->nomeCurso = $nomeCurso;
    }

    function setFimPrazoInscricao($fimPrazoInscricao) {
        $this->fimPrazoInscricao = $fimPrazoInscricao;
    }

    function setValor($valor) {
        $this->valor = $valor;
    }



}
