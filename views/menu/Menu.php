<style>
    /*Navbar customization*/
    #mainNav.bg-light{
        background-color: #333 !important;
    }
    #mainNav .nav-link{
        color: #fff !important;
    }
    #mainNav .nav-link:hover{
        color: #ccffcc !important;
    }
    #mainNav .navbar-brand{
        color:#fff !important;
    }
</style>

<div class="container-fluid p-0">

    <nav id="mainNav" class="navbar navbar-expand-lg navbar-light bg-light">

        <a class="navbar-brand" href="<?php echo "http://" . $_SERVER['SERVER_NAME'] . '' ?>"><img src="/public/img/Logo_174x25.png"> </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto ">
                <span class="navbar-text text-success mr-5" style="color: white">
                    <?php echo Session::Get('username') ? "Olá, " . Session::Get('username') . "  " : FALSE ?>
                </span>


                <?php if (!Session::Get('loggedIn')) { ?>
                    <li class="nav-item"><a class="btn btn-primary" href="/login/loginForm">Entrar</a></li>
                <?php } else { ?>
                    
<!--************************  ÁREA DO ADMINISTRATIVA  ***********************-->                            
                    
                    <?php if (Session::Get('accessLevel') == '10') { ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Administrativo
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/dashboard">Cursos</a>
                                <a class="dropdown-item" href="#">Alunos</a>
                                <a class="dropdown-item" href="#">Matriculas</a>
                                <a class="dropdown-item" href="#">Pagamentos</a>
                            </div>
                        </li>
                    <?php } ?>  
<!--******************************  ÁREA DO ALUNO  **************************-->                            
                    
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Área do Aluno 
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/dashboard">Painel de Controle</a>
                            <a class="dropdown-item" href="#">Inscrições</a>
                        </div>
                    </li>
                    <li class="nav-item"><a class="btn btn-primary" href="/login/logout">Sair</a></li>

                <?php } ?>
            </ul>
        </div>
    </nav>
</div>

