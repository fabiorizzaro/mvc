<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // A sessão precisa ser iniciada em cada página diferente
        if (!isset($_SESSION))
            session_start();

        // Verifica se não há a variável da sessão que identifica o usuário
        if (!isset($_SESSION['nomeUsuario'])) {
            // Destrói a sessão por segurança
            session_destroy();
            // Redireciona o visitante de volta pro login
            header("Location: index.php");
            exit;
        }
        ?>


        <h1>Página restrita</h1>
        <p>Olá, <?php echo $_SESSION['nomeUsuario']; ?>!</p>
        
    </body>


</html>
