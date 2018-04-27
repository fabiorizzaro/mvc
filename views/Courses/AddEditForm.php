<!--Load Header - Menu is loaded into Header-->
<?php require 'views/HeaderFooter/Header.php'; ?>

<!--<body>-->

<?php

if (isset($this->data)) {
    $displayPosition = $this->data['displayPosition'];
} else {
    $displayPosition = 0;
}
if (isset($this->data)) {
    $homeDisplay = $this->data['homeDisplay'];
} else {
    $homeDisplay = 0;
} 

if (isset($this->data)) {
    $status = $this->data['status'];
} else {
    $status = 0;
}
?>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <form action="" id="course" method="POST" enctype="multipart/form-data" >
                <div class="row">
                    <div class="form-group col-lg-2">
                        <label for="courseId">Código do Curso</label>
                        <input type="text" class="form-control" id="courseId" name="courseId" 
                               placeholder="Gerado Automaticamente" readonly value="<?php echo isset($this->data) ? $this->data['courseId'] : false; ?>">
                    </div>

                    <div class="form-group col-lg-2">
                        <label for="status">Status do Curso</label>
                        <select id="status" name="status" class="form-control">
                            <option <?php echo $status == '1' ? "selected" : false; ?> value="1">Aberto</option>
                            <option <?php echo $status == '0' ? "selected" : false; ?> value="0">Fechado</option>
                        </select>
                    </div>
                    <div class="form-group col-lg-2">
                        <label for="homeDisplay ">Exibir na Home?</label>
                        <select id="homeDisplay " name="homeDisplay" class="form-control">
                            <option <?php echo $homeDisplay == '1' ? "homeDisplay" : false; ?> value="0">Não</option>
                            <option <?php echo $homeDisplay == '2' ? "homeDisplay" : false; ?> value="1">Sim</option>
                        </select>
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="diplayPosition">Posição na Home Page?</label>
                        <select id="diplayPosition" name="displayPosition" class="form-control">
                            <option <?php echo $displayPosition == '1' ? "selected" : false; ?> value="1">1</option>
                            <option <?php echo $displayPosition == '2' ? "selected" : false; ?> value="2">2</option>
                            <option <?php echo $displayPosition == '3' ? "selected" : false; ?> value="3">3</option>
                            <option <?php echo $displayPosition == '4' ? "selected" : false; ?> value="4">4</option>
                            <option <?php echo $displayPosition == '5' ? "selected" : false; ?> value="5">5</option>
                            <option <?php echo $displayPosition == '6' ? "selected" : false; ?> value="6">6</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-12">
                        <label for="name">Nome do Curso</label>
                        <input type="text" class="form-control" id="name" name="name" 
                               placeholder="Nome do Curso" value="<?php echo isset($this->data) ? $this->data['title'] : false; ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-5">
                        <label for="shortDescription">Descrição Curta</label>
                        <textarea rows="10" maxlength="400"  class="form-control" id="shortDescription" name="shortDescription" 
                                  placeholder="Descrição Curta"><?php echo isset($this->data) ? $this->data['shortDescription'] : false; ?></textarea>
                    </div>
                    <div class="form-group col-lg-5">
                        <label for="smallPicture">Imagem Home</label>
                        <input type="file" class="form-control" id="smallPicture" name="smallPicture" 
                               placeholder="Imagem Home"  value="<?php echo isset($this->data) ? $this->data['smallPicture'] : false; ?>">
                        <div id="smallPicturePreview">
                            <img widht="370" height="200" id="smallPicturePreviewing" src="<?php echo isset($this->data) ? ABS_PATH. "/public/upload/" . $this->data['smallPicture'] : false; ?>" />
                            <p id="message"></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-5">
                        <label for="longDescription">Descrição Longa</label>
                        <textarea rows="10" maxlength="400"  class="form-control" id="longDescription" name="longDescription" 
                                  placeholder="Descrição Longa"><?php echo isset($this->data) ? $this->data['longDescription'] : false; ?></textarea>
                    </div>
                    <div class="form-group col-lg-5">
                        <label for="largePicture">Imagem Detalhes Curso</label>
                        <input type="file" class="form-control" id="largePicture" name="largePicture" 
                               placeholder="largePicture">
                        <div id="largePicturePreview">
                            <img widht="370" height="200" id="largePicturePreviewing" src="<?php echo isset($this->data) ? ABS_PATH . $this->data['largePicture'] : false; ?>" />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-6">
                        <label for="subscribeStartDate">Inicio das Inscrições</label>
                        <input type="date" class="form-control" id="subscribeStartDate" name="subscribeStartDate" 
                               value="<?php echo isset($this->data) ? $this->data['subscribeStartDate'] : false; ?>">
                        
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="subscribeEndDate">Fim das Inscrições</label>
                        <input type="datetime-local" class="form-control" id="subscribeStartDate" name="subscribeEndDate" 
                               value="<?php echo isset($this->data) ? $this->data['subscribeEndDate'] : false; ?>">
                    </div>

                </div>
                </br>
                <p>Detalhes do Curso</p>
                <hr>
                <div class="row">
                    <div class="form-group col-lg-3 ">
                        <label for="dateTime">Data&Hora</label>
                        <textarea rows="3" maxlength="400"  class="form-control" id="dateTime" name="dateTime" 
                                  placeholder=""><?php echo isset($this->data) ? $this->data['dateTimeDesc'] : false; ?></textarea>
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="loadTime">Carga Horária</label>
                        <textarea rows="3" maxlength="400"  class="form-control" id="loadTime" name="loadTime" 
                                  placeholder=""><?php echo isset($this->data) ? $this->data['loadTimeDesc'] : false; ?></textarea>
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="material">Material</label>
                        <textarea rows="3" maxlength="400"  class="form-control" id="material" name="material" 
                                  placeholder=""><?php echo isset($this->data) ? $this->data['materialDesc'] : false; ?></textarea>
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="target">Público Alvo</label>
                        <textarea rows="3" maxlength="400"  class="form-control" id="target" name="target" 
                                  placeholder=""><?php echo isset($this->data) ? $this->data['targetDesc'] : false; ?></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-3 ">
                        <label for="address">Enderço</label>
                        <textarea rows="3" maxlength="400"  class="form-control" id="address" name="address" 
                                  placeholder=""><?php echo isset($this->data) ? $this->data['addressDesc'] : false; ?></textarea>
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="price">Investimento</label>
                        <textarea rows="3" maxlength="400"  class="form-control" id="price" name="price" 
                                  placeholder=""><?php echo isset($this->data) ? $this->data['price'] : false; ?></textarea>
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="paymentMethod">Formas de Pagamento</label>
                        <textarea rows="3" maxlength="400"  class="form-control" id="paymentMethod" name="paymentMethod" 
                                  placeholder=""><?php echo isset($this->data) ? $this->data['paymentMethodDesc'] : false; ?></textarea>
                    </div>
                    <div class="form-group col-lg-3">
                        <label for="teacher">Formadores</label>
                        <textarea rows="3" maxlength="400"  class="form-control" id="teacher" name="teacher" 
                                  placeholder=""><?php echo isset($this->data) ? $this->data['teachersDesc'] : false; ?></textarea>
                    </div>
                </div>
                <div class="row">

                    <div class="col-lg-12 right">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                        <button type="button" class="btn btn-danger">Cancelar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!--</body>-->
<?php require 'views/HeaderFooter/Footer.php'; ?>

<script>


//    Method to define the action of Save button

    if ($("#courseId").val() === "") {

        $("#course").attr("action", "/mvc/course/insert");

    } else {

        $("#course").attr("action", "/mvc/course/update");

    }

    $(document).ready(function (e) {

        $(function () {
            $("#smallPicture").change(function () {
                $("#message").empty(); // To remove the previous error message
                var file = this.files[0];
                var imagefile = file.type;
                var match = ["image/jpeg", "image/png", "image/jpg"];
                if (!((imagefile == match[0]) || (imagefile == match[1]) || (imagefile == match[2])))
                {
                    $('#smallPicturePreviewing').attr('src', 'noimage.png');
                    $("#message").html("<p id='error'>Please Select A valid Image File</p>" + "<h4>Note</h4>" + "<span id='error_message'>Only jpeg, jpg and png Images type allowed</span>");
                    return false;
                } else
                {
                    var reader = new FileReader();
                    reader.onload = imageIsLoaded;
                    reader.readAsDataURL(this.files[0]);
                }
            });
        });
        
        function imageIsLoaded(e) {
            $("#file").css("color", "green");
            $('#smallPicturePreview').css("display", "block");
            $('#smallPicturePreviewing').attr('src', e.target.result);
            $('#smallPicturePreviewing').attr('width', '370px');
            $('#smallPicturePreviewing').attr('height', '200px');
        }
        ;
        
        
    });

</script>
