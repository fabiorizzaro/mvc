
<!--Load Header - Menu is loaded into Header-->
<?php require 'views/HeaderFooter/Header.php'; ?>

<!--<body>-->

<!--Presiso criar isso em um arquivo de layout-->
<style>
    .myBox{ 
     
        height: 280px;
    }


</style>

<div class="container mt-5 mb-5">

    <div class="row ">
        <div class="col-lg-12 text-center" ">
            <h3>Identificação</h3>    
        </div>
    </div>

    <div class="row justify-content-lg-center  p-5">

        <div class="col-lg-4  myBox m-1 border border-secondary">
            <form action="Subscribe/checkLogin" method="POST">
                <div class="form-group text-center px-1" >
                    <h5>Já é nosso Aluno?</h5>
                    <label for="username">Usuário</label>
                    <input type="text" class="form-control" id="userName" name="username" 
                           placeholder="" value="">
                    <label for="password">Senha</label>
                    <input type="text" class="form-control" id="password" name="password" 
                           placeholder="" value="">
                    <input type="submit" class="btn btn-primary mt-3" value="Login">
                </div>
            </form>
        </div>
        
        <div class="col-lg-4  d-flex align-items-center justify-content-center m-1 border border-secondary myBox">
            <div class="align-self-center ">
                <h5>Ainda não é aluno?</h5>
                <a class="btn btn-primary" href="Subscribe/NewUser">Faça seu cadastro</a>
            </div>
        </div>
    </div>
</div>


<!--</body>-->
<?php require 'views/HeaderFooter/Footer.php' ?>
