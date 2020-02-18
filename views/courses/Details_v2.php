<!--Load Header - Menu is loaded into Header-->
<?php require 'views/HeaderFooter/Header.php'; ?>

<!--<body>-->
<style>
    .tab-pane{
        min-height: 400px;
    }
</style>

<div class="container">

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="row">
                <div class="col-lg-12 " >
                    <h3><?php echo isset($this->data) ? $this->data->courseName : false; ?></h3>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center">
<!--                    <img src="<?php echo isset($this->data) ? "/public/upload/" . $this->data->largePicture : false; ?>" alt="" class="img-fluid"/>-->
                    <img src="../../public/img/noImage_760x320.png" alt="" class="img-fluid"/>
                </div>
            </div>

            <div class="row m-2 justify-content-center">
                <div class="col-lg-8 m-2">
                    <a href="<?php echo '/subscribe/main/' . $this->data->courseId ?>" class="btn btn-success" style="width: 100%">Inscreva-se 2</a>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-lg-12">v2
                   <?php echo isset($this->data) ? $this->data->longDescription : false; ?>
                </div>
            </div>

            <div class="row m-2 justify-content-center">
                <div class="col-lg-8 m-2">
                    <a href="<?php echo '/subscribe/main/' . $this->data->courseId ?>" class="btn btn-success" style="width: 100%">Inscreva-se</a>
                </div>
            </div>
        </div>
    </div>


</div>



</body>
</html>
<script>


    $(window).on('load', function () {

        tab1 = <?php echo isset($this->data) ? $this->data['tab1Active'] : 0; ?>;
        tab2 = <?php echo isset($this->data) ? $this->data['tab2Active'] : 0; ?>;
        tab3 = <?php echo isset($this->data) ? $this->data['tab3Active'] : 0; ?>;
        tab4 = <?php echo isset($this->data) ? $this->data['tab4Active'] : 0; ?>;
        tab5 = <?php echo isset($this->data) ? $this->data['tab5Active'] : 0; ?>;


        if (tab1 < 1) {
            $("#tabs-1").hide();
            $("#tab-1").hide();
        }
        ;
        if (tab2 < 1) {
            $("#tabs-2").hide();
            $("#tab-2").hide();
        }
        ;
        if (tab3 < 1) {
            $("#tabs-3").hide();
            $("#tab-3").hide();
        }
        ;
        if (tab4 < 1) {
            $("#tabs-4").hide();
            $("#tab-4").hide();
        }
        ;
        if (tab5 < 1) {
            $("#tabs-5").hide();
            $("#tab-5").hide();
        }
        ;
    });

</script>