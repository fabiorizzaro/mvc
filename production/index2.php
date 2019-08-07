<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Instituto Alliqua</title>

        <!-- CSS External Files -->
        <link href="Bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="MainStyle.css" rel="stylesheet" type="text/css"/>

    </head>

    <body>
        <?php include_once("analyticstracking.php") ?>
        <!-- Landing Page -->

        <div id="landing" class="container-fluid">
            <div id="landing-content" class="row">
                <img id="cover_desktop" src="img/cover_1920x1280_autumn2.jpg">
				
               <img id="cover_mobile" src="img/CoverMobile_320x640.png">
               
              
            </div>
        </div>    

        <!-- Courses Section -->

        <div id="courses" class="container">
            <div id="courses-content" class="row">
                <div class="col-lg-4">
                    <p class="courseTitle">TDAH: Reflexões para criar possibilidades</p>
                    <div class="courseImage">
                        <img src="img/Course1_320x200.png">
                    </div>
                    <div class="courseDescription">
                        <p>No cenário educacional muito tem se falado do TDAH 
                            (Transtorno de déficit de Atenção e Hiperatividade) 
                            e nessa discussão entre educadores e especialistas da 
                            saúde o que se busca é uma qualidade de vida para essas 
                            pessoas identificadas com o transtorno. A dificuldade em 
                            manter atenção, se concentrar, finalizar uma tarefa ou manter 
                            o foco em apenas uma atividade são algumas das dificuldades 
                            encontradas pelas pessoas com essa condição, que neurologicamente 
                            a acompanhará pela vida. </p>
                    </div>
                    <div class="coursesButtons">
                        <a href="Course_1.php" class="courseButton">Saiba Mais</a>  

                    </div>
                </div>

                <div class="col-lg-4">
                    <p class="courseTitle">TEA: Autismo No Ensino Regular</p>
                    <div class="courseImage">
                        <img src="img/Course2_320x200.png">
                    </div>
                    <div class="courseDescription">
                        <p>Falar de  Autismo no contexto do Ensino Regular sem 
                            falar de educação inclusiva envolvendo as questões 
                            históricas seria desmerecer toda a construção desse 
                            processo. Em nossa formação trazemos questionamentos 
                            históricos que explicam situações atuais e nos faz 
                            compreender o caminhar da inclusão das pessoas com 
                            esse Transtorno na Escola formal. O processo de 
                            incluir os alunos no contexto regular permeia discussões 
                            de acessibilidade e nos dias de hoje é possível agregar 
                            a discussão a qualidade de ensino para esse público. 
                            E como fazer a Educação ser Inclusiva? E como promover 
                            um espaço de aprendizado para as pessoas com esse Transtorno? 
                            E como gerir a sala de aula com toda essa diversidade? 
                            Reflexão? Diálogo? Conhecimento Teórico?</p>

                    </div>
                    <div class="coursesButtons">
                        <a href="Course_2.php" class="courseButton">Saiba Mais</a>  

                    </div>
                </div>

                <div class="col-lg-4">
                    <p class="courseTitle">Educação Inclusiva: Caminhos Para <br> Autonomia</p>
                    <div class="courseImage">
                        <img src="img/Course3_320x200.png">
                    </div>
                    <div class="courseDescription">
                        <p>O maior desafio da educação é fazer efetiva a frase “ Uma escola para todos”, onde escola refere-se não só a um espaço físico adaptado e seguro mas sim um espaço possível de “ aprendizados” e desenvolvimento.
                            Para o educador não basta apenas ter o conhecimento  do que é possível aos seus alunos e sim colocá-los em prática, questionar-se e rever resultados.
                            A escola não deve ser um espaço em que a inclusão se faça apenas com a socialização de nossas crianças.
                        </p>   
                    </div>
                    <div class="coursesButtons">
                        <a href="Course_3.php" class="courseButton">Saiba Mais</a>  

                    </div>
                </div>

            </div>
        </div>

        <!-- Sobre nós -->

        <div id="aboutUs" class="container">
            <div class="row">
                <img src="img/AboutUsBanner.jpg">
                <div id="aboutUsContentLine1" class="col-lg-4 col-lg-offset-3 ">
                    <div id="aboutUsTitle">Conheça o Instituto Alliqua</div>

                </div>
                <div id="aboutUsContentLine2" class="col-lg-8 col-lg-offset-1 ">


                    <div id="aboutUsText">O instituto alliqua iniciou seus trabalhos no ano de 2012 , baseado no procura de professores por cursos preparatórios para concursos públicos voltados a área da educação. Nosso foco sempre foi mostrar o viés teoria x prática unidos a estratégias de estudo. Desde então oferecemos cursos preparatórios com uma metodologia voltada para o estudo das práticas.
                        Pouco a pouco fomos percebendo a necessidade de formação continuada dos professores e da informação constante daqueles que ainda estão cursando uma graduação e buscam qualidade em sua prática. Com essa demanda ativa oferecemos também cursos de formação continuada para a rede pública e privada desde a educação infantil (creche) até profissionais do fundamental I e II.
                        Nossos formadores são docentes atuantes e buscam colocar em suas formações um diálogo entre suas práticas e os estudos mais recentes voltados a educação. As experiências mais ricas acontecem e se desenvolvem em sala de aula, com os questionamentos e contribuições dos alunos e com isso, queremos trazer ricas contribuições para a formação de nossos alunos professores. Acreditamos na educação, acreditamos em você.
                    </div>
                </div>
            </div>
        </div>


    </body>

    <!-- Java Script External Files -->
    <script src="jQuery/jquery-3.1.0.js" type="text/javascript"></script>
    <script src="Bootstrap/js/bootstrap.js" type="text/javascript"></script>

</html>
