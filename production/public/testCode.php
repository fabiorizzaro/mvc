<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <script type="text/javascript"
                src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js">
        </script>
        <script type="text/javascript" src=
                "https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js">
        </script>

        <form method="post" target="pagseguro"  
              action="https://ws.sandbox.pagseguro.uol.com.br/v2/sessions">  

            <!-- Campos obrigatórios -->  
            <input name="email" type="hidden" value="fabio.rizzaro@gmail.com">  
            <input name="token" type="hidden" value="7EC67A495E69416AB898BFB7D90669CE">
            <input name="redirectURL" type="hidden" value="http://alliqua.com.br">
            <input name="currency" type="hidden" value="BRL">  

            <!-- Itens do pagamento (ao menos um item é obrigatório) -->  
            <input name="itemId1" type="hidden" value="0001">  
            <input name="itemDescription1" type="hidden" value="Notebook Prata">  
            <input name="itemAmount1" type="hidden" value="24300.00">  
            <input name="itemQuantity1" type="hidden" value="1">  
            <input name="itemWeight1" type="hidden" value="1000">  
            <input name="itemId2" type="hidden" value="0002">  
            <input name="itemDescription2" type="hidden" value="Notebook Rosa">  
            <input name="itemAmount2" type="hidden" value="25600.00">  
            <input name="itemQuantity2" type="hidden" value="2">  
            <input name="itemWeight2" type="hidden" value="750">  

            <!-- submit do form (obrigatório) -->  
            <input alt="Pague com PagSeguro" name="submit"  type="image"  
                   src="https://p.simg.uol.com.br/out/pagseguro/i/botoes/pagamentos/120x53-pagar.gif"/>  

            
            
        </form>  
        <button onclick="gethash()">vai</button>
        <script>

            function gethash() {

                alert(PagSeguroDirectPayment.getSenderHash());

            }



        </script>


    </body>

</html>

