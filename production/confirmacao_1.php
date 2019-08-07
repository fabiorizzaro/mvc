<?php
session_start();
?>
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
        <link href="Bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>


        <style>

            .nav-bar{
                background-color: #333;
                height: 70px;
                color: #fff;
            }
            
            .info{
                
                font-size: 10px;
                
            }

        </style>
    </head>
    <body>


        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 nav-bar">
                    <div style="position:relative;width:980px; margin: 0 auto; color: #fff; top:20px; ">
                        <a href="index.html"><img src="img/Logo_174x25.png"> </a>
                    </div>

                </div>
            </div>
        </div>

        <div class="container">

            <div class="row">
                <div class="col-lg-offset-3 col-lg-6">
                    
                    

                    <div align="center" style="margin-top:  50px; background-color: #c9e2b3; padding: 20px; color: #fff">
                        <span style="font-family: sans-serif; font-size: 22px;"> Parabéns, <?php if (!empty($_SESSION)) echo $_SESSION["nome"]; ?></span>
                    </div>
                   


                    <div style="margin-top: 10px;">


                        <span style="font-family: sans-serif; font-size: 16px;"> Sua incrição para o curso 
                            <?php if (!empty($_SESSION)) echo $_SESSION["curso"]; ?> foi recebida com sucesso!</span> <br>



                        <a href="<?php if (!empty($_SESSION)) echo $_SESSION["link"]; ?>">Clique aqui para emitir o seu boleto</a>

                        <br>
                        
                        
                        <p class="info">Informações Importantes<p>

                            <span class="info">Confirmação de matrícula:</span> <br>
                            <span class="info">Boleto bancário: Após pagamento.</span><br>
                            <span class="info"> Depósito bancario: Após envio do comprovante de depósito para institutoAlliqua@gmail.com</span>
                       
                    </div>
                    
                    
                    <a href="index.php"><p style="padding: 20px; text-align: center; background-color: #333; color: #fff; margin-top: 20px;">Votar</p></a>

                </div>
            </div>



        </div>


    </body>
</html>
