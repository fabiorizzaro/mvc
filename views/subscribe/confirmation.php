
<!--Load Header - Menu is loaded into Header-->
<?php require 'views/HeaderFooter/Header.php'; ?>

<!--<body>-->
<?php
    $this->subscribe = Session::Get('subscribe');
    $this->fullName = Session::Get('fullName');
?>

<section id="">
    <div class="container mt-5">
        <div class="row">
            <div class="col col-12 d-flex d-inline justify-content-center">
                <i class="fas fa-thumbs-up fa-8x text-success"></i> <h1 class="align-self-end ml-2 text-success">INSCRIÇÃO RECEBIDA COM SUCESSO</h1> 

            </div>
        </div>
        <div class="row mt-4" >
            <div class="col-12 col-lg-12">
                <p>Parabens <?php echo $this->fullName ?>, sua inscrição foi recebida com sucesso. Estamos quase lá! </p>
            </div>
        </div>
        <h3>O numero da sua inscrição é: <?php echo $this->subscribe['chargeReference']; ?></h3>
        <i class="fas fa-barcode fa-6x"></i><i class="fas fa-barcode fa-6x"></i><i class="fas fa-barcode fa-6x"></i><br/>
        <a href="<?php echo $this->subscribe['chargeLink']; ?>" target="_blank">Clique aqui para imprimir o seu boleto</a>

        <p class="mt-3">Acompanhe o status da sua inscrição:</p>
        <div class="row p-4 text-center bg-light border rounded">
            <div class="col-12 col-lg-4">
                <h5 class="mt-1 text-primary">Etapa 1</h5>
                <i class="far fa-check-circle fa-2x text-success"></i>
                <h5 class="mt-1">Inscrição Recebida</h5>
                <hr class="d-block d-sm-none"/>
            </div>
            <div class="col-12 col-lg-4">
                <h5 class="mt-1 text-primary">Etapa 2</h5>
                <i class="far fa-circle fa-2x text-secondary"></i>
                <h5 class="mt-1">Confirmação de pagamento</h5>
                <span style="font-size: 0.7rem">No caso de pagamento por boleto a confirmação pode ocerrer em até 24h após o pagamento</span>
                <hr class="d-block d-sm-none"/>
            </div>
            <div class="col-12 col-lg-4">
                <h5 class="mt-1 text-primary">Etapa 3</h5>
                <i class="far fa-circle fa-2x text-secondary"></i>
                <h5 class="mt-1">Inscrição Concluida</h5>
            </div>
        </div>

    </div>
</section>


<!--</body>-->
<?php require 'views/HeaderFooter/Footer.php' ?>
