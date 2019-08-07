<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

date_default_timezone_set('America/Sao_Paulo');

require_once '../DAO/usuarioDAO.php';
require_once '../DTO/usuarioDTO.php';
require_once '../DAO/cursoDAO.php';
require_once '../DTO/cursoDTO.php';
require_once '../DTO/matriculaDTO.php';
require_once '../DAO/matriculaDAO.php';

require_once '../Support/boletoFacil.php';

//******************************************************************************
//************************ VARIAVEIS GLOBAIS ***********************************
//******************************************************************************

$usuarioDAO = new usuarioDAO();
$usuarioDTO = new usuarioDTO();
$cursoDTO = new cursoDTO();
$cursoDAO = new cursoDAO();

$debug = 1;

//TO DO
//INICIALIZA USUARIO DTO

function debug_to_console($data) {
    $output = $data;
    if (is_array($output)) {
        $output = implode(',', $output);
    }
    echo "<script>console.log( 'Debug Objects: " . $output . "' );</script>";
}

function matricula($usuarioDTO, $cursoDTO) {

    $date = date("d-m-Y");


    $matriculaDTO = new matriculaDTO();
    $matriculaDAO = new matriculaDAO();

    $matriculaDTO->setIdUsuario($usuarioDTO->getIdUsuario());
    $matriculaDTO->setIdCurso($cursoDTO->getIdCurso());
    $matriculaDTO->setDataMatricula(date("d-m-Y H:i:s"));
    //$matriculaDTO->setDataMatricula($dataMatricula) Função para pegar data
    $matriculaDTO->setPagamentoEfetivado($_POST['formaPagamento']);
    
    $matricula = $matriculaDAO->quickSearch("SELECT * FROM matricula WHERE idUsuario=" . $matriculaDTO->getIdUsuario() .
            " AND idCurso=" . $matriculaDTO->getIdCurso());

    if ($matricula->rowCount() >= 1) { //USUARIO JÁ MATRICULADO
//*******************************************Usuário não Matriculado****************************************************
        header("Location: ../inscricaoEfetuada.php");
    } else {

        $matriculaDAO->inserir($matriculaDTO);

        $dataVencimento = DateTime::createFromFormat("d-m-Y", $date);
        $dataVencimento->modify('+1 day');
        $datafinal = $dataVencimento->format('d/m/Y');

        if ($_POST['formaPagamento'] == 'boleto') {


            $boleto = new boletoFacil();
            $boleto->setDescription($cursoDTO->getNomeCurso());
            $boleto->setPayerName($usuarioDTO->getNomeCompleto());
            $boleto->setPayerCpfCnpj($usuarioDTO->getCPF());
            $boleto->setDueDate($datafinal);
            $boleto->setPayerEmail($usuarioDTO->getEmail());

            $boleto->setInstallments($_POST['parcelasBoleto']);

            if ($_POST['parcelasBoleto'] == 2) {
                $boleto->setAmount("340.00");
            } else {
                $boleto->setAmount("630.00");
            }

            $datajson = json_decode($boleto->gerarBoleto(), TRUE);

            if ($datajson['success']) {

                session_start(); // Inicia sessão que será envida para a página de confirmação

                $_SESSION['nome'] = $usuarioDTO->getNomeCompleto();
                $_SESSION['curso'] = $cursoDTO->getNomeCurso();
                $_SESSION['code'] = $datajson['data']['charges']['0']['code'];
                $_SESSION['dueDate'] = $datajson['data']['charges']['0']['dueDate'];
                $_SESSION['checkoutUrl'] = $datajson['data']['charges']['0']['checkoutUrl'];
                $_SESSION['link'] = $datajson['data']['charges']['0']['link'];
                $_SESSION['payNumber'] = $datajson['data']['charges']['0']['payNumber'];

                header("Location: ../confirmacao.php");
            } else {

                echo $datajson['errorMessage'];
            }
        }

        if ($_POST['formaPagamento'] == 'cheque') {

            //********************Envia E-Mail************************
            $to = $usuarioDTO->getEmail();
            $subject = "Instituto Alliqua - Confirmação de Inscrição";
            $htmlContent = file_get_contents("../eMail/mail.html");
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= 'From: Contato<contato@alliqua.com.br>' . "\r\n";
            mail($to, $subject, $htmlContent, $headers);
            //********************Envia E-Mail************************
            
            header("Location: ../confirmacao.php");
        }

        if ($_POST['formaPagamento'] == 'cartao') {

            $parameters = array(
                'currency' => 'BRL',
                'receiverEmail' => 'fabio.rizzaro@gmail.com',
                'itemId1' => '0001',
                'itemDescription1' => $cursoDTO->getNomeCurso(),
                'itemAmount1' => $cursoDTO->getValor(),
                'itemQuantity1' => '0001',
                'reference' => $usuarioDTO->getCpf(),
                'senderName' => $usuarioDTO->getNomeCompleto(),
                'senderEmail' => $usuarioDTO->getEmail(),
                'shippingAddressPostalCode' => $usuarioDTO->getCEP(),
                'shippingAddressNumber' => $usuarioDTO->getNumero(),
                'encoding' => 'UTF-8'
            );

            //********************Envia E-Mail************************
            $to = $usuarioDTO->getEmail();
            $subject = "Instituto Alliqua - Confirmação de Inscrição";
            $htmlContent = file_get_contents("../eMail/mail.html");
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= 'From: Contato<contato@alliqua.com.br>' . "\r\n";
            mail($to, $subject, $htmlContent, $headers);
            //********************Envia E-Mail************************
            
            $url = "https://pagseguro.uol.com.br/v2/checkout/payment.html";

            header("Location: " . $url . "?" . http_build_query($parameters));
        }
    }
}

//******************************************************************************
//********************************INSCRIÇÃO*************************************
//******************************************************************************


if (!empty($_GET) AND $_GET['action'] == "inscricao") {


    //CARREGA USUARIO DTO
    $usuarioDTO->setNomeCompleto($_POST['nomeCompleto']);
    $usuarioDTO->setRg($_POST['rg']);
    $usuarioDTO->setCpf(str_replace(array('-', '.'), '', $_POST['cpf']));
    $usuarioDTO->setDataNascimento($_POST['dataNascimento']);
    $usuarioDTO->setProfissao($_POST['profissao']);
    $usuarioDTO->setEscolaridade($_POST['escolaridade']);
    $usuarioDTO->setTelefone01($_POST['telefone01']);
    $usuarioDTO->setTelefone02($_POST['telefone02']);
    //$usuarioDTO->setTelefone03($_POST['telefone03']);
    //$usuarioDTO->setTelefone04($_POST['telefone04']);
    $usuarioDTO->setEmail($_POST['email']);
    $usuarioDTO->setLogradouro($_POST['logradouro']);
    $usuarioDTO->setNumero($_POST['numero']);
    $usuarioDTO->setComplemento($_POST['complemento']);
    $usuarioDTO->setBairro($_POST['bairro']);
    $usuarioDTO->setCidade($_POST['cidade']);
    $usuarioDTO->setEstado($_POST['uf']);
    $usuarioDTO->setCEP(str_replace(array('-', '.'), '', $_POST['cep']));


    //*********************CARREGA CURSO DTO***********************************

    $cursoDTO->setIdCurso($_POST['curso']);

    $result = $cursoDAO->quicksearch("SELECT * FROM cursos WHERE idCurso =" . $_POST['curso']);

    foreach ($result->fetchAll() as $curso) {

        $cursoDTO->setNomeCurso($curso['nomeCurso']);
        $cursoDTO->setValor($curso['valor']);
    }

    //VERIFICA SE USUARIO JÁ EXISTE COM BASE NO CPF

    $resultado = $usuarioDAO->quicksearch("SELECT * FROM usuarios WHERE cpf = " . $usuarioDTO->getCpf());


    if ($resultado->rowCount() == 1) { // USUARIO JÁ CADASTRADO
        if ($debug) {
            debug_to_console("Usuário já cadastrado!");
        }


        /*
         * Reescrever a função getCpf()
         * 
         * getSearchByField($field, $value)
         */

        $usuarioDTO->setIdUsuario($usuarioDAO->getIdUsuario($usuarioDTO->getCpf()));
        matricula($usuarioDTO, $cursoDTO);
    } else { // USUÁRIO NÃO CADASTRADO
        $usuarioDAO->inserir($usuarioDTO);
        $usuarioDTO->setIdUsuario($usuarioDAO->getIdUsuario($usuarioDTO->getCpf()));

        matricula($usuarioDTO, $cursoDTO);
    }
}

