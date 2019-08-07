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
                    <h3><?php echo isset($this->data) ? $this->data['title'] : false; ?></h3>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-12 text-center">
                    <img src="<?php echo isset($this->data) ? "/public/upload/" . $this->data['largePicture'] : false; ?>" alt="" class="img-fluid"/>
                    <!--<img src="../../public/img/noImage_760x320.png" alt="" class="img-fluid"/>-->
                </div>
            </div>

            <div class="row m-2 justify-content-center">
                <div class="col-lg-8 m-2">
                    <a href="<?php echo '/subscribe/main/' . $this->data['courseId'] ?>" class="btn btn-success" style="width: 100%">Inscreva-se</a>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-lg-12">

                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="tabs-1" data-toggle="tab" href="#tab-1" role="tab" aria-controls="1" aria-selected="true"><?php echo isset($this->data) ? $this->data['tab1Name'] : false; ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tabs-2" data-toggle="tab" href="#tab-2" role="tab" aria-controls="2" aria-selected="false"><?php echo isset($this->data) ? $this->data['tab2Name'] : false; ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tabs-3" data-toggle="tab" href="#tab-3" role="tab" aria-controls="3" aria-selected="false"><?php echo isset($this->data) ? $this->data['tab3Name'] : false; ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tabs-4" data-toggle="tab" href="#tab-4" role="tab" aria-controls="4" aria-selected="false"><?php echo isset($this->data) ? $this->data['tab4Name'] : false; ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="tabs-5" data-toggle="tab" href="#tab-5" role="tab" aria-controls="5" aria-selected="false"><?php echo isset($this->data) ? $this->data['tab5Name'] : false; ?></a>
                        </li>
                    </ul>

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="home-tab">
                            <?php echo isset($this->data) ? $this->data['tab1Content'] : false; ?>
                        </div>
                        <div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="profile-tab">
                            <?php echo isset($this->data) ? $this->data['tab2Content'] : false; ?>
                        </div>
                        <div class="tab-pane fade" id="tab-3" role="tabpanel" aria-labelledby="contact-tab">
                            <?php echo isset($this->data) ? $this->data['tab3Content'] : false; ?>
                        </div>
                        <div class="tab-pane fade" id="tab-4" role="tabpanel" aria-labelledby="contact-tab">
                            <?php echo isset($this->data) ? $this->data['tab4Content'] : false; ?>
                        </div>
                        <div class="tab-pane fade" id="tab-5" role="tabpanel" aria-labelledby="contact-tab">
                            <?php echo isset($this->data) ? $this->data['tab5Content'] : false; ?>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row m-2 justify-content-center">
                <div class="col-lg-8 m-2">
                    <a href="<?php echo '/subscribe/main/' . $this->data['courseId'] ?>" class="btn btn-success" style="width: 100%">Inscreva-se</a>
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