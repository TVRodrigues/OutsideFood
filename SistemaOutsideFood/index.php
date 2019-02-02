<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Outside Food</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <!--  Material Dashboard CSS    -->
    <link href="assets/css/material-dashboard.css?v=1.2.0" rel="stylesheet" />
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300|Material+Icons' rel='stylesheet' type='text/css'>
</head>


<body style="height: 100%; background-repeat: no-repeat; background-image: linear-gradient(#F1C40F, #fcf3d1);padding-bottom:200px;position:relative; ">
  <div class="container" align="center">
    <div class="card card-container" id="login">
      <img id="imagemlogin" class="imagemlogin" src="assets/img/icon3.png" style="    width: 60px;height: 60px;margin: 0 auto 10px;display: block;" />
      <p id="imagemlogin" class="imagemlogin"></p>
      <img style="width: 150px;height: 84px; margin-bottom: 10px; " src="assets/img/oft1.png" >


      <form class="form-signin" action="assets/php/validaLogin.php" method="post">
        
        <span id="reauth-email" class="reauth-email"></span>
        
        <input type="email" class="form-control" name="email" placeholder="E-mail" required autofocus>
        
        <input type="password" class="form-control" name="senha" placeholder="Senha" required>


        <button class="btn btn-lg btn-primary btn-block btn-signin" id="btnentrar" type="submit" name="insert">Entrar</button>

      </form><!-- /form -->

       <p class="text-center text-danger">
            </p>

    <!-- <a href="esqueceuSenha.php" data-toggle="modal" data-target="#senha-modal">
      Esqueceu a senha?              
    </a> -->
  </div><!-- /card-container -->
</div><!-- /container -->


<!-- Modal Esqueci Senha-->
<!-- <div class="modal fade" id="senha-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
  <div class="modal-dialog" modal-lg role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="modalLabel">Digite seu e-mail</h4>
        <div class="modal-body"> -->
         <!-- Text input-->
         <!-- <div id="pf">
          <div class="form-group">
            <label class="col-md-4 control-label" for="textinput">E-mail</label>
            <div class="col-md-8">
              <form action="">
              <input placeholder="Seu e-mail" name="e-mail" type="text">
              <p></p>
            </div>
          </div>
        </div>
        <div id=>
          <div class="form-group">
            <div id="botao" align="center">
              <button type="button" class="btn btn-primary">Enviar</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>  --> 

</body>
</html>
<?php
require_once 'footer.php';
?>