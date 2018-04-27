
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
        <div class="col-lg-12 text-center" >
            <h3>Identificação</h3>    
        </div>
    </div>

    <div class="row justify-content-lg-center  p-5">

        <div class="col-lg-4  myBox m-1 border border-secondary">

            <form id="loginForm" action="/mvc/login/login" method="POST">
                <div class="form-group text-center px-1" >
                    <h5>Já é nosso Aluno?</h5>

                    <label for="username">Usuário</label>
                    <input type="text" class="form-control" id="userName" name="username" 
                           placeholder="" value="">
                    <label for="password">Senha</label>
                    <input type="text" class="form-control" id="password" name="password" 
                           placeholder="" value="">
                    <p id="erro"></p>
                    <input type="submit" class="btn btn-primary mt-3" value="Login">
                </div>
            </form>
        </div>

        <div class="col-lg-4  d-flex align-items-center justify-content-center m-1 border border-secondary myBox">
            <div class="align-self-center ">
                <h5>Ainda não é aluno?</h5>
                <a class="btn btn-primary" href="/mvc/user/userForm" >Faça seu cadastro</a>
            </div>
        </div>
    </div>
</div>

<script>

    $("#loginForm").submit(function (e) {
        e.preventDefault();

        $.ajax({
            method: "POST",
            url: "/mvc/login/login",
            data: $("#loginForm").serialize(),
            dataType: 'JSON'
        })
                .done(function (data) {
                    if (data.success == 'true') {
                        window.location.href = data.href;
                        //$('#erro').html(data.href);
                    } else {
                        $('#erro').html(data.message);
                    }
                });
    });

</script>


<!--</body>-->
<?php require 'views/HeaderFooter/Footer.php' ?>
