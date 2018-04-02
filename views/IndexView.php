
<!--Load Header - Menu is loaded into Header-->
<?php require 'HeaderFooter/Header.php'; ?>

<!--<body>-->

<div class="container">

    <div class="row">
        <div class="menubar">

        </div>
    </div>
</div>


<div class="container">

    <div class="row">

        <div class="col-lg-4" style="background-color: blue;">

            <a href="<?php echo(ABS_PATH) ?>/Login">Login</a> </br>
            <a href="<?php echo(ABS_PATH) ?>/Dashboard">Dashboard</a></br>

        </div>





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

                echo "<p class='courseTitle'>" . $row['nomeCurso'] . "</p>";

                echo "<div class='courseImage'>";
                    echo "<img width=370 src=" . ABS_PATH . $row['pictureSmall'] . ">";
                echo "</div>";

                echo "<div class='courseDescription'>";
                    echo "<p><strong>Disponibilidade:</strong> Inscrições Abertas</p>";
                    echo "<p>" . $row['shortDescription'] . "</p>";
                    echo "<br>";
                    echo "<a href='course/ViewDetails?courseId=" . $row['idCurso'] . "'>";
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


