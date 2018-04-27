<!--Load Header - Menu is loaded into Header-->
<?php require 'views/HeaderFooter/Header.php'; ?>

<!--<body>-->


<!--******************************************************************************************************** -->
<!--***************************************** COURSE FEATURED ********************************************** -->
<!--******************************************************************************************************** -->

<div class="container container-course-featured">
    <div class="row" >

        <div class="col-md-6 col-sm-12 col-xs-12">
            <img width="370" src="<?php echo isset($this->data) ? "/mvc/public/upload/" . $this->data['smallPicture'] : false; ?>" alt="" class="img-responsive"/>
        </div>

        <div class="col-md-6 col-sm-12 col-xs-12" >

            <!-- Titulo do Curso -->
            <h1><?php echo isset($this->data) ? $this->data['title'] : false; ?></h1>
            <p class="p-featured">
                <?php echo isset($this->data) ? $this->data['shortDescription'] : false; ?>
            </p>

            <br>
            <a href="<?php echo  '/mvc/subscribe/main/' . $this->data['courseId']?>" style="text-decoration: none;"> <div class="button button-big">Faça sua Inscrição</div></a>
        </div>
    </div>
</div>

<!--******************************************************************************************************** -->
<!--***************************************** COURSE DETAILS *********************************************** -->
<!--******************************************************************************************************** -->

<div class="container container-course-deatails">
    <div class="row">
        <div class="col-md-6">

            <!--************************** CONTEÚDO ************************** -->

            <div class="row row-course-details">
                <div class="col-md-1 col-sm-1 col-xs-2">
                    <img src="/mvc/public/img/iconContent.svg" alt=""/>
                </div>
                <div class="col-md-9 col-xs-9">
                    <h6 class="h6-noTopMargin">Conteúdo</h6>
                    <p><?php echo isset($this->data) ? $this->data['longDescription'] : false; ?></p>
                </div>
            </div>

            <!--************************* DATA&HORA ************************* -->

            <div class="row row-course-details">
                <div class="col-md-1 col-sm-1 col-xs-2">
                    <img src="/mvc/public/img/iconCalendar.svg" alt=""/>
                </div>
                <div class="col-md-9 col-xs-9" >
                    <h6 class="h6-noTopMargin">Data&Hora:</h6>
                    <p><?php echo isset($this->data) ? $this->data['dateTimeDesc'] : false; ?></p>
                </div>
            </div>

            <!--************************ CARGA HORÁRIA ************************ -->

            <div class="row row-course-details">
                <div class="col-md-1 col-sm-1 col-xs-2">
                    <img src="/mvc/public/img/iconTotalTime.svg" alt=""/>
                </div>
                <div class="col-md-9 col-xs-9">
                    <h6 class="h6-noTopMargin">Carga Horária</h6>
                    <p><?php echo isset($this->data) ? $this->data['loadTimeDesc'] : false; ?></p>
                </div>
            </div>

            <!--************************** MATERIAL ************************** -->

            <div class="row row-course-details">
                <div class="col-md-1 col-sm-1 col-xs-2">
                    <img src="/mvc/public/img/iconMaterial.svg" alt=""/>
                </div>
                <div class="col-md-9 col-xs-9">
                    <h6 class="h6-noTopMargin">Material</h6>
                    <p><?php echo isset($this->data) ? $this->data['materialDesc'] : false; ?></p>
                </div>
            </div>


        </div>

        <div class="col-md-6">



            <!--************************ PÚBLICO ALVO ************************ -->

            <div class="row row-course-details">
                <div class="col-md-1 col-sm-1 col-xs-2" >
                    <img src="/mvc/public/img/iconTarget.svg" alt=""/>
                </div>
                <div class="col-md-9 col-xs-9">
                    <h6 class="h6-noTopMargin">Público Alvo</h6>
                    <p><?php echo isset($this->data) ? $this->data['targetDesc'] : false; ?></p>
                </div>
            </div>

            <!--************************** ENDEREÇO ************************** -->

            <div class="row row-course-details">
                <div class="col-md-1 col-sm-1 col-xs-2">
                    <img src="/mvc/public/img/iconLocation.svg" alt=""/>
                </div>
                <div class="col-md-9 col-xs-9">
                    <h6 class="h6-noTopMargin">Endereço</h6>
                    <p><?php echo isset($this->data) ? $this->data['addressDesc'] : false; ?></p>
                </div>
            </div>

            <!--************************ INVESTIMENTO ************************ -->

            <div class="row row-course-details">
                <div class="col-md-1 col-sm-1 col-xs-2">
                    <img src="/mvc/public/img/iconCoin.svg" alt=""/>
                </div>
                <div class="col-md-9 col-xs-9">
                    <h6 class="h6-noTopMargin">Investimento</h6>
                    <p>R$ <?php echo isset($this->data) ? $this->data['price'] : false; ?></p>
                </div>
            </div>

            <!--************************ PAGAMENTO ************************ -->

            <div class="row row-course-details">
                <div class="col-md-1 col-sm-1 col-xs-2">
                    <img src="/mvc/public/img/iconPaymentMethod.svg" alt=""/>
                </div>
                <div class="col-md-9 col-xs-9">
                    <h6 class="h6-noTopMargin">Condições de Pagamento</h6>
                    <p><?php echo isset($this->data) ? $this->data['paymentMethodDesc'] : false; ?></p>
                </div>
            </div>

            <!--************************** FORMADOR ************************** -->

            <div class="row row-course-details">
                <div class="col-md-1 col-sm-1 col-xs-2">
                    <img src="/mvc/public/img/iconTeacher.svg" alt=""/>
                </div>
                <div class="col-md-9 col-xs-9">
                    <h6>Formadores:</h6>
                    <p><?php echo isset($this->data) ? $this->data['teachersDesc'] : false; ?></p>
                </div>
            </div>





        </div>

        <!--************************** BOTÃO ************************** -->
        <div class="button button-big">Faça sua Inscrição</div>
    </div>
</div>

<div class="container" style="margin-top: 20px; ">

    <div class="row" style="background-color: #eee; ">

        <div class="col-md-1 col-sm-1 col-xs-2" style="padding-top: 20px" >
            <img width="40" src="/mvc/public/img/iconWarning.svg">
        </div>

        <div class="col-md-9 col-xs-9" style="padding-top: 20px">

            <h6>Informações Adicionais</h6>
           
                                </br>

                    <h6>Numero Minimo de Alunos:</h6>
                    <p>O Instituto Alliqua se reserva ao direito de não realizar o curso/treinamento acima descrito, 
                        caso o numero minimo de inscritos confirmados seja atingido.
                    </p>
                
                    <h6>Cancelamento</h6>
                    <p>Caso o curso seja cancelado por não atingir o numero minimo de alunos, 
                        o valor pago será devolvido integalmente. Caso o pagamento tenha sido efetuado via
                        cartão de crédito, o valor estará disponível na próxima fatura. Caso tenha sido efetuado
                        por boleto bancário, entraremos em contato para solicitar os dados bancários para efetuarmos
                        o estorno em até 5 dias úteis.
                    </p>
                
                    <h6>Técnologia:</h6>
                    <p>
                        É impressindivél que o aluno possua e-mail. Nossa metologia envolve o envio de materiais 
                        auxiliares.
                    </p>
               
        </div>



    </div>
</div>
</body>
</html>
