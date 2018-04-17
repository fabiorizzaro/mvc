
<!--Load Header - Menu is loaded into Header-->
<?php require 'views/HeaderFooter/Header.php'; ?>

<!--<body>-->
<br>
<h3 align="center">Complete seu cadastro para efetuar a sua matricula</h3>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10" style="background-color: #eef; width: 100%; height: 100%;" >
            <form action="/mvc/Subscribe/addUser" method="POST">
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
                        <input type="text" id="cpf" name="cpf" data-mask="999.999.999-99"class="form-control">
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
                        <input type="text" id="degree" name="degree" class="form-control">
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
                        <input type="text" id="mobilePhone" name="mobilePhone" data-mask="(00) 0000-0000" class="form-control">
                    </div>
                    <div class="col-lg-4">
                        <label for="homePhone">Telefone Residencial</label>
                        <input type="text" id="homePhone" name="homePhone" data-mask="(00) 00000-0000"  class="form-control">
                    </div>
                    <div class="col-lg-4">
                        <label for="businessPhone">Telefone Comercial</label>
                        <input type="text" id="businessPhone" name="businessPhone" data-mask="(00) 00000-0000"  class="form-control">
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
                        <input type="submit" class="btn-primary" value="Enviar">
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>




<!--</body>-->
<?php require 'views/HeaderFooter/Footer.php' ?>
