<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'intefaceDAO.php';
require_once '../DTO/usuarioDTO.php';

/**
 * Description of usuarioDAO
 *
 * @author QZ54GL
 */
class usuarioDAO implements intefaceDAO {

    private $pdo;
    private $DTO;
    private $db_user = 'alliqua';
    private $db_pass = 'kids1234';
    private $db_host = 'mysql873.umbler.com';
    private $db_schema = 'alliqua';

    function __construct() {

        $this->pdo = new PDO('mysql:host=' . $this->db_host . ';dbname=' . $this->db_schema, $this->db_user, $this->db_pass, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function inserir($objectDTO) {

        try {


            $stmt = $this->pdo->prepare('INSERT INTO usuarios'
                    . '(nomeCompleto,rg,cpf,dataNascimento,profissao,escolaridade,telefone1,telefone2,telefone3,telefone4,'
                    . 'email,logradouro,numero,complemento,bairro,cidade,estado,cep,nomeUsuario,senha,tipoUsuario,nivelAcesso,ativo)'
                    . 'VALUES (:nomeCompleto,:rg,:cpf,:dataNascimento,:profissao,:escolaridade,:telefone1,:telefone2,:telefone3,:telefone4,'
                    . ':email,:logradouro,:numero,:complemento,:bairro,:cidade,:estado,:cep,:nomeUsuario,:senha,:tipoUsuario,:nivelAcesso,:ativo)');


            $stmt->bindValue(":nomeCompleto", $objectDTO->getNomeCompleto());
            $stmt->bindValue(":rg", $objectDTO->getRg());
            $stmt->bindValue(":cpf", $objectDTO->getCpf());
            $stmt->bindValue(":dataNascimento", $objectDTO->getDataNascimento());
            $stmt->bindValue(":profissao", $objectDTO->getProfissao());
            $stmt->bindValue(":escolaridade", $objectDTO->getEscolaridade());
            $stmt->bindValue(":telefone1", $objectDTO->getTelefone01());
            $stmt->bindValue(":telefone2", $objectDTO->getTelefone02());
            $stmt->bindValue(":telefone3", $objectDTO->getTelefone03());
            $stmt->bindValue(":telefone4", $objectDTO->getTelefone04());
            $stmt->bindValue(":email", $objectDTO->getEmail());
            $stmt->bindValue(":logradouro", $objectDTO->getLogradouro());
            $stmt->bindValue(":numero", $objectDTO->getNumero());
            $stmt->bindValue(":complemento", $objectDTO->getComplemento());
            $stmt->bindValue(":bairro", $objectDTO->getBairro());
            $stmt->bindValue(":cidade", $objectDTO->getCidade());
            $stmt->bindValue(":estado", $objectDTO->getEstado());
            $stmt->bindValue(":cep", $objectDTO->getCEP());
            $stmt->bindValue(":nomeUsuario", $objectDTO->getNomeUsuario());
            $stmt->bindValue(":senha", $objectDTO->getSenha());
            $stmt->bindValue(":tipoUsuario", $objectDTO->getTipoUsuario());
            $stmt->bindValue(":nivelAcesso", $objectDTO->getNivelAcesso());
            $stmt->bindValue(":ativo", $objectDTO->getAtivo());


            $stmt->execute();
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function checkLogin($objectDTO) {

        try {

            $stmt = $this->pdo->prepare("SELECT nomeUsuario, senha, nivelAcesso FROM usuarios where nomeUsuario = :nomeUsuario AND senha = :senha AND ativo = 1 LIMIT 1");

            $stmt->bindValue(":nomeUsuario", $objectDTO->getNomeUsuario());
            $stmt->bindValue(":senha", $objectDTO->getSenha());

            $stmt->execute();

            return $stmt;
        } catch (PDOException $ex) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function quicksearch($sql) {

        $search = $this->pdo->query($sql);

        return $search;
    }

    function getIdUsuario($cpf) {

        $stmt = $this->pdo->prepare("SELECT idUsuario FROM usuarios WHERE cpf = :cpf");

        $stmt->bindValue(":cpf", $cpf);

        $stmt->execute();

        $idUsuario = $stmt->fetchColumn();

        return $idUsuario;
    }

    public function deletar($key, $field) {
        
    }

    public function update($objectDTO) {
        
    }

}
