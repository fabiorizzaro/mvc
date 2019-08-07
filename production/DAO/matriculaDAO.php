<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of matriculaDAO
 *
 * @author QZ54GL
 */
require_once '../DTO/matriculaDTO.php';

class matriculaDAO implements intefaceDAO {

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

    //put your code here
    public function deletar($key, $field) {
        
    }

    public function inserir($objectDTO) {

        try {

            $stmt = $this->pdo->prepare('INSERT INTO matricula(idUsuario, idCurso, dataMatricula, pagamentoEfetivado, numeroReferencia, ativo)'
                 . 'VALUES (:idUsuario, :idCurso, :dataMatricula, :pagamentoEfetivado, :numeroReferencia, :ativo)');


            $stmt->bindValue(":idUsuario", $objectDTO->getIdUsuario());
            $stmt->bindValue(":idCurso", $objectDTO->getIdCurso());
            $stmt->bindValue(":dataMatricula", $objectDTO->getDataMatricula());
            $stmt->bindValue(":pagamentoEfetivado", $objectDTO->getPagamentoEfetivado());
            $stmt->bindValue(":numeroReferencia", $objectDTO->getNumeroReferencia());
            $stmt->bindValue(":ativo", $objectDTO->getAtivo());


            $stmt->execute();
            
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function quickSearch($sql) {
        
        $search = $this->pdo->query($sql);
        
        return $search;
    }

    public function update($objectDTO) {
        
    }

}
