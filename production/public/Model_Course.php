<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Instituto Alliqua - TDAH: Reflexões para criar possibilidades</title>

        <!-- CSS External Files -->
        <link href="Bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="CoursesStyle.css" rel="stylesheet" type="text/css"/>

    </head>



    <!-- Java Script External Files -->
    <script src="jQuery/jquery-3.1.0.js" type="text/javascript"></script>
    <script src="Bootstrap/js/bootstrap.js" type="text/javascript"></script>
    <body>

        <form id="subscribe">
            <input name="token" type="hidden" value="8B02AFD591FF796405C52067BD0E663A6D0464ED6C62147E">
            Nome: <br>
            <input name="payerName" type="text" maxlength="60" value="Fabio"><br>
            E-Mail: <br>
            <input name="payerEmail" type="text" maxlength="60"><br>
            CPF: <br>
            <input name="payerCpfCnpj" type="text" value="22317063857"><br>
            Descrição: <br>
            <input name="description" type="text" value="teste"><br>
            Valor:<br>
            <input name="amount" type="text" value="100.00"><br><br>

            <input type="submit" value="testar">    

        </form>

        <select name="curso" id="csd">
            <option value="TDAH">TDAH: Reflexões para criar possibilidades</option>
            <option value="TEA">TEA: Autismo No Ensino Regular</option>
            <option value="EI">Educação Inclusiva: Caminhos Para Autonomia</option>
        </select>

        <input type="radio" name="payment" value="deposito">Depósito Bancario<br>
        <input type="radio" name="payment" value="boleto">Boleto<br>

        <button onclick="check();">teste</button>

        <div id='response'></div>




        <script>

            function check() {

                var paymentMode = $('input[name=payment]:checked').val();

                if (paymentMode == 'deposito') {

                    $('#response').html("<b>Dados depósito</b>");

                    $('#response').append($('input[name=payment]:checked').val());

                } else {

                    $('#response').html("<b>Loading response...</b>");

                    var formData = 'token=8B02AFD591FF796405C52067BD0E663A6D0464ED6C62147E'
                            + 'payerName' + $('nomeCompleto').val()
                            + 'payerEmail' + $('email').val()
                            + 'payerCpfCnpj' + $('cpf').val()
                            + 'description' + $('curso').val()
                            + 'amount=95.00';
                    
                    $.ajax({
                        type: 'POST',
                        url: 'https://sandbox.boletobancario.com/boletofacil/integration/api/v1/issue-charge?',
                        data: $('#subscribe').serialize(),
                        dataType: 'json'
                    })
                            .done(function (data, status) {

                                // show the response
                                $('#response').html("<br> Success: " + data.data.charges[0].code);

                            })
                            .fail(function () {

                                // just in case posting your form failed
                                alert("Posting failed.");

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
</html>