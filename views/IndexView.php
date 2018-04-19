
<!--Load Header - Menu is loaded into Header-->
<?php require 'HeaderFooter/Header.php'; ?>

<!--<body>-->

<div class="container-fluid gradient">

    <div class="row" style="overflow: hidden;">
        <div style="position: absolute; top: 100px ; left: 1000px; color: #fff; font-size: 70px; font-weight: bold;">
            CURSOS DE INVERNO
        </div>
         <div style="position: absolute; top: 350px; left: 1000px; color: #fff; font-size: 30px; font-weight: bold;">
            Aproveite as condições especiais e garanta a sua vaga
        </div>
        
        <img style="position: absolute; left:370px; top:120px;" width="400" src="public/img/iconTeacher.svg">
        <span class="hpb hpb-button">teste</span>
    </div>
    
</div>

<div id="courses" class="container">

    <?php
    // var_dump($this->courses);

    $rowCount = 1;
    foreach ($this->courses as $row) {

        if ($rowCount == 1 or $rowCount == 4) {
            echo "<div id='courses-content' class='row'>";
        }

        echo "<div class='col-lg-4'>";

            echo "<p class='courseTitle'>" . $row['name'] . "</p>";

            echo "<div class='courseImage'>";
                echo "<img width=370 src=/mvc/public/upload/" . $row['smallPicture'] . ">";
            echo "</div>";

            echo "<div class='courseDescription'>";
                echo "<p><strong>Disponibilidade:</strong> Inscrições Abertas</p>";
                echo "<p>" . $row['shortDescription'] . "</p>";
                echo "<br>";
                echo "<a href='Course/ViewDetails/" . $row['courseId'] . "'>";
                echo "<p align = 'center' class = 'button'>Mais Detalhes</p>";
                echo "</a>";
            echo "</div>";

        echo "</div>";

        if ($rowCount == 3 or $rowCount == 6) {
            echo"</div>";
        }

        $rowCount ++;
    }
    ?>

</div>

<!--</body>-->
<?php require 'HeaderFooter/Footer.php'; ?>
