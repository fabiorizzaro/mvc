<?php require 'HeaderFooter/Header.php'; ?>
<!--<body>-->
<style>



</style>

<div class="container">
    <div class="row align-items-start justify-content-center" style="height: 200px; background-color: #ccc; margin-top: 5px">
        <div class="col col-12 col-lg-2 bg-primary">
            One of three columns
        </div>
        <div class="col col-12 col-lg-4 align-self-center">
            <div class="bg-danger justify-content-center align-items-center d-flex border" style="height: 100px;">
                <div>teste</div>
            </div>
        </div>
        <div class="col col-12 col-lg-2">
            One of three columns
        </div>
    </div>
    <div class="row align-items-center" style="height: 200px; background-color: #ccc; margin-top: 5px">
        <div class="col">
            One of three columns
        </div>
        <div class="col">
            One of three columns
        </div>
        <div class="col">
            One of three columns
        </div>
    </div>
    <div class="row align-items-end" style="height: 200px; background-color: #ccc; margin-top: 5px">
        <div class="col">
            One of three columns
        </div>
        <div class="col">
            One of three columns
        </div>
        <div class="col">
            One of three columns
        </div>
    </div>
</div>
<!--</body>-->

<script type="text/javascript" src=
        "https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js">
            $(document).ready(function () {

                PagSeguroDirectPayment.getPaymentMethods({
                    success: function (response) {
                        console.log(response);
                    },
                    error: function (response) {
                        console.log(response);
                    },
                    complete: function (response) {
                        console.log(response);
                    }
                });

            });
</script>
<?php require 'HeaderFooter/Footer.php'; ?>
