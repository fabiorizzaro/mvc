<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>




    <body>

        <!-- Java Script External Files -->
        <script src="jQuery/jquery-3.1.0.js" type="text/javascript"></script>
        <script src="Bootstrap/js/bootstrap.js" type="text/javascript"></script>
        <script src="jQuery/jquery.mask.min.js" type="text/javascript"></script>



        <div>
            <form id="quickSearch">
                SQL: 
                <input type="text" size="100" value="select * from students" name="query">
                <input type="button" value="OK" onclick="consulta();">
            </form>


        </div>

        <div id="response"></div>


        <script>

            function consulta() {


                $.ajax({

                    type: 'POST',
                    url: 'Controler/cursoControler.php',
                    data: $('#quickSearch').serialize()

                })
                        .done(function (data, status) {

                            $('#response').html(data);
                        })

                        .fail(function (data) {



                        });
            }
        </script>



    </body>

</html>
