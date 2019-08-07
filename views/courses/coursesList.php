<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Lista de Cursos</title>
    </head>
    <body>




        <table id = "tb_course" border = '1'>

            <tr>
                <th>Código do Curso</th>
                <th>Nome Curso</th>
                <th>Limite Inscrições</th>
                <th>Limite Inscrições</th>
                <th>Valor</th>
                <th colspan = "2">Ações</th>
            </tr>

            <?php
           // var_dump($this->data);
            foreach ($this->data as $row) {
                echo '<tr>';
                echo '<td>' . $row['courseId'] . '</td>';
                echo '<td>' . $row['courseName'] . '</td>';
                echo '<td>' . $row['subscribeStartDate'] . '</td>';
                echo '<td>' . $row['subscribeEndDate'] . '</td>';
                echo '<td>' . $row['coursePrice'] . '</td>';
                echo '<td><a class="btn btn-primary" href="/course/edit?courseId=' . $row['courseId'] . '" >EDITAR</a></td>';
                echo '<td><a data-confirm="Are you sure you want to delete?" class="btn btn-danger" href="/course/delete?courseId=' . $row['courseId'] . '">APAGAR</a></td>';
                echo '</tr>';
            }
            ?>

        </table>
    </body>
</html>
