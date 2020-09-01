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
                  if (isset($_POST['logar']))
                  {
                    $rfid = $_POST['rfid'];
                         
                    $selecionarota=$con->prepare("SELECT * FROM rota WHERE rot_rfid =:rot_rfid;");
                    $selecionarota->bindParam(':rot_rfid', $rfid, PDO::PARAM_STR);
                    $selecionarota->execute();
                    
                      while ($linha=$selecionarota->fetch(PDO::FETCH_ASSOC)){

                        if ($linha["rot_status_rota"] =="Inativo") 
                          {
                            //ATUALIZA O CAMPO rot_horaeatrazo DE ENTRADA E MUDA O rot_status_rota PARA: EM ROTA 
                            $busca = $con->prepare("UPDATE  rota SET  rot_horaeatrazo ='12:00', rot_status_rota = 'Em rota' WHERE rot_rfid =:rot_rfid;");
                            $busca->bindParam(':rot_rfid', $rfid, PDO::PARAM_STR);
                            $busca->execute();
                            $busca-> rowCount();
                                  echo "<audio autoplay='autoplay'>
                                        <source src='som.mp3' type='audio/mp3' />
                                        </audio>";
                                  echo "<div class='kode-alert alert3'>Rota: ".$rfid." EM ROTA.!</div>";
                              

                        }//fim do if
                        else if ($linha["rot_status_rota"] =="Em rota") 
                          {
                            //ATUALIZA O CAMPO rot_horaeatrazo DE ENTRADA E MUDA O rot_status_rota PARA: EM ROTA 
                            $busca = $con->prepare("UPDATE  rota SET  rot_horasatrazo ='15:00', rot_status_rota = 'Finalizada' WHERE rot_rfid =:rot_rfid;");
                            $busca->bindParam(':rot_rfid', $rfid, PDO::PARAM_STR);
                            $busca->execute();
                            $busca-> rowCount();
                                   echo "<audio autoplay='autoplay'>
                                        <source src='som.mp3' type='audio/mp3' />
                                        </audio>";
                                  echo "<div class='kode-alert alert6'>Rota: ".$rfid." FINALIZADA.!</div>";
                             
                        }//fim do if
                        else {
                                   echo "<audio autoplay='autoplay'>
                                        <source src='som.mp3' type='audio/mp3' />
                                        </audio>";
                                  echo "<div class='kode-alert alert5'>Rota: ".$rfid." NÃO CADASTRADA.!</div>";
                             
                        }//fim do if
                      }//fim do while

                  }//fim do POST
                
          ?>
          <div class="group">
            <input type="text" name="rfid" class="form-control" placeholder="">
            <i class="fa fa-user"></i>
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