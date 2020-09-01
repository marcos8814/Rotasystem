<?php 
session_start();
if(!isset($_SESSION['login'])){
  header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="br">
  
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="Kode is a Premium Bootstrap Admin Template, It's responsive, clean coded and mobile friendly">
  <meta name="keywords" content="bootstrap, admin, dashboard, flat admin template, responsive," />
 <?php include('titulo.php');?>

  <!-- ========== Css Files ========== -->
  <link href="images/root.css" rel="stylesheet">
  <style type="text/css">
    body{
      background: #F5F5F5;
    }
  </style>
  </head>
  <body>

    <div class="login-form">
      <form action="" method="POST">

        <div class="top">
          <img src="images/profileimg.png" alt="icon" class="icon profile">
          <h1>ROTA | System</h1>
          <h4>Gerenciamento On-line</h4>
        </div>
        <div class="form-area">


          <div class="group">
            <input type="password" class="form-control" placeholder="Password" name="etiqueta">
            <i class="fa fa-key"></i>
          </div>
       
          <button type="submit" class="btn btn-default btn-block" name="salvar" id="salvar">Salvar</button>
        </div>
      </form>
      <div class="footer-links row">
        <div class="col-xs-6"><a href="index.php" target="_blank"><i class="fa fa-external-link"></i> Login</a></div>
        <div class="col-xs-6 text-right"><a href="#"><i class="fa fa-lock"></i> Sistema Blindado Faculdade CIESA</a></div>
      </div>
    </div>

</body>


</html>

<?php
          //conectar no banco
          include ('conexaopdo.php');
          //se clicar no botão salvar do formulário faça a inserção
          if (isset($_POST['salvar']))
          {
            // pagando os dados do formulário
            $etiqueta = $_POST['etiqueta'];
            // pagando a hora da rota
            date_default_timezone_set('America/Manaus');
            $hora = date('H:i');
            
            $selecionarota=$con->prepare("SELECT
                motorista.mot_id,
                motorista.mot_nome,
                rota.rot_id,
                rota.motorista_mot_id,
                rota.veiculos_vei_id,
                rota.rot_nome,
                rota.rot_data,
                rota.rot_horaentrada,
                rota.rot_horaeatrazo,
                rota.rot_horasaida,
                rota.rot_horasatrazo,
                rota.rot_status_rota,
                veiculos.vei_id,
                veiculos.vei_modelo,
                veiculos.vei_marca,
                veiculos.vei_lotacao,
                veiculos.vei_datavistoria,
                veiculos.vei_etiqueta
                FROM motorista , rota , veiculos WHERE motorista.mot_id=rota.motorista_mot_id AND rota.veiculos_vei_id=veiculos.vei_id AND veiculos.vei_etiqueta='12345678980';");
          $selecionarota->execute();

             while ($linha=$selecionarota->fetch(PDO::FETCH_ASSOC)){

                       
                            echo '
                                <tr>
                                 
                                 <td><font color="red">'.$linha["vei_etiqueta"].'</font></td>
                                 
                                </tr>
                            '; 
                          }   

                       
          }



?>
