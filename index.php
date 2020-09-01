<!DOCTYPE html>
<html lang="br">
  
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Kode is a Premium Bootstrap Admin Template, It's responsive, clean coded and mobile friendly">
  <meta name="keywords" content="bootstrap, admin, dashboard, flat admin template, responsive," />
  
  <?php
   //função INCLUDE: Chama o arquivo titulo.php. ( Contem o nome do sistema ).
   include('titulo.php');
   ?>

  <!-- ========== Css Files ========== -->
  <link href="images/root.css" rel="stylesheet">
  <style type="text/css">
    body{background: #F5F5F5;}
  </style>
  </head>
  <body>

    <div class="login-form">
      <form name="formlogin" method="POST">
        <div class="top">
          <img src="images/kode-icon.png" alt="icon" class="icon">
          <h1>ROTA | system</h1>
          <h4>Gerenciamento On-line</h4>
        </div>
        <div class="form-area">
          <?php  
                  include ('conexaopdo.php');
                  if (isset($_POST['logar'])){
                    $login = $_POST['login'];
                    $senha = $_POST['senha'];
                    $nivel = $_POST['nivel'];

                  
                    $busca = $con->prepare("SELECT * FROM usuario where usu_login =:usu_login AND usu_senha =:usu_senha AND usu_nivel =:usu_nivel;");
                    $busca->bindParam(':usu_login', $login, PDO::PARAM_STR);
                    $busca->bindParam(':usu_senha', $senha, PDO::PARAM_STR);
                    $busca->bindParam(':usu_nivel', $nivel, PDO::PARAM_STR);
                    $busca->execute();
                    $busca-> rowCount();
                    

                      if ($busca-> rowCount() ==0) {
                        echo "<font color='red'>Login ou Senha inválidos</font>";
                      }else {
                        session_start();
                        $_SESSION['login'] = $login;
                        $_SESSION['nivel'] = $nivel;

                        header("Location: painel_controle.php");
                      }

                  }
                ?>
          <div class="group">
            <input type="text" name="login" class="form-control" placeholder="Login">
            <i class="fa fa-user"></i>
          </div>
          <div class="group">
            <input type="password" name="senha" class="form-control" placeholder="Senha">
            <i class="fa fa-key"></i>
          </div>
          <div class="group">
            <select class="form-control" name="nivel">
                      <option value=""> Selecione o perfil</option>
                      <option value="administrador">Administrador</option>                                      
                      <option value="usuario">Usuário</option>                                      
            </select>
          </div>
          <button type="submit" class="btn btn-default btn-block" name="logar">LOGIN</button>
        </div>
      </form>
      <div class="footer-links row">
        <div class="col-xs-6"><a href="#"><i class="fa fa-external-link"></i> Novo registro</a></div>
        <div class="col-xs-6 text-right"><a href="#"><i class="fa fa-lock"></i> Esqueci a senha</a></div>
      </div>
    </div>

</body>


</html>