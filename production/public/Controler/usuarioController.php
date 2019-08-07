<?php

require_once '../DAO/usuarioDAO.php';
require_once '../DTO/usuarioDTO.php';

//******************************************************************************
//************************ VARIAVEIS GLOBAIS ***********************************
//******************************************************************************

$db = new usuarioDAO();
$objectDTO = new usuarioDTO();

//******************************************************************************
//************************** LOGICA DE LOGIN ***********************************
//******************************************************************************

if (!empty($_GET) AND $_GET['action'] == "login") {
    
    if (!empty($_POST) AND ( empty($_POST['nomeUsuario']) OR empty($_POST['senha']))) {
        header("Location: ../index.php");
        exit;
    }

    $objectDTO->setNomeUsuario($_POST['nomeUsuario']);
    $objectDTO->setSenha($_POST['senha']);

    $resultado = $db->checkLogin($objectDTO);

    if ($resultado->rowCount() == 1) {



        // Se a sessão não existir, inicia uma
        if (!isset($_SESSION))
            session_start();


        while ($linha = $resultado->fetch(PDO::FETCH_ASSOC)) {

            $_SESSION['nomeUsuario'] = $linha['nomeUsuario'];
            $_SESSION['senha'] = $linha['senha'];
            $_SESSION['nivelAcesso'] = $linha['nivelAcesso'];
        }

        switch ($_SESSION['nivelAcesso']) {

            case 1:
                header("Location: ../restrito.php");
                break;
            case 2:
                header("Location: ../restrito2.php");
                break;
            case 3:
                header("Location: ../restrito3.php");
                break;
        }
    } else {
        header("Location: ../login.html?msg=erro");
    }
}

//******************************************************************************
//******************************INSCRIÇÃO***************************************
//******************************************************************************

/*
  tblStudents = $db->quicksearch($_POST["query"]);


  while ($linha = $tblStudents->fetch(PDO::FETCH_ASSOC)) {
  echo "Nome: {$linha['nomeCompleto']} - Nome: {$linha['curso']} - Celular {$linha['telCelular']} - Pagamento {$linha['pagamento']}<br/>";
  }
 */



// Essa função será usada no controle de inscrição 
function getDatetimeNow() {
    $tz_object = new DateTimeZone('Brazil/East');
    //date_default_timezone_set('Brazil/East');

    $datetime = new DateTime();
    $datetime->setTimezone($tz_object);

    return $datetime->format('Y\-m\-d\ h:i:s');
}
