
<!--Load Header - Menu is loaded into Header-->
<?php require 'views/HeaderFooter/Header.php'; ?>

<!--<body>-->

<div class="container">
    <div class="row justify-content-lg-center">
        <div class="col-lg-4">
            <h6>Faça o Login</h6>
            <form action="../Subscribe/checkLogin" method="POST">
                <div class="row">
                    <div class="form-group">
                        <label for="userName">Usuário</label>
                        <input type="text" class="form-control" id="userName" name="user" 
                               placeholder="" value="">
                    
                        <label for="password">Senha</label>
                        <input type="text" class="form-control" id="password" name="password" 
                               placeholder="" value="">
                        <input type="submit" class="btn btn-primary" value="Login">
                    </div>
                    
                        
                    
                </div>
            </form>
        </div>
        <div class="col-lg-4" align="center">
            <h6>Faça seu cadastro</h6>
            <a class="btn-outline-primary" href="../Subscribe/NewUser">Faça seu cadastro</a>
        </div>
    </div>
</div>


<!--</body>-->
<?php require 'views/HeaderFooter/Footer.php' ?>
