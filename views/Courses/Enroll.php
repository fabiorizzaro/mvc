
<!--Load Header - Menu is loaded into Header-->
<?php require 'views/HeaderFooter/Header.php'; ?>

<!--<body>-->

<div class="container">
    <div class="row">
        </br>
        <div class="col-lg-12" style="margin-bottom: 50px; margin-top: 50px; background-color: #dfdfdf">
            <h3>Finalizar Compra</h3>
        </div>

        <div class="col-lg-6" style="background-color: #cccccc">
            <h3>Dados do Curso</h3>
            <?php echo $this->courseData['name']; ?> </br> 
            <?php echo $this->courseData['shortDescription']; ?> </br>
            <?php echo $this->courseData['name']; ?> </br>
            <?php echo number_format(floatval($this->courseData['price']), 2, ',', '') ?> </br>

        </div>

        <div class="col-lg-6">
            <p>Seus Dados</p>
            <?php echo $this->userData['fullName']; ?> </br>
            <?php echo $this->userData['cpf']; ?> </br>
            <?php echo $this->userData['address']; ?> </br>
            <?php echo $this->userData['number']; ?> </br>
        </div>


    </div>
    <div class="row" style="margin-top: 100px">
        <h3>Selecione o Metodo de Pagamento</h3>
    </div>
    <div class="row" style="margin-top: 20px" >

        <ul class="nav nav-tabs">
            <li class="active" style="width: 150px;" align=""><a style="text-decoration: none" data-toggle="tab" href="#creditCard">
                    <div align="center">
                        <img width="80" src="/mvc/public/img/iconCreditCard.svg" alt=""/>
                        <p>Cartão de Crédito</p>
                    </div>
                </a></li>
            <li style="width: 150px;"><a data-toggle="tab" href="#boleto">
                    <div align="center">
                        <img width="80" src="/mvc/public/img/iconBarCode.svg" alt=""/>
                        <p>Boleto</p>
                    </div>
                </a></li>
            <li style="width: 150px"><a data-toggle="tab" href="#transfer">
                    <div align="center">
                        <img width="80" src="/mvc/public/img/iconMoney.svg" alt=""/>
                        <p>Transferencia</p>
                    </div>
                </a></li>
        </ul>
    </div>


    <div class="row tab-content" style="margin-top: 40px">
        <div id="creditCard" class="tab-pane fade in active">
            <h5>Cartão de Crédito</h5>
            <form action="/mvc/Subscribe/enroll?paymentMethod=CREDIT_CARD" method="POST">
                <div class="row form-group">
                    <div class="col-lg-6 ">
                        <label for="creditCardNumber">Numero do Cartão</label>
                        <input type="text" id="creditCardNumber" name="creditCardNumber"  class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-2 ">
                        <label for="creditCardExpirationMonth">Mes</label>
                        <input type="text" id="creditCardExpirationMonth" name="creditCardExpirationMonth"  class="form-control">
                    </div>
                    <div class="col-lg-2 ">
                        <label for="creditCardExpirationYear">Ano</label>
                        <input type="text" id="creditCardExpirationYear" name="creditCardExpirationYear"  class="form-control">
                    </div>
                    <div class="col-lg-2 ">
                        <label for="creditCardSecurityCode">CVV</label>
                        <input type="text" id="creditCardSecurityCode" name="creditCardSecurityCode"  class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-6 ">
                        <label for="creditCardHolderName">Nome no Cartão</label>
                        <input type="text" id="creditCardHolderName" name="creditCardHolderName"  class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-6 ">
                        <label for="installments">Numero de Parcelas</label>
                        <select id="installments" name="installments" class="form-control">

                        </select>
                    </div>

                </div>
                <div class="row form-group">
                    <div class="col-lg-6 ">

                        <input class="btn-primary btn" type="submit" value="vai"/>
                    </div>
                </div>
            </form>
        </div>
        <div id="boleto" class="tab-pane fade">
            <div class="row">
                <div class="col-lg-6 ">
                    <p><strong>Banco Santander</strong></p>
                    <p>A operação de compra será convretizada somente após a confirmação por parte do banco emissor do boleto de cobrança. 
                        Em média a confirmação ocorre em dois dias úteis após o pagamento.</p>
                    <a href="/mvc/Subscribe/enroll?paymentMethod=BOLETO" class="btn-primary btn"> Concluir </a>
                </div>
            </div>
        </div>
        <div id="menu2" class="tab-pane fade">

        </div>
    </div>

</div>

<script>

    var i = 1;
    var installments = <?php echo $this->courseData['installments'] ?>;
    var cuppon = "XPTO1d0";
    var price = "";
    
    if (cuppon === "XPTO10") {
         price = <?php echo number_format(floatval($this->courseData['price']), 2, '.', '') ?>;
    }else{
         price = 1000;
    }
    
    $('#creditCardSecurityCode').change(function(){
        $('#installments').text("");
          do {
            $('#installments').append('<option  value="1">' + 10000000 / i + '</option>');
            i++;
        } while (i < 10);
    });
    
    $(document).ready(function () {

        do {
            $('#installments').append('<option  value="1">' + price / i + '</option>');
            i++;
        } while (i < 10);
    });

</script>

<!--</body>-->

<?php require 'views/HeaderFooter/Footer.php'; ?>
