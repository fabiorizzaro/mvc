
<!--Load Header - Menu is loaded into Header-->
<?php require 'HeaderFooter/Header.php'; ?>
<link href="https://fonts.googleapis.com/css?family=Encode+Sans+Condensed:300,900" rel="stylesheet"> 
<style>

    /*Hero Image Gradiente*/
    .gradient{

        width: 100%;
        height: 500px;
        /*background-image: linear-gradient(to right bottom, #89f7fe, #63e6ff, #48d3ff, #4abeff, #66a6ff);*/
        background: #FFAFBD;  /* fallback for old browsers */
        background: -webkit-linear-gradient(to right, #ffc3a0, #FFAFBD);  /* Chrome 10-25, Safari 5.1-6 */
        background: linear-gradient(to right, #ffc3a0, #FFAFBD); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

    }


    .test{
        font-family: 'Encode Sans Condensed', sans-serif;
        font-weight: 900;
        color: white;
        font-size: 4rem;
    }

    .card-title{
        font-weight: 900;
    }

    .card{
       
        
    }

    a{
        color: black;
    }

    a:hover{
        color: #4e555b;
    }


</style>
<!--<body>-->

<!--Banner-->
<div class="container-fluid p-0 m-0">

    <div  style=" position: relative; overflow: hidden; background-image: url(../public/img/banner.jpg); background-position: center; height: 500px; width: 100%">

        <div class="vh-center sans-condensed">
            <span>ACREDITAMOS NA EDUCAÇÃO</span>
            <span>ACREDITAMOS EM VOCÊ </span>
        </div>
    </div> 

</div>

<!--Courses Section-->
<div id="courses" class="container">
    <div class="row">
        <div class="col-lg-12 mt-5">
            <h5>Nossos Cursos</h5>
        </div>
    </div>

    <div class="row">

        <?php for ($x = 0; $x < sizeof($this->courses); $x++) { ?> 
            <div class="col-lg-4 col-sm-6 col-xs-12">
                <div class="card mt-5 ">
                    <a href="course/details/<?php echo $this->courses[$x]['courseId'] ?>" style="text-decoration: none"><img class="card-img-top" src="/public/upload/<?php echo $this->courses[$x]['smallPicture'] ?>" alt=""/></a>
                    <div class="card-body ">
                        <h5 class="card-title"><a href="course/details/<?php echo $this->courses[$x]['courseId'] ?>" style="text-decoration: none"> <?php echo $this->courses[$x]['courseName'] ?></a></h5> 
                        <p class="card-text"><a href="course/details/<?php echo $this->courses[$x]['courseId'] ?>" style="text-decoration: none"><?php echo $this->courses[$x]['shortDescription'] ?></a></p>
                    </div>
                </div>
            </div>
        <?php } ?>

    </div>

    <div class="row">
        <div class="col-lg-12 mt-5">
            <h5>MATERIAIS PEDAGÓGICOS</h5>

            <?php
//            $date = DateTime::createFromFormat('d-M-Y', '15-Feb-2009');
            echo date_format(DateTime::createFromFormat('d-M-Y', '15-Feb-2009'), 'Y-m-d');
            ?>

        </div>
    </div>

</div>


</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>
</br>

<!--</body>-->
<?php require 'HeaderFooter/Footer.php'; ?>
