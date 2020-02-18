<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Instituto Alliqua</title>

        <!-- CSS External Files -->
        <link href="Bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="Resources/css/menu.css" rel="stylesheet" type="text/css"/>

        <style>

            .error{
                color: #ff6666;
            }

            .form-secao{

                font-family: 'Roboto Condensed', sans-serif;
                font-size: 1.5em;
                background-color: #00ABEB !important;
                padding-left: 10px;
                color: #ffffff;

            }

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
        <?php include_once("resources/analyticstracking.php") ?>
        <!--*************************************************************************-->
        <!--*********************Java Script External Files**************************-->
        <!--*************************************************************************-->

        <script src="jQuery/jquery-3.1.0.js" type="text/javascript"></script>
        <script src="jQuery/jquery.validate.min.js" type="text/javascript"></script>
        <script src="jQuery/additional-methods.min.js" type="text/javascript"></script>
        <script src="Bootstrap/js/bootstrap.js" type="text/javascript"></script>
        <script src="Resources/js/menu.js" type="text/javascript"></script>


        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 nav-bar">
                    <div style="position:relative;width:980px; margin: 0 auto; color: #fff; top:20px; ">
                        <a href="http://alliqua.com.br"><img src="img/Logo_174x25.png"> </a>
                    </div>

                </div>
            </div>
        </div>

        <br><br>

        <div class="container" >

            <div class="row">

                <div class="col-lg-offset-3 col-lg-6">

                    <form name="registration" action="controler/inscricaoController.php?action=inscricao" method="POST">

                        <!--*************************************************************************-->
                        <!--****************************DADOS PESSOAIS********************************-->
                        <!--*************************************************************************--> 

                        <p class="form-secao">DADOS PESSOAIS</p>


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
                                <input type="text" name="dataNascimento" data-mask="00/00/0000" class="form-control formInput">
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
                                <input type="text" name="telefone01" data-mask="(00) 0000-0000" class="form-control formInput">
                            </div>
                            <div class="col-lg-6">
                                <p class="formTitle">Telefone Celular</p>
                                <input type="text" name="telefone02" data-mask="(00) 00000-0000"  class="form-control formInput">
                            </div>
                        </div>
                        <br>

                        <!--*************************************************************************-->
                        <!--*******************************ENDEREÇO**********************************-->
                        <!--*************************************************************************--> 

                        <p class="form-secao">ENDEREÇO</p>

                        <div class="row">
                            <div class="col-lg-4">
                                <p class="formTitle">CEP</p>
                                <input type="text" name="cep" id="cep" data-mask="00000-000" class="form-control formInput">
                            </div>
                        </div>

                        <div class="row" class="address">
                            <div class="col-lg-10">
                                <p class="formTitle">Logradouro</p>
                                <input type="text" name="logradouro" id="logradouro" class="form-control formInput">
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
                            <div class="col-lg-5">
                                <p class="formTitle">Bairro</p>
                                <input type="text" name="bairro" id="bairro" class="form-control formInput">
                            </div>
                            <div class="col-lg-5">
                                <p class="formTitle">Cidade</p>
                                <input type="text" name="cidade" id="cidade" class="form-control formInput">
                            </div>
                            <div class="col-lg-2">
                                <p class="formTitle">Estado</p>
                                <input type="text" name="uf" id="uf" class="form-control formInput">
                            </div>
                        </div>
                        <br>

                        <!--*************************************************************************-->
                        <!--*********************CURSO E FORMA DE PAGAMENTO**************************-->
                        <!--*************************************************************************-->                        

                        <p class="form-secao">CURSO & PAGAMENTO</p>


                        <div class="row">
                            <div class="col-lg-12">
                                <p class="formTitle">Curso</p>
                                <select id="curso" name="curso" class="form-control formInput">
                                    <option value="13">Preparatório Concurso Guararema - Professor Educação Infantil</option>
                                    
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <br>

                                <p class="formTitle">Forma de Pagamento</p>
                                <div style="border-width: 1px; border-style: solid; border-color: #00ABEB; padding: 10px;">
                                    <input type="radio" name="formaPagamento" value="cartao" checked="checked" style="font-family: 'Open Sans', sans-serif;"> Cartão de Crédito
                                    <img src="img/logo_pagseguro.png" width="100"> <br/><br/>
                                    <p>OBS: As opções de parcelamento estão na próxima página.</p>
                                </div>
                                <br>
                                <div style="border-width: 1px; border-style: solid; border-color: #00ABEB; padding: 10px;">
                                    <input type="radio" name="formaPagamento" value="cheque" style="font-family: 'Open Sans', sans-serif;"> Cheque
                                   
                                </div>
                                <br/>
                                <div style="border-width: 1px; border-style: solid; border-color: #00ABEB; display: none; padding: 10px;">
                                    <input type="radio" name="formaPagamento" value="boleto" style=" font-family: 'Open Sans', sans-serif;" >Boleto<br>
                                    <select id="parcelasBoleto" name="parcelasBoleto" class="form-control formInput">
                                        <option value="1">À Vista</option>
                                        <option value="2">2 Vezes</option>
                                    </select>
                                </div>

                            </div>
                        </div>
                        <br>
                        <input type="submit" class="button" value="Inscrever">
                        <br>
                        <br>
                    </form>
                </div>
            </div>
        </div>



        <!--*************************************************************************-->
        <!--*********************MOVER PARA UM ARQUIVO EXTERNO***********************-->
        <!--*************************************************************************-->


        <script>



            /* #curso').val("<?php echo $_GET['curso']; ?>").prop('selected', true); */




            $("#cep").focusout(function () {



                $.getJSON("https://viacep.com.br/ws/" + $("#cep").val() + "/json/")
                        .done(function (result) {

                            if (!("erro" in result)) {
                                $("#logradouro").val(result.logradouro);
                                $("#bairro").val(result.bairro);
                                $("#cidade").val(result.localidade);
                                $("#uf").val(result.uf);
                            } else {
                                $("#cep").val("CEP não encontrado");
                            }
                        })
                        .fail(function () {
                            $("#cep").val("CEP Inválido - O CEP deve conter apenas 8 dígitos");
                        });
            });

            $(function () {

                // Initialize form validation on the registration form.
                // It has the name attribute "registration"
                $("form[name='registration']").validate({
                    // Specify validation rules
                    rules: {
                        // The key name on the left side is the name attribute
                        // of an input field. Validation rules are defined
                        // on the right side
                        nomeCompleto: "required",
                        profissao: "required",

                        email: {
                            required: true,
                            // Specify that email should be validated
                            // by the built-in "email" rule
                            email: true
                        },
                        cpf: {
                            required: true,
                            cpfBR: true
                        },
                        telefone02: {
                            required: true,
                            celular: true
                        },

                        uf: {
                            maxlength: 2
                        }


                    },
                    messages: {
                        nomeCompleto: {
                            required: "Preenchimento Obrigatório"
                        },
                        profissao: {
                            required: "Preenchimento Obrigatório"
                        },
                        email: {
                            required: "Preenchimento Obrigatório",
                            email: "Por favor digite um e-mail válido"
                        },
                        cpf: {
                            required: "Digite o seu CPF",
                            cpfBR: "Por favor Digite um CPF válido"
                        },

                        telefone02: {
                            required: "Preenchimento Obrigatório"
                        },
                        uf: {
                            maxlength: "Usar somente 2 letras. Ex: São Paulo = SP"
                        }

                    },
                });
            });

            jQuery.validator.addMethod('celular', function (value, element) {
                value = value.replace("(", "");
                value = value.replace(")", "");
                value = value.replace("-", "");
                value = value.replace(" ", "").trim();

                if (value == '0000000000') {
                    return (this.optional(element) || false);
                } else if (value == '00000000000') {
                    return (this.optional(element) || false);
                }
                if (["00", "01", "02", "03", , "04", , "05", , "06", , "07", , "08", "09", "10"].indexOf(value.substring(0, 2)) != -1) {
                    return (this.optional(element) || false);
                }
                if (value.length < 10 || value.length > 11) {
                    return (this.optional(element) || false);
                }
                if (["6", "7", "8", "9"].indexOf(value.substring(2, 3)) == -1) {
                    return (this.optional(element) || false);
                }
                return (this.optional(element) || true);
            }, 'Informe um celular válido');


        </script>
        <script src="jQuery/jquery.mask.min.js" type="text/javascript"></script>
    </body>



</html> 
