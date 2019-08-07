<!--Load Header - Menu is loaded into Header-->
<?php require 'views/HeaderFooter/Header.php'; ?>

<style>
    .hp{
        background-color: #31b0d5;
        height: 500px;
    }
</style>
<?php
//var_dump($this->data) 

if (isset($this->courseData)) {
    $this->course = $this->courseData;
    $this->payment = $this->paymentMethodData;
}

?>



<div class="container">

    <div class="row mt-5">
        <div class="col-lg-12">
            <h3>Cadastro de Cursos</h3>
        </div>
    </div>

    <form action="/course/cadastros" id="course" name="course" method="POST" enctype="multipart/form-data" >

        <!--DADOS GERAIS DO CURSO-->
        <div class="row mt-2">
            <div class="col-lg-2 form-group">
                <label for="courseId">Código do Curso</label>
                <input id="courseId" type="text" name="courseId" class="form-control" value="<?php echo isset($this->course) ? $this->course->courseId : false; ?>" readonly>    
            </div>
            <div class="col-lg-2 form-group">
                <label for="courseActive">Curso Ativo</label>
                <select id="courseActive" name="courseActive" class="form-control">
                    <option value="1">Sim</option>
                    <option value="0">Não</option>
                </select>
            </div>
            <div class="col-lg-2 form-group">
                <label for="showHomePage">Exibir na Página Inicial</label>
                <select id="showHomePage" name="showHomePage" class="form-control">
                    <option value="1">Sim</option>
                    <option value="0">Não</option>
                </select>
            </div>
            <div class="col-lg-2 form-group">
                <label for="homePosition">Posição</label>
                <select id="homePosition" name="homePosition" class="form-control">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>

                </select>
            </div>
        </div>

        <div class="row mt-2">

            <div class="col-lg-12 form-group">
                <label for="courseName">Nome do Curso</label>
                <input id="courseName" type="text" name="courseName" class="form-control" value="<?php echo isset($this->course) ? $this->course->courseName : false; ?>">    
            </div>
        </div>

        <div class="row mt-2">
            <div class="col-lg-6">
                <label for="subscribeStartDate">Inicio das Inscrições</label>
                <input type="date" class="form-control" id="subscribeStartDate" name="subscribeStartDate" 
                       value="<?php echo isset($this->course) ? $this->course->subscribeStartDate : false; ?>">
            </div>
            <div class="col-lg-6">
                <label for="subscribeEndDate">Fim das Inscrições</label>
                <input type="date" class="form-control" id="subscribeEndDate" name="subscribeEndDate" 
                       value="<?php echo isset($this->course) ? $this->course->subscribeEndDate : false; ?>">
            </div>
        </div>
        <!-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->

        <!--CARREGAMENTO DE IMAGENS-->
        <div class="row mt-5">

            <div class="form-group col-lg-6">
                <label for="smallPicture">Imagem da pagina Inicial</label>
                <input type="file" class="form-control" id="smallPicture" name="smallPicture" 
                       placeholder="smallPicture">
                <div id="smallPicturePreview">
                    <img widht="370" height="200" id="smallPicturePreviewing" src="<?php echo isset($this->course) ? "/public/upload/" . $this->course->smallPicture : "/public/img/noImage.png"; ?>" />
                    <p id="message"></p>
                </div>
            </div>
            <div class="form-group col-lg-6">
                <label for="largePicture">Imagem na pagina "Detalhes Curso"</label>
                <input type="file" class="form-control" id="largePicture" name="largePicture" 
                       placeholder="largePicture">
                <div id="largePicturePreview">
                    <img widht="370" height="200" id="largePicturePreviewing" src="<?php echo isset($this->course) ? "/public/upload/" . $this->course->largePicture : "/public/img/noImage.png"; ?>" />
                </div>
            </div>

        </div>
        <!-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->


        <div class="row mt-5">
            <div class="col-lg-12">
                <label for="shortDescription">Descrição Curta (Usada na Home Page)</label>
                <textarea rows="5" maxlength="400"  class="form-control editable" id="shortDescription" name="shortDescription">
                    <?php echo isset($this->course) ? $this->course->shortDescription : false; ?>
                </textarea>
            </div>
        </div>


        <!--DADOS DE PAGAMENTO-->
        <div class="row mt-5">
            <div class="col-lg-4">
                <label for="coursePrice">Valor do Curso</label>
                <input id="coursePrice" type="text" name="coursePrice" class="form-control" value="<?php echo isset($this->course) ? $this->course->coursePrice : false; ?>">
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-lg-12">

                <table class="table" >
                    <thead>
                        <tr class="d-flex">
                            <th class="col-2">Meio de Pagamento</th>
                            <th class="col-2">Aceito?</th>
                            <th class="col-2">Parcelas</th>
                            <th class="col-2">Desconto</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="d-flex">
                            <td class="col-2">Cartão de Crédito</td>
                            <td class="col-2">
                                <input id="acceptCreditCard" type="checkbox" name="acceptCreditCard" value=""> </td>
                            <td class="col-2">
                                <input id="creditCardInterests" type="text" name="creditCardInterests" class="form-control" value="<?php echo isset($this->payment) ? $this->payment->creditCardInterests : 0; ?>" >    
                            </td>
                            <td class="col-2"> 
                                <input id="creditCardDiscount" type="text" name="creditCardDiscount" class="form-control" value="<?php echo isset($this->payment) ? $this->payment->creditCardDiscount : 0; ?>" >    
                            </td>
                        </tr>
                        <tr class="d-flex">
                            <td class="col-2">Cartão de Débito</td>
                            <td class="col-2">
                                <input id="acceptDebitCard" type="checkbox" name="acceptDebitCard" value="1">
                            </td>
                            <td class="col-2">
                                <input id="debitCardInterests" type="text" name="debitCardInterests" class="form-control" value="<?php echo isset($this->payment) ? $this->payment->debitCardInterests : 0; ?>">    
                            </td>
                            <td class="col-2"> 
                                <input id="debitCardDiscount" type="text" name="debitCardDiscount" class="form-control" value="<?php echo isset($this->payment) ? $this->payment->debitCardDiscount : 0; ?>">    
                            </td>
                        </tr>
                        <tr class="d-flex">
                            <td class="col-2">Boleto</td>
                            <td class="col-2">
                                <input id="acceptBoleto" type="checkbox" name="acceptBoleto" value="1">
                            </td>
                            <td class="col-2">
                                <input id="boletoInterests" type="text" name="boletoInterests" class="form-control" value="<?php echo isset($this->payment) ? $this->payment->boletoInterests : 0; ?>" >    
                            </td>
                            <td class="col-2"> 
                                <input id="boletoDiscount" type="text" name="boletoDiscount" class="form-control" value="<?php echo isset($this->payment) ? $this->payment->boletoDiscount : 0; ?>">    
                            </td>
                        </tr>
                        <tr class="d-flex">
                            <td class="col-2">Depósito</td>
                            <td class="col-2">
                                <label> 
                                    <input id="acceptDeposit" type="checkbox" name="acceptDeposit" value="">
                                </label> 
                            </td>
                            <td class="col-2"> 
                                <input id="depositInterests" type="text" name="depositInterests" class="form-control" value="<?php echo isset($this->payment) ? $this->payment->depositInterests : 0; ?>">   
                            </td>
                            <td class="col-2"> 
                                <input id="depositDiscount" type="text" name="depositDiscount" class="form-control" value="<?php echo isset($this->payment) ? $this->payment->depositDiscount : 0; ?>">   
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
        <div class="row mt-5">
            <div class="col-lg-12">
                <label for="longDescription">Descrição Longa (Copy)</label>
                <textarea rows="20" maxlength="400"  class="form-control editable" id="longDescription" name="longDescription">
                    <?php echo isset($this->course) ? $this->course->longDescription : false; ?>
                </textarea>
            </div>
        </div>

        <!--DETALHES DO CURSO-->
        <div class="row mt-5" style="display: none">

            <div class="col-lg-12">
                <div>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="tabs-1" data-toggle="tab" href="#tab-1" role="tab" aria-controls="1" aria-selected="true"><?php echo isset($this->data) ? $this->data->tab1Name : "Aba 1"; ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tabs-2" data-toggle="tab" href="#tab-2" role="tab" aria-controls="2" aria-selected="false">Agenda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tabs-3" data-toggle="tab" href="#tab-3" role="tab" aria-controls="3" aria-selected="false">Informações Gerais</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tabs-4" data-toggle="tab" href="#tab-4" role="tab" aria-controls="4" aria-selected="false">Aba4</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tabs-5" data-toggle="tab" href="#tab-5" role="tab" aria-controls="5" aria-selected="false">Aba5</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <div class="tab-content" id="myTabContent">

                        <!--TAB1-->
                        <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row mt-2">
                                <div class="col-lg-10">
                                    <label for="tab1Name">Titulo da Aba</label>
                                    <input id="tab1Name" type="text" name="tab1Name" class="form-control" value="<?php echo isset($this->course) ? $this->course->tab1Name : "Aba 1"; ?>">      
                                </div>
                                <div class="col-lg-2">
                                    <label for="tab1Active">Aba Ativa?</label>
                                    <select id="status" name="tab1Active" class="form-control">
                                        <option value="1">Sim</option>
                                        <option value="0">Não</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-lg-12">
                                    <label for="tab1Content">Conteúdo</label>
                                    <textarea rows="10" maxlength="400"  class="form-control editable" id="tab1Content" name="tab1Content"></textarea>
                                </div>
                            </div>
                        </div>

                        <!--TAB2-->
                        <div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="row mt-2">
                                <div class="col-lg-10">
                                    <label for="tab2Name">Titulo da Aba</label>
                                    <input id="tab2Name" type="text" name="tab2Name" class="form-control">    
                                </div>
                                <div class="col-lg-2">
                                    <label for="tab2Active">Aba Ativa?</label>
                                    <select id="status" name="tab2Active" class="form-control">
                                        <option value="1">Sim</option>
                                        <option value="0">Não</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-lg-12">
                                    <label for="tab2Content">Conteúdo</label>
                                    <textarea rows="10" maxlength="400"  class="form-control editable" id="tab2Content" name="tab2Content"></textarea>
                                </div>
                            </div>
                        </div>

                        <!--TAB3-->
                        <div class="tab-pane fade" id="tab-3" role="tabpanel" aria-labelledby="contact-tab"> 
                            <div class="row mt-2">
                                <div class="col-lg-10">
                                    <label for="tab3Name">Titulo da Aba</label>
                                    <input id="tab3Name" type="text" name="tab3Name" class="form-control">      
                                </div>
                                <div class="col-lg-2">
                                    <label for="tab3Active">Aba Ativa?</label>
                                    <select id="status" name="tab3Active" class="form-control">
                                        <option value="1">Sim</option>
                                        <option value="0">Não</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-lg-12">
                                    <label for="tab3Content">Conteúdo</label>
                                    <textarea rows="10" maxlength="400"  class="form-control editable" id="tab3Content" name="tab3Content"></textarea>
                                </div>
                            </div>
                        </div>

                        <!--TAB4-->
                        <div class="tab-pane fade" id="tab-4" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="row mt-2">
                                <div class="col-lg-10">
                                    <label for="tab4Name">Titulo da Aba</label>
                                    <input id="tab4Name" type="text" name="tab4Name" class="form-control"> 
                                </div>
                                <div class="col-lg-2">
                                    <label for="tab4Active">Aba Ativa?</label>
                                    <select id="status" name="tab4Active" class="form-control">
                                        <option value="1">Sim</option>
                                        <option value="0">Não</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-lg-12">
                                    <label for="tab4Content">Conteúdo</label>
                                    <textarea rows="10" maxlength="400"  class="form-control editable" id="tab4Content" name="tab4Content"></textarea>
                                </div>
                            </div>
                        </div>

                        <!--TAB5-->
                        <div class="tab-pane fade" id="tab-5" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="row mt-2">
                                <div class="col-lg-10">
                                    <label for="tab5Name">Titulo da Aba</label>
                                    <input id="tab5Name" type="text" name="tab5Name" class="form-control">      
                                </div>
                                <div class="col-lg-2">
                                    <label for="tab5Active">Aba Ativa?</label>
                                    <select id="status" name="tab5Active" class="form-control">
                                        <option value="1">Sim</option>
                                        <option value="0">Não</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-lg-12">
                                    <label for="tab5Content">Conteúdo</label>
                                    <textarea rows="40" maxlength="400"  class="form-control editable" id="tab5Content" name="tab5Content">               
                                    </textarea>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
        <input class="btn btn-lg btn-primary mt-3 mb-5 float-right " type="submit" value="Enviar" />
    </form>

</div>

<script>

    $(document).ready(function () {
        tinymce.init({
            selector: "textarea", // change this value according to your html
            plugins: "textcolor colorpicker lists code media link preview",
            toolbar: "forecolor backcolor formatselect | bold italic strikethrough forecolor backcolor permanentpen formatpainter | link image media pageembed | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent | removeformat | addcomment'"
        });
    });

    $(document).ready(function (e) {

        $(function () {
            $("#smallPicture").change(function () {
                $("#message").empty(); // To remove the previous error message
                var file = this.files[0];
                var imagefile = file.type;
                var match = ["image/jpeg", "image/png", "image/jpg"];
                if (!((imagefile == match[0]) || (imagefile == match[1]) || (imagefile == match[2])))
                {
                    $('#smallPicturePreviewing').attr('src', '/public/img/noImage.png');
                    $("#message").html("<p id='error'>Please Select A valid Image File</p>" + "<h4>Note</h4>" + "<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
                    return false;
                } else
                {
                    var reader = new FileReader();
                    reader.onload = loadSmallImage;
                    reader.readAsDataURL(this.files[0]);
                }
            });

            $("#largePicture").change(function () {
                $("#message").empty(); // To remove the previous error message
                var file = this.files[0];
                var imagefile = file.type;
                var match = ["image/jpeg", "image/png", "image/jpg"];
                if (!((imagefile == match[0]) || (imagefile == match[1]) || (imagefile == match[2])))
                {
                    $('#largePicturePreviewing').attr('src', '/public/img/noImage.png');
                    $("#message").html("<p id='error'>Please Select A valid Image File</p>" + "<h4>Note</h4>" + "<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
                    return false;
                } else
                {
                    var reader = new FileReader();
                    reader.onload = loadLargeImage;
                    reader.readAsDataURL(this.files[0]);
                }
            });
        });

        function loadLargeImage(e) {
            $("#file").css("color", "green");
            $('#largePicturePreview').css("display", "block");
            $('#largePicturePreviewing').attr('src', e.target.result);
            $('#largePicturePreviewing').attr('width', '370px');
            $('#largePicturePreviewing').attr('height', '200px');
        }
        ;

        function loadSmallImage(e) {

            $("#file").css("color", "green");
            $('#smallPicturePreview').css("display", "block");
            $('#smallPicturePreviewing').attr('src', e.target.result);
            $('#smallPicturePreviewing').attr('width', '370px');
            $('#smallPicturePreviewing').attr('height', '200px');
        }
        ;

        if ($("#courseId").val() === "") {

            $("#course").attr("action", "/course/cadastros");

        } else {

            $("#course").attr("action", "/course/update");

        }

<?php
if (isset($this->payment)) {

    echo ($this->payment->acceptCreditCard ? "$( '#acceptCreditCard' ).prop( 'checked', true );" : false);
    echo ($this->payment->acceptDebitCard ? "$( '#acceptDebitCard' ).prop( 'checked', true );" : false);
    echo ($this->payment->acceptBoleto ? "$( '#acceptBoleto' ).prop( 'checked', true );" : false);
    echo ($this->payment->acceptDeposit ? "$( '#acceptDeposit' ).prop( 'checked', true );" : false);
};
?>



        // Set <option> tags
        $('#courseActive').val(<?php echo isset($this->course) ? $this->course->courseActive : false; ?>);
        $('#showHomePage').val(<?php echo isset($this->course) ? $this->course->showHomePage : false; ?>);
        $('#homePosition').val(<?php echo isset($this->course) ? $this->course->homePosition : false; ?>);

        // Configure input validation
        $("form[name='course']").validate({

            rules: {

                subscribeStartDate: "required",
                subscribeEndDate: "required",

                shortDescription: {
                    rangelength: [50, 100]
                }

            },

            messages: {
                subscribeStartDate: {
                    required: "Preenchimento Obrigatório"
                },
                subscribeEndDate: {
                    required: "Preenchimento Obrigatório"
                }
            }
        });



    });
</script>