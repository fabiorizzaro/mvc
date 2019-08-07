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
        
        <!-- Facebook Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,'script',
  'https://connect.facebook.net/en_US/fbevents.js');
  fbq('init', '222351688319261');
  fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=222351688319261&ev=PageView&noscript=1"
/></noscript>
<!-- End Facebook Pixel Code -->
        
 <script>
  fbq('track', 'Purchase', {
    value: 10.00,
  });
</script>
    </head>
    <body>
        <?php include_once("resources/analyticstracking.php") ?>

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



                        <br>



                        <span style="font-size: 14px; color: red; font-weight: bold" >Confirmação de matrícula:</span> <br>
                        <br/>
                        <span style="font-size: 13px"><strong>Pagamentos em cheque:</strong> A inscrição será confirmada após o depósito de 50% do valor.<br/>
                            O depósito deve ocorrer em até 24 após a inscrição.<br/>
                            O comprovante de deposito devera ser enviado para institutoAlliqua@gmail.com <br/>
                            <u>Dados para depósito:</u><br/>
                            Banco Santander <br/>
                            Ag: 2130<br/>
                            C/C: 01007679-2<br/>
                            Favorecido: Karina Suelen Pereira</span><br/><br/>



                        <span style="font-size: 13px"><strong>Pagamentos com cartão de crédito:</strong> A inscrição será confirmada após aprovação <br/> 
                            da operadora do cartão de crédito.<br/>


                            
                          
                    </div>


                    <a href="index.php"><p style="padding: 20px; text-align: center; background-color: #333; color: #fff; margin-top: 20px;">Votar</p></a>

                </div>
            </div>



        </div>


    </body>
</html>
