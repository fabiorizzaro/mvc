
<!--Load Header - Menu is loaded into Header-->
<?php require 'views/HeaderFooter/Header.php'; ?>

<!--<body>-->
<script type="text/javascript" src="https://www.boletobancario.com/boletofacil/wro/direct-checkout.min.js"></script>
<style>
    #paymentsNav .nav-item {
        width: 100px;
    }
    @media (max-width: 576px) { 

        #paymentsNav .nav-item {
            width: 90px;
        }
    }

    .error{
        font-size: .7rem;
        color: red;
    }

</style>

<div class="container mt-5">

    <div class="row">
        <div class="col col-12 col-lg-12">
            <div>
                <h2>Finalizar Inscrição</h2>
            </div>
        </div>
    </div>



    <div class="row">
        <div class="col col-12 col-lg-12 ">
            <div class="bg-dark rounded text-white p-1">

                <div class="d-flex  flex-column ">
                    <div><i class="far fa-user fa-2x mr-3"></i>Dados Pessoais:</div>
                    

                </div>
            </div>
        </div>
    </div>


    <div class="row mt-1">

        <div class="col col-12 col-lg-8 mt-1" >

            <div class="d-flex justify-content-start border rounded p-1">

                <div class="flex-column ">
                    <div class="text-primary"><i class="fas fa-graduation-cap fa-2x mr-3"></i>Curso Selecionado:</div>
                    
                    <span class="oi oi-align-center"></span>


                </div>
            </div>


        </div>

        <div class="col col-12 col-lg-4 mt-1">

            <div class="d-flex  justify-content-center border rounded p-1">
                <div class="d-flex flex-column">
                    <div>
                        Preço: R$
                        <span id="price"><?php echo number_format($this->courseData->coursePrice, 2, ',', ' '); ?></span>
                    </div>
                    <div>
                        Desconto:
                        <span id="couponValue">R$ 0,00</span>
                    </div>
                    <div>Valor Final:
                        <span id="finalPrice">R$ 0,00</span>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-center border rounded p-1 mt-2">
                <div>

                    <div>
                        Tem um código de desconto?
                    </div>
                    <div class="d-flex d-inline-flex p-2">
                        <input type="text" id="coupon" class="form-control" >
                        <input type="button" class="btn btn-sm btn-primary ml-1" id="validate"  value="OK">
                    </div>
                </div>
            </div>

        </div>

    </div>

    <div class="row mt-1">
        <div class="col col-lg-4 col-12">
            <div class="bg-success rounded text-white p-3 text-center">
                Selecione a forma de pagamento
            </div>

        </div>
    </div>

    <nav class="mt-3">
        <div class="nav nav-tabs" id="paymentsNav" role="tablist">
            <a  class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">
                <div align="center">
                    <img class="img-responsive" src="/public/img/iconCreditCard.svg" alt=""/>
                    <p>Cartão de Crédito</p>
                </div>
            </a>
            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">
                <div width="270" align="center">
                    <img class="img-responsive" src="/public/img/iconBarCode.svg" alt=""/>
                    <p>Boleto</p>
                </div></a>
            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">
                <div align="center">
                    <img class="img-responsive" src="/public/img/iconMoney.svg" alt=""/>
                    <p>Depósito</p>
                </div></a>
        </div>
    </nav>

<!--    <div class="row">

        <div class="col col-lg-12 col-12">

            <div class="tab-content rounded p-2" id="paymentsNavContent"  style="background-color: #eee">

                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" >
                    <form name="creditCard" action="/subscribe/enroll/CREDIT_CARD" method="POST"> 
                        <div class="row justify-content-start">
                            <div class="col-lg-5">
                                Begin Form
                                <input type="hidden" class="hiddenCoupon" name="coupon" value="">
                                <input type="hidden" id="creditCardHash" name="creditCardHash" value="">
                                <div class="form-row">
                                    <div class="col-lg-12 mb-12">
                                        <label for="creditCardNumber">Numero do Cartão</label>
                                        <input type="text" id="creditCardNumber" name="creditCardNumber"  class="form-control">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-lg-4 col-4">
                                        <label for="creditCardExpirationMonth">Mes</label>
                                        <input type="text" id="creditCardExpirationMonth" name="creditCardExpirationMonth" placeholder="Mês 2 Digitos" class="form-control">
                                    </div>
                                    <div class="col-lg-4 col-4">
                                        <label for="creditCardExpirationYear">Ano</label>
                                        <input type="text" id="creditCardExpirationYear" name="creditCardExpirationYear" placeholder="Ano 4 Digitos" class="form-control">
                                    </div>
                                    <div class="col-lg-4 col-4">
                                        <label for="creditCardSecurityCode">CVV</label>
                                        <input type="text" id="creditCardSecurityCode" name="creditCardSecurityCode"  class="form-control">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-lg-12 mb-12">
                                        <label for="creditCardHolderName">Nome no Cartão</label>
                                        <input type="text" id="creditCardHolderName" name="creditCardHolderName"  class="form-control">

                                    </div>
                                </div>


                                End Form
                            </div>
                            <div class="col-lg-7">
                                <p>Opções de Parcelamento:</p>
                                <?php
                                $i = 1;
                                do {

                                    echo '<div class="form-check">';
                                    echo '<input class="form-check-input" type="radio" name="installments" id="installment' . $i . '" value="' . $i . '" >';
                                    echo '<label class="form-check-label" for="installment' . $i . '">';
                                    if ($i === 1) {
                                        echo $i . ' parcela de R$ ' . number_format($this->courseData['price'] / $i, 2, ',', '') . "<br />";
                                    } else {
                                        echo $i . ' parcelas de R$ ' . number_format($this->courseData['price'] / $i, 2, ',', '') . "<br />";
                                    }
                                    echo '</label>';
                                    echo '</div>';

                                    $i++;
                                } while ($this->courseData['installmentsCreditCard'] >= $i);
                                ?>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col col-lg-12">
                                <button class="btn btn-primary mt-3" type="submit">Concluir</button>
                            </div>

                        </div>
                    </form>
                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <p><strong>Banco Santander</strong></p>
                    <p>A operação de compra será convretizada somente após a confirmação por parte do banco emissor do boleto de cobrança. 
                        Em média a confirmação ocorre em dois dias úteis após o pagamento.</p>
                    <form action="/subscribe/enroll/BOLETO" method="POST">
                        <input type="hidden" class="hiddenCoupon" name="coupon" value="">
                        <button class="btn btn-primary mt-3" type="submit">Concluir</button>
                    </form>

                </div>
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
            </div>
        </div>
    </div>-->






</div>



<script>

    var checkout;

    $(document).ready(function () {

        checkout = new DirectCheckout('85A92859393A2E213FC48CC25C69A66FC8B4F971BEA4FB8189163F6D27E4DF19', false); /* Em sandbox utilizar o construtor new DirectCheckout('SEU TOKEN PUBLICO', false); */

        if ($('#couponValue').text() == "R$ 0,00") {
            $('#finalPrice').text("R$ " + $('#price').text());
        }

        // Set Installments 1 checked
        $('#installment1').prop('checked', true);

        $("#validate").click(function () {

            $.ajax({
                method: "POST",
                url: "/subscribe/validateCoupons",
                data: {
                    'couponId': $('#coupon').val(),
                    'userId': <?php echo $this->userData['userId']; ?>,
                    'courseId': <?php echo $this->courseData['courseId']; ?>
                },
                dataType: 'JSON'
            })
                    .done(function (data) {

                        if (data.error === false) {

                            var price = data.price;
                            var value = data.value;
                            var finalPrice = data.finalPrice;

                            $('.hiddenCoupon').val($('#coupon').val());
                            $('#finalPrice').text("R$ " + finalPrice);
                            $('#couponValue').text("R$ " + value.replace(".", ","));

                            var i = 1;
                            do {
                                var label = $("[for=installment" + i + "]");
                                if (i == 1) {
                                    $(label).text(i + ' parcela de R$ ' + parseFloat(finalPrice.replace(",", ".") / i).toFixed(2).replace(".", ","));
                                } else {
                                    $(label).text(i + ' parcelas de R$ ' + parseFloat(finalPrice.replace(",", ".") / i).toFixed(2).replace(".", ","));
                                }
                                i++;
                            } while (<?php echo $this->courseData['installmentsCreditCard']; ?> >= i);

                        } else {
                            $('#coupon').val(data.message);

                        }
                    });
        });

        //mask inputs

        $('#creditCardNumber').mask('0000.0000.0000.0000');
        $('#creditCardExpirationMonth').mask('00');
        $('#creditCardExpirationYear').mask('0000');


        //validate Form
        $("form[name='creditCard']").validate({

            rules: {
                creditCardNumber: "required",
                creditCardExpirationMonth: "required",
                creditCardExpirationYear: "required",
                creditCardSecurityCode: "required",
                creditCardHolderName: "required"
            },

            messages: {
                creditCardNumber: {
                    required: "Preenchimento Obrigatório"
                },
                creditCardExpirationMonth: {
                    required: "Preenchimento Obrigatório"
                },
                creditCardExpirationYear: {
                    required: "Preenchimento Obrigatório"
                },
                creditCardSecurityCode: {
                    required: "Preenchimento Obrigatório"
                },
                creditCardHolderName: {
                    required: "Preenchimento Obrigatório"
                }
            }
        });




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
