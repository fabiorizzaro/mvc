<html>

    <head>

        <meta charset="UTF-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Instituto Alliqua</title>



        <!-- CSS External Files -->

        <link href="Bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>

        <link href="MainStyle.css" rel="stylesheet" type="text/css"/>



    </head>



    <body>
	
		<?php include_once("resources/analyticstracking.php") ?>

	<div id="fb-root"></div>

	<script>

		( function ( d, s, id ) {

			var js, fjs = d.getElementsByTagName( s )[ 0 ];

			if ( d.getElementById( id ) )

				return;

			js = d.createElement( s );

			js.id = id;

			js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.8";

			fjs.parentNode.insertBefore( js, fjs );

		}( document, 'script', 'facebook-jssdk' ) );

	</script>


        <div class="container">



            <div class="row">

                <div id="menuBar" class="col-lg-12">

                    <a href="http://alliqua.com.br"><img src="img/Logo_174x25.png"></a>

                </div>

                <br>         



            </div>



            <div class="row">



                <form id="subscribeForm">



                    <div class="col-lg-12">

                        <br>

                        <p class="text-center subscribeTitle">Formulário de Inscrição</p>

                        <br>

                        



                        <div class="row">

                            <div class="col-lg-12 ">

                                <p class="formTitle">Nome Completo</p>

                                <input type="text" id="nomeCompleto" name="nomeCompleto"  class="form-control formInput">

                            </div>

                        </div>



                        <div class="row">

                            <div class="col-lg-6">

                                <p class="formTitle">RG</p>

                                <input type="text" name="rg" data-mask="99.000.000-A" class="form-control formInput">

                            </div>

                            <div class="col-lg-6">

                                <p class="formTitle">CPF</p>

                                <input type="text" id="cpf" name="cpf" data-mask="999.999.999-99"class="form-control formInput">

                            </div>

                        </div>



                        <div class="row">

                            <div class="col-lg-4">

                                <p class="formTitle">Data Nascimento</p>

                                <input type="text" name="dataNasc" data-mask="00/00/0000" class="form-control formInput">

                            </div>

                            <div class="col-lg-4">

                                <p class="formTitle">Profissão</p>

                                <input type="text" name="profissao" class="form-control formInput">

                            </div>

                            <div class="col-lg-4">

                                <p class="formTitle">Escolaridade</p>

                                <input type="text" name="escolaridade" class="form-control formInput">

                            </div>

                        </div>



                        <div class="row">

                            <div class="col-lg-8">

                                <p class="formTitle">Email</p>

                                <input type="text" id="email" name="email" class="form-control formInput">

                            </div>

                        </div>



                        <div class="row">

                            <div class="col-lg-6">

                                <p class="formTitle">Telefone Fixo</p>

                                <input type="text" name="telFixo" data-mask="(00) 0000-0000" class="form-control formInput">

                            </div>

                            <div class="col-lg-6">

                                <p class="formTitle">Telefone Celular</p>

                                <input type="text" name="telCelular" data-mask="(00) 00000-0000"  class="form-control formInput">

                            </div>

                        </div>



                        <div class="row">

                            <div class="col-lg-10">

                                <p class="formTitle">Logradouro</p>

                                <input type="text" name="logradouro" class="form-control formInput">

                            </div>

                            <div class="col-lg-2">

                                <p class="formTitle">Numero</p>

                                <input type="text" name="numero" class="form-control formInput">

                            </div>

                        </div>



                        <div class="row">

                            <div class="col-lg-10">

                                <p class="formTitle">Complemento</p>

                                <input type="text" name="complemento" class="form-control formInput">

                            </div>

                        </div>



                        <div class="row">

                            <div class="col-lg-6">

                                <p class="formTitle">Bairro</p>

                                <input type="text" name="bairro" class="form-control formInput">

                            </div>

                            <div class="col-lg-6">

                                <p class="formTitle">Cidade</p>

                                <input type="text" name="cidade" class="form-control formInput">

                            </div>

                        </div>



                        <div class="row">

                            <div class="col-lg-4">

                                <p class="formTitle">CEP</p>

                                <input type="text" name="CEP" data-mask="00000-000"class="form-control formInput">

                            </div>

                        </div>



                        <div class="row">

                            <div class="col-lg-6">

                                <p class="formTitle">Curso</p>

                                <select id="curso" name="curso" class="form-control formInput">

                                    <option value="ECCB">Entre conversas, escritas e contagens: É brincando que se aprende.</option>

                                    <option value="PEB">Posso escolher brincar? Diversidade na formação com cantos.</option>

                                    <option value="ABEI">A arte e o brincar na educação infantil</option>

                                    <option value="SESI">AULÃO Processo Seletivo SESI (Aulas aos Sábados)</option>

                                </select>

                            </div>

                        </div>

                        <div class="row">

                            <div class="col-lg-6">

                                <p class="formTitle">Forma de Pagamento</p>

                                <input type="radio" name="payment" value="deposito" style=" font-family: 'Open Sans', sans-serif;" > Depósito Bancario<br>

                                <input type="radio" name="payment" value="boleto" style=" font-family: 'Open Sans', sans-serif;" > Boleto<br>

                            </div>

                        </div>

                        <div id="response" class="col-lg-12 text-center"></div>

                        <br>

                        <button class="button" onclick="subscribe();">Confirmar</button>

                        <br>

                        <br>

 				

                    </div>

                </form>

				

            </div>

        </div>





        <script>





            function subscribe() {

                event.preventDefault();



				var valorCurso;

				var dueDate;



                // Save data on database before continue.

                $.ajax({

                    type: 'POST',

                    url: 'subscribeProcessor.php',

                    data: $('#subscribeForm').serialize()



                })

                        .done(function (data, status) {





                        })



                        .fail(function (data) {



                            // just in case posting your form failed

                            $(window).scrollTop(0);

                            $('#response').html("<h1>Desculpe! Sua Inscrição não foi Recebida</h1>");

                            $('#response').append("<p id='courseDescription'> Por favor, tente novamente.");



                        });









                var paymentMode = $('input[name=payment]:checked').val();



                if (paymentMode == 'deposito') {





                    $('#response').append("<p class='subscribeTitle'>Inscrição Recebida com Sucesso</p>");

                    $('#response').append("<p class='subscribeText'> Parabéns por sua escolha. Em breve você recebera um e-mail com os dados bancários para pagamento.");



                } else {

					

					var cursoSelecionado = $('#curso option:selected').val();

					

					if(cursoSelecionado == "SESI"){

						valorCurso = 98,00

						dueDate = "27/07/2017"

					}else{

						valorCurso = 60,00

						dueDate = ""

					}







                    var formData = 'token=42189FC623CA189D33E2F07DEBC8CC5AC10FCD1801F4EA6F3F0A132F94C350C1'

                            + '&payerName=' + $('#nomeCompleto').val()

                            + '&payerEmail=' + $('#email').val()

                            + '&payerCpfCnpj=' + $('#cpf').val()

                            + '&description=' + $("#curso option:selected").text()

                            + '&dueDate=' + dueDate

                            + '&amount=' + valorCurso;



                    $.ajax({

                        type: 'POST',

                        url: 'https://www.boletobancario.com/boletofacil/integration/api/v1/issue-charge?',

                        data: formData,

                        dataType: 'json'

                    })

                            .done(function (data, status) {



                               

                                $('#response').append("<p class='subscribeTitle'>Inscrição Recebida com Sucesso</p>");

                                $('#response').append("<br><a  href=" + data.data.charges[0].link + " target='_blank'>Clique aqui para visualizar o boleto</a>");



                            })

                            .fail(function (data) {



                                

                                $('#response').html("<h1>Desculpe! Sua Inscrição não foi Recebida</h1>");

                                $('#response').append("<p id='courseDescription'> Por favor, tente novamente.");

                            });



                    // to prevent refreshing the whole page page

                    return false;

                }



            }





        </script>



    </body>



    <!-- Java Script External Files -->

    <script src="jQuery/jquery-3.1.0.js" type="text/javascript"></script>

    <script src="Bootstrap/js/bootstrap.js" type="text/javascript"></script>

    <script src="jQuery/jquery.mask.min.js" type="text/javascript"></script>



</html> 

