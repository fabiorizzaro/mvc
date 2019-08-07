<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of usuarioDTO
 *
 * @author QZ54GL
 */
class usuarioDTO {
  
    private $idUsuario;
    private $nomeCompleto;
    private $rg;
    private $cpf;
    private $dataNascimento;
    private $profissao;
    private $escolaridade;
    private $telefone01;
    private $telefone02;
    private $telefone03;
    private $telefone04;
    private $email;
    private $logradouro;
    private $numero;
    private $complemento;
    private $bairro;
    private $cidade;
    private $estado;
    private $CEP;
    
    //************************
    
    private $tipoUsuario;       // A = Administrator T = Tutor U = Usuario 
    private $nomeUsuario;
    private $senha;
    private $nivelAcesso;
    private $ativo;             //boolean 1=Ativo 0=Inativo
        
    //************************
    
    function getIdUsuario() {
        return $this->idUsuario;
    }

    function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }
  
    function getNomeCompleto() {
        return $this->nomeCompleto;
    }

    function getRg() {
        return $this->rg;
    }

    function getCpf() {
        return $this->cpf;
    }

    function getDataNascimento() {
        return $this->dataNascimento;
    }

    function getProfissao() {
        return $this->profissao;
    }

    function getEscolaridade() {
        return $this->escolaridade;
    }

    function getTelefone01() {
        return $this->telefone01;
    }

    function getTelefone02() {
        return $this->telefone02;
    }

    function getTelefone03() {
        return $this->telefone03;
    }

    function getTelefone04() {
        return $this->telefone04;
    }

    function getEmail() {
        return $this->email;
    }

    function getLogradouro() {
        return $this->logradouro;
    }

    function getNumero() {
        return $this->numero;
    }

    function getComplemento() {
        return $this->complemento;
    }

    function getBairro() {
        return $this->bairro;
    }

    function getCidade() {
        return $this->cidade;
    }

    function getEstado() {
        return $this->estado;
    }

    function getCEP() {
        return $this->CEP;
    }

    function getTipoUsuario() {
        return $this->tipoUsuario;
    }

    function getNomeUsuario() {
        return $this->nomeUsuario;
    }

    function getSenha() {
        return $this->senha;
    }

    function getNivelAcesso() {
        return $this->nivelAcesso;
    }

    function getAtivo() {
        return $this->ativo;
    }

    function setNomeCompleto($nomeCompleto) {
        $this->nomeCompleto = $nomeCompleto;
    }

    function setRg($rg) {
        $this->rg = $rg;
    }

    function setCpf($cpf) {
        $this->cpf = $cpf;
    }

    function setDataNascimento($dataNascimento) {
        $this->dataNascimento = $dataNascimento;
    }

    function setProfissao($profissao) {
        $this->profissao = $profissao;
    }

    function setEscolaridade($escolaridade) {
        $this->escolaridade = $escolaridade;
    }

    function setTelefone01($telefone01) {
        $this->telefone01 = $telefone01;
    }

    function setTelefone02($telefone02) {
        $this->telefone02 = $telefone02;
    }

    function setTelefone03($telefone03) {
        $this->telefone03 = $telefone03;
    }

    function setTelefone04($telefone04) {
        $this->telefone04 = $telefone04;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setLogradouro($logradouro) {
        $this->logradouro = $logradouro;
    }

    function setNumero($numero) {
        $this->numero = $numero;
    }

    function setComplemento($complemento) {
        $this->complemento = $complemento;
    }

    function setBairro($bairro) {
        $this->bairro = $bairro;
    }

    function setCidade($cidade) {
        $this->cidade = $cidade;
    }

    function setEstado($estado) {
        $this->estado = $estado;
    }

    function setCEP($CEP) {
        $this->CEP = $CEP;
    }

    function setTipoUsuario($tipoUsuario) {
        $this->tipoUsuario = $tipoUsuario;
    }

    function setNomeUsuario($nomeUsuario) {
        $this->nomeUsuario = $nomeUsuario;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function setNivelAcesso($nivelAcesso) {
        $this->nivelAcesso = $nivelAcesso;
    }

    function setAtivo($ativo) {
        $this->ativo = $ativo;
    }
   
    
}
