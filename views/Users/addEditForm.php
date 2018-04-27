
<!--Load Header - Menu is loaded into Header-->
<?php require 'views/HeaderFooter/Header.php'; ?>

<!--<body>-->
<br>
<h3 align="center">Complete seu cadastro para efetuar a sua matricula</h3>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10" style="background-color: #eee;" >
            <form name="userRegister" action="/mvc/user/create" method="POST">
                <br>
                <h4>Dados Pessoais</h4>
                <hr>
                <div class="row form-group">
                    <div class="col-lg-12 ">
                        <label for="fullName">Nome Completo</label>
                        <input type="text" id="fullName" name="fullName"  class="form-control">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-lg-6">
                        <label for="rg">RG</label>
                        <input type="text" id="rg" name="rg" data-mask="99.000.000-A" class="form-control">
                    </div>
                    <div class="col-lg-6">
                        <label for="cpf">CPF</label>
                        <input type="text" id="cpf" name="cpf" class="form-control">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-lg-4">
                        <label for="birthDay">Data Nascimento</label>
                        <input type="text" id="birthDay" name="birthDay"  data-mask="00/00/0000" class="form-control">
                    </div>
                    <div class="col-lg-4">
                        <label for="profession">Profissão</label>
                        <input type="text" id="profession" name="profession" class="form-control">
                    </div>
                    <div class="col-lg-4">
                        <label for="degree">Escolaridade</label>
                        <select id="degree" name="degree" class="form-control">
                            <option value="1">Fundamental - Incompleto</option>
                            <option value="2">Fundamental - Completo</option>
                            <option value="3">Médio - Incompleto</option>
                            <option value="4">Médio - Completo</option>
                            <option value="5">Superior - Incompleto</option>
                            <option value="6">Superior - Completo</option>
                            <option value="7">Pós-Graduação - Incompleto</option>
                            <option value="8">Pós-Graduação - Completo</option>
                            <option value="9">Mestrado - Incompleto</option>
                            <option value="10">Mestrado - Completo</option>
                            <option value="11">Doutorado - Incompleto</option>
                            <option value="12">Doutorado - Completo</option>
                        </select>

                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-lg-12">
                        <label for="email">E-Mail</label>
                        <input type="text" id="email" name="email" class="form-control">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-lg-4">
                        <label for="mobilePhone">Telefone Celular</label>
                        <input type="text" id="mobilePhone" name="mobilePhone" placeholder="(  )     -    " class="form-control">
                    </div>
                    <div class="col-lg-4">
                        <label for="homePhone">Telefone Residencial</label>
                        <input type="text" id="homePhone" name="homePhone" placeholder="(  )     -    "  class="form-control">
                    </div>
                    <div class="col-lg-4">
                        <label for="businessPhone">Telefone Comercial</label>
                        <input type="text" id="businessPhone" name="businessPhone" placeholder="(  )     -    "  class="form-control">
                    </div>
                </div>

                <br>
                <h4>Endereço</h4>
                <hr>
                <div class="row form-group">
                    <div class="col-lg-4">
                        <label for="cep">CEP</label>
                        <input type="text" id="cep" name="cep" data-mask="00000-000" class="form-control">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-lg-10">
                        <label for="address">Logradouro</label>
                        <input type="text" id="address" name="address" class="form-control">
                    </div>
                    <div class="col-lg-2">
                        <label for="number">Logradouro</label>
                        <input type="text" id="number" name="number" class="form-control">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-lg-12">
                        <label for="complement">Complemento</label>
                        <input type="text" id="complement" name="complement" class="form-control">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-lg-5">
                        <label for="neighborhood">Bairro</label>
                        <input type="text" id="neighborhood" name="neighborhood" class="form-control">
                    </div>
                    <div class="col-lg-5">
                        <label for="city">Cidade</label>
                        <input type="text" id="city" name="city" class="form-control">
                    </div>
                    <div class="col-lg-2">
                        <label for="state">UF</label>
                        <input type="text" id="state" name="state"  class="form-control">
                    </div>
                </div>

                <br>
                <h4>Dados de Acesso</h4>
                <hr>

                <div class="row form-group">
                    <div class="col-lg-5">
                        <label for="username">Nome de Usuario</label>
                        <input type="text" id="username" name="username" class="form-control">
                    </div>
                    <div class="col-lg-5">
                        <label for="password">Senha</label>
                        <input type="password" id="password" name="password" class="form-control">
                        <label for="password2">Confirme a Senha</label>
                        <input type="password" id="password2" name="password2" class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-12">
                        <input type="hidden" id="accessLevel" name="accessLevel" value="10"/>
                        <input type="submit" class="btn btn-primary" value="Enviar">
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>


<script>

    $(document).ready(function () {

        // Set input masks
        $('#rg').mask('00.000.000-0');
        $('#cpf').mask('000.000.000-00');
        $('#birthDay').mask('99/99/9999');
        $('#mobilePhone').mask('(99)99999-9999');
        $('#homePhone').mask('(99)9999-9999');
        $('#businessPhone').mask('(99)9999-9999');
        $('#cep').mask('99999-999');

        // Configure input validation
        $("form[name='userRegister']").validate({

            rules: {

                fullName: "required",
                address: "required",
                number: "required",
                neighborhood: "required",
                city: "required",
                state: "required",
                
                cpf: {
                    required: true,
                    cpfBR: true
                },

                password: {
                    required: true,
                    minlength: 5
                },
                password2: {
                    required: true,
                    minlength: 5,
                    equalTo: "#password"
                }
            },

            messages: {
                fullName: {
                    required: "Preenchimento Obrigatório"
                },
                cpf: {
                    required: "CPF Inválido",
                    cpfBR: "Por favor Digite um CPF válido"
                },
                address: {
                    required: "Preenchimento Obrigatório"
                },
                number: {
                    required: "Preenchimento Obrigatório"
                },
                neighborhood: {
                    required: "Preenchimento Obrigatório"
                },
                city: {
                    required: "Preenchimento Obrigatório"
                },
                state: {
                    required: "Preenchimento Obrigatório"
                },
                password: {
                    required: "Preenchimento Obrigatório",
                    minlength: "Sua senha deve conter pelo menos 5 caracteres"
                },
                password2: {
                    required: "Preenchimento Obrigatório",
                    minlength: "Sua senha deve conter pelo menos 5 caracteres",
                    equalTo: "a senha deve ser igual"
                }
            }
        });

        //*********************************************************************
        //*********************** CONSULT DE CEP ******************************
        //*********************************************************************

        $("#cep").focusout(function () {

            $.getJSON("https://viacep.com.br/ws/" + $("#cep").val() + "/json/")

                    .done(function (result) {

                        if (!("erro" in result)) {
                            $("#address").val(result.logradouro);
                            $("#neighborhood").val(result.bairro);
                            $("#city").val(result.localidade);
                            $("#state").val(result.uf);
                        } else {
                            $("#cep").val("CEP não encontrado");
                        }
                    })
                    .fail(function () {
                        $("#cep").val("CEP Inválido - O CEP deve conter apenas 8 dígitos");
                    });
        });
    });

</script>

<!--</body>-->
<?php require 'views/HeaderFooter/Footer.php' ?>
