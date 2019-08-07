<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once '../DAO/cursoDAO.php';
require_once '../DTO/cursoDTO.php';

$curso = new cursoDTO();
$db = new cursoDAO();

//$curso->setTitulo("Meu 4 Curso");
//$db->insert($curso);

$tblStudents = $db->quicksearch($_POST["query"]);


while ($linha = $tblStudents->fetch(PDO::FETCH_ASSOC)) {
    echo "Nome: {$linha['nomeCompleto']} - Nome: {$linha['curso']} - Celular {$linha['telcelular']} <br/>";
}
