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

<!--    <script src="/mvc/public/js/jquery-3.1.0.js" type="text/javascript"></script>
        <script src="/mvc/public/Bootstrap/js/bootstrap.js" type="text/javascript"></script>
        <script src="/mvc/public/Bootstrap/js/tether.min.js" type="text/javascript"></script>-->

        <!-- CSS External -->
        <link href="/mvc/public/css/master.css" rel="stylesheet" type="text/css"/>
<!--    <link href="/mvc/public/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="/mvc/public/bootstrap/css/tether.min.css" rel="stylesheet" type="text/css"/>-->

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        <!--Mover isso para um arquico CSS-->
        <style>

            .bg-light{
                background-color: #333 !important;
            }
            .nav-link{
                color: #fff !important;
            }
            .nav-link:hover{
                color: #ccffcc !important;
            }
            .navbar-brand{
                color:#fff !important;
            }

            .gradient{

                width: 100%;
                height: 500px;
                /*background-image: linear-gradient(to right bottom, #89f7fe, #63e6ff, #48d3ff, #4abeff, #66a6ff);*/
                background: #FFAFBD;  /* fallback for old browsers */
                background: -webkit-linear-gradient(to right, #ffc3a0, #FFAFBD);  /* Chrome 10-25, Safari 5.1-6 */
                background: linear-gradient(to right, #ffc3a0, #FFAFBD); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

            }

        </style>

    </head>
    <body>

        <!--******************************** Navbar ********************************-->

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="<?php echo "http://" . $_SERVER['SERVER_NAME'] . '/mvc' ?>"><img src="/mvc/public/img/Logo_174x25.png"> </a>


            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse " id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto ">
                    <li class="nav-item active">
                        <a class="nav-link" href="/mvc">Inicio <span class="sr-only">(current)</span></a>
                    </li>


                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="/mvc/Course" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Cursos
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Passados</a>

                        </div>

                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Equipe</a>
                    </li>
                    <?php if (!Session::Get('loggedIn')) { ?>
                        <li class="nav-item"><a class="nav-link" href="/mvc/Login">Login</a></li>
                    <?php } else { ?>
                        <li class="nav-item"><a class="nav-link" href="/mvc/Dashboard">Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link" href="/mvc/Login/logout">Logoff</a></li>
                    <?php } ?>

                </ul>
                <span class="navbar-text" style="color: white">
                    <?php echo Session::Get('username') ? "   |   " . Session::Get('username') : FALSE ?>
                </span>
            </div>
        </nav>


        <!--******************************** Navbar ********************************-->




