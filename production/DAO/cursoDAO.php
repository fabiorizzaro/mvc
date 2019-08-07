<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once '../DTO/cursoDTO.php';

/**
 * Description of cursoDAO
 *
 * @author QZ54GL
 */
class cursoDAO {

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

    function insert($cursoDTO) {


        try {

            $stmt = $this->pdo->prepare('INSERT INTO cursos(titulo) VALUES(:titulo)');

            $stmt->bindValue(":titulo", $cursoDTO->getNomeCurso());

            $stmt->execute();
            
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    
    function quicksearch($sql){
        
        $search = $this->pdo->query($sql);
        
        return $search;
    }


}
