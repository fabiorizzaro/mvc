
<!--Load Header - Menu is loaded into Header-->
<?php require 'views/HeaderFooter/Header.php'; ?>

<!--<body>-->
<script type="text/javascript" src="https://www.boletobancario.com/boletofacil/wro/direct-checkout.min.js"></script>
<style>
    input[type="radio"] {
        margin-top: -1px;
        vertical-align: middle;
        margin-right: 7px;
        -ms-transform: scale(1.5); /* IE 9 */
        -webkit-transform: scale(1.5); /* Chrome, Safari, Opera */
        transform: scale(1.5);
    }

    label{
        margin-top: 7px;
        vertical-align: middle;
    }

    label + img{
        float: right;
    }

    .card-header{
        background-color: #fff;
        border-color: #cccccc;
    }

    .card{
        border: none;
    }

    .form-control{
        margin-bottom: 10px;
    }
    @media (max-width: 575px) {

        #infoPanel{
            margin-top: 50px;
        }

    }

    hr{
        border-color: #07AAA5;
    }



    body{
        background-color: #eee;
        color: #444444;
    }


    /*-------------------*/

    .secao{
        background-color: #fff; 
        padding: 15px;
    }


</style>

<script type="text/javascript" src="https://www.boletobancario.com/boletofacil/wro/direct-checkout.min.js"></script>
<div class="container">

    <div class="row justify-content-center mt-5">
        <div class="col-lg-8 " style="background-color:  #07AAA5; height: 90px; text-align: center">
            <h2 style="color: #fff">Finalizar Inscrição</h3> 
        </div>
    </div>

    <div class="row justify-content-center mt-2">
        <div class="col-lg-8 col-12 rounded shadow-sm secao">
            <h4>INFORMAÇÕES PESSOAIS</h4>
            <div class="row mb-4">
                <div class="col-lg-9">
                    <span class="mt-2"><?php echo isset($this->userData) ? $this->userData['fullName'] : false; ?></span></br>
                    <span class="mt-0"><?php echo isset($this->userData) ? $this->userData['email'] : false; ?></span></br>
                    <span class="mt-0"><?php echo isset($this->userData) ? $this->userData['cpf'] : false; ?></span></br>
                    <span class="mt-0"><?php echo isset($this->userData) ? $this->userData['mobilePhone'] : false; ?></span></br>
                </div>
            </div>
        </div>
    </div>

    <!--------------------------------------------------------------------------------->

    <div class="row justify-content-center mt-2">
        <div class="col-lg-8 rounded shadow-sm secao">
            <h4>CURSO</h4>
            <div class="row" >
                <div class="col-lg-8 col-8">
                    <p><?php echo isset($this->courseData) ? $this->courseData->courseName : false; ?></p>
                </div>
                <div class="col-lg-4 col-4">
                    <div class="text-right">
                        <p>R$ <?php echo isset($this->courseData) ? $this->courseData->coursePrice : false; ?></p>
                    </div>
                    <div class="text-right">
                        <p id="couponValue"> </p>
                    </div>
                    <div class="text-right">
                        <p id="finalPrice"> </p>
                    </div>


                </div>
            </div>
        </div>
    </div>

    <!--------------------------------------------------------------------------------->
    <form action="/subscribe/enroll/CREDIT_CARD" id="payment" method="POST">

        <div class="row justify-content-center mt-2">
            <div class="col-lg-8 rounded shadow-sm secao">
                <div class="col-lg-9">
                    <div class="input-group">
                        <input type="text" name="coupon" id="coupon" class="form-control" placeholder="Tem um cupom?" aria-label="Recipient's username" aria-describedby="button-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button" id="validate">Validar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--------------------------------------------------------------------------------->
        <div class="row justify-content-center mt-2">

            <div class="col-lg-8 rounded shadow-sm secao">


                <h4>FORMA DE PAGAMENTO</h4>

                <div id="accordion">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <label>
                                <input  type="radio" name="pag" id="pag" value="CREDIT_CARD" data-toggle="collapse" data-target="#collapseOne" aria-controls="collapseOne" checked>Cartão de Credito
                            </label>
                            <img src="/public/img/iconCreditCard.svg" height="40">
                        </div>

                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                                <p class="mb-0">Número do Cartão de Crédito</p>
                                <div class="row">
                                    <div class="col-lg-8">
                                        <input type="text" id="creditCardNumber" name="creditCardNumber" class="form-control" placeholder="1234.1234.1234.1234">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <p class="mb-0">Vencimento</p>
                                    </div>
                                    <div class="col-lg-3">
                                        <p class="mb-0">Cod. Segurança</p>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="col-lg-2 pr-0">
                                        <input type="text" id="creditCardExpirationMonth" name="creditCardExpirationMonth" class="form-control" placeholder="MM">
                                    </div>
                                    <div class="col-lg-2 pl-2">
                                        <input type="text" id="creditCardExpirationYear" name="creditCardExpirationYear" class="form-control" placeholder="AAAA">
                                    </div>

                                    <div class="col-lg-3">
                                        <input type="text" id="creditCardSecurityCode" name="creditCardSecurityCode" class="form-control" placeholder="CVV">
                                    </div>
                                </div>
                                <p class="mb-0">Nome (Como consta no Cartão)</p>
                                <div class="row">
                                    <div class="col-lg-8">
                                        <input type="text" id="creditCardHolderName" name="creditCardHolderName" class="form-control" placeholder="">
                                    </div>
                                </div>
                                <p class="mb-0">Opções de Parcelamento</p>
                                <div class="row">
                                    <div class="col-lg-8">
                                        <select class="form-control" id="creditCardInstallments" name="creditCardInstallments">
                                            <option>Número de Parcelas</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" id="headingTwo">

                            <label>
                                <input type="radio" name="pag" id="pag" value="BOLETO" data-toggle="collapse" data-target="#collapseTwo" aria-controls="collapseOne">Boleto
                            </label>
                            <img src="/public/img/iconBarCode.svg" height="40">

                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-8">
                                        <p>Os boletos do Instituto Alliqua são emitidos pela institutição BoletoBancário.com</p>
                                        <p class="mb-0">Opções de Parcelamento</p>
                                        <select class="form-control" id="boletoInstallments" name="boletoInstallments">
                                            <option>Número de Parcelas</option>
                                        </select>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingThree">
                            <label>
                                <input type="radio" name="pag" id="pag" value="DEPOSIT" data-toggle="collapse" data-target="#collapseThree" aria-controls="collapseOne">Depósito
                            </label>
                            <img src="/public/img/iconPaymentMethod.svg" height="40">
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                            <div class="card-body">
                                <p>Os pagamento realizados por depósito devem ser efetuados em até 24h após o </p>
                                <h4 class="alert-danger text-center" style="padding: 10px;">Somente são aceitos pagamentos à vista!</h4>
                                <p>Dados para depósito:</p>
                                <p>Instituto Alliqua</p>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="submit" class="btn btn-success btn-lg" value="Confirmar Pagamento" style="margin-top: 10px; float: right;">
                </form>

            </div>
        </div>


        <div class="row justify-content-center mt-3">
            <div class="col-lg-4">
                <h5>Informações de Contato</h5>
                <p>contato@alliqua.com.br</p>
                <a href="https://wa.me/5512997385366?text=Oi!%20Preciso%20de%20uma%20com%20o%20pagamento!"><img width="60" src="/zap.png" alt=""/>(12)99738-5366</a>
            </div>
            <div class="col-lg-4">
                <img width="150" src="/le-logo-standard.png" class="float-right" alt=""/>
            </div>
        </div>
</div>

<div>    

</div>
<script>

    var checkout;

    var creditCardInstallments = <?php echo isset($this->paymentMethodsData) ? $this->paymentMethodsData->creditCardInterests : false; ?>;
    var boletoInstallments = <?php echo isset($this->paymentMethodsData) ? $this->paymentMethodsData->boletoInterests : false; ?>;
    var coursePrice = <?php echo isset($this->courseData) ? $this->courseData->coursePrice : false; ?>;

    $(document).ready(function () {

        checkout = new DirectCheckout('85A92859393A2E213FC48CC25C69A66FC8B4F971BEA4FB8189163F6D27E4DF19', false); /* Em sandbox utilizar o construtor new DirectCheckout('SEU TOKEN PUBLICO', false); */


        //Poputate Installments
        $("#creditCardInstallments").append('<option value="' + 1 + '">À Vista (R$ ' + (coursePrice).toFixed(2) + ')</option>');
        $("#boletoInstallments").append('<option value="' + 1 + '">À Vista (R$ ' + (coursePrice).toFixed(2) + ')</option>');

        for (i = 2; i <= creditCardInstallments; i++) {
            $("#creditCardInstallments").append('<option value="' + i + '">' + i + ' Vezes (R$ ' + (coursePrice / i).toFixed(2) + ')</option>');
        }
        for (i = 2; i <= boletoInstallments; i++) {
            $("#boletoInstallments").append('<option value="' + i + '">' + i + ' Vezes (R$ ' + (coursePrice / i).toFixed(2) + ')</option>');
        }

        //-----------------

        $("#validate").click(function () {
            $.ajax({
                method: "POST",
                url: "/subscribe/validateCoupons",
                data: {
                    'couponId': $('#coupon').val(),
                    'userId': <?php echo $this->userData['userId']; ?>,
                    'courseId': <?php echo $this->courseData->courseId; ?>
                },
                dataType: 'JSON'


            })
                    .done(function (data) {

                        if (data.error === false) {

                            var price = data.price;
                            var value = data.value;
                            var finalPrice = data.finalPrice;

                            $('#couponValue').text("Desconto R$ " + value);
                            $('#finalPrice').text("R$ " + finalPrice);
//                            $('#couponValue').text("R$ " + value.replace(".", ","));


                        } else {
                            $('#coupon').val(data.message);

                        }
                    });
        });
        //------------------
    });


    $("input[name='pag']").change(function () {
        $("#payment").attr("action", "/subscribe/enroll/" + $("input[name='pag']:checked").val());
    });


    $('#creditCardNumber').focusout(function () {

        var cardNumber = $('#creditCardNumber').val().replace(/\./g, '');

        var cardData = {
            cardNumber: cardNumber,
            holderName: $('#creditCardHolderName').val(),
            securityCode: $('#creditCardSecurityCode').val(),
            expirationMonth: $('#creditCardExpirationMonth').val(),
            expirationYear: $('#creditCardExpirationYear').val()
        };

        var brand = checkout.getCardType(cardData.cardNumber);

        console.log(brand);

        checkout.getCardHash(cardData, function (cardHash) {
            /* Sucesso - A variável cardHash conterá o hash do cartão de crédito */
            console.log("CardHash: " + cardHash);
            $('#creditCardHash').val(cardHash);

        }, function (error) {
            console.log(error);
            /* Erro - A variável error conterá o erro ocorrido ao obter o hash */
        });

    });




</script>


<!--</body>-->

<?php require 'views/HeaderFooter/Footer.php'; ?>
