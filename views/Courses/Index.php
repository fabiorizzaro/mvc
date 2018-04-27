
<!--Load Header - Menu is loaded into Header-->
<?php require 'views/HeaderFooter/Header.php'; ?>

<!--<body>-->

<h1>CADASTRO DE CURSOS</h1>

<div id="errors">

    <?php
      $erro = Session::Get('PDO_ERRORS');
      echo $erro;
    ?>
</div>

<div>
    <a href="course/View">Novo</a></br></br>

    <table id="tb_course" border='1'>

        <tr>
            <th>Código do Curso</th>
            <th>Nome Curso</th>
            <th>Limite Inscrições</th> 
            <th>Valor</th>
            <th colspan="2">Ações</th>
        </tr>

        <?php
        foreach ($this->data as $row) {

            echo '<tr>';
            echo '<td>' . $row['courseId'] . '</td>';
            echo '<td>' . $row['title'] . '</td>';
            echo '<td>' . $row['subscribeEndDate'] . '</td>';
            echo '<td>' . $row['price'] . '</td>';
            echo '<td><a class="btn btn-primary" href="/mvc/course/edit?courseId=' . $row['courseId'] . '" >EDITAR</a></td>';
            echo '<td><a data-confirm="Are you sure you want to delete?" class="btn btn-danger" href="/mvc/course/delete?courseId=' . $row['courseId'] . '">APAGAR</a></td>';
            echo '</tr>';
        }
        ?>

    </table>


</div>

<!--</body>-->

<script>


</script>

<?php require 'views/HeaderFooter/Footer.php'; ?>
