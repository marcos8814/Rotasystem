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

  </head>
  <body>
  <!-- Start Page Loading -->
  <div class="loading"><img src="images/loading.gif" alt="loading-img"></div>
  <!-- End Page Loading -->
 <!-- //////////////////////////////////////////////////////////////////////////// --> 
  <?php include('topo.php');?>

  </div>
  <!-- END TOP -->
 <!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- MENU -->
<?php include('menu.inc');?>


 <!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTENT -->
<div class="content">

  <!-- Start Page Header -->
  <div class="page-header">
    <h1 class="title">Painel de Controle Administrativo</h1>
      <ol class="breadcrumb">
        <li class="active">MENU</li>
      </ol>

    <!-- Start Page Header Right Div -->
    <div class="right">
      <div class="btn-group" role="group" aria-label="...">
        <a href="cad_objeto.php" class="btn btn-light">Veículos</a>
        <a href="novo_pedido.php" class="btn btn-light">Rotas</a>
        <a href="#" class="btn btn-light"><i class="fa fa-refresh"></i></a>
        <a href="#" class="btn btn-light"><i class="fa fa-search"></i></a>
        <a href="#" class="btn btn-light" id="topstats"><i class="fa fa-line-chart"></i></a>
      </div>
    </div>
    <!-- End Page Header Right Div -->

  </div>
  <!-- End Page Header -->

  <!-- Start Presentation -->
  <div class="row presentation">

    <div class="col-lg-8 col-md-6 titles">
      <span class="icon color10-bg"><i class="fa fa-table"></i></span>
      <h1>Cadastro de Rotas do sistema 
      
      <h4>Aqui é possivel cadastrar as rotas do sistema</h4>
    </div>

    <div class="col-lg-4 col-md-6">
      <ul class="list-unstyled list">
        <li><i class="fa fa-check"></i>Facilidade<li>
        <li><i class="fa fa-check"></i>Agilidade<li>
        <li><i class="fa fa-check"></i><a href="/" target="_blank">ROTASystem</a><li>
      </ul>
    </div>

  </div>
  <!-- End Presentation -->


 <!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTAINER -->
<div class="container-padding">


<!-- Start Row -->
  <div class="row">

    <div class="col-md-12">
      <div class="panel panel-default">

        <div class="panel-title">
          Preencha os dados
          <ul class="panel-tools">
            <li><a class="icon minimise-tool"><i class="fa fa-minus"></i></a></li>
            <li><a class="icon expand-tool"><i class="fa fa-expand"></i></a></li>
            <li><a class="icon closed-tool"><i class="fa fa-times"></i></a></li>
          </ul>
        </div>

            <div class="panel-body">
              <form class="form-horizontal" method="POST">

                <div class="form-group">
                  <label for="input002" class="col-sm-2 control-label form-label">Motorista</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="motorista" >
                       <?php
                            include('conexaopdo.php');
                            $selecionaumotorista=$con->prepare("SELECT * FROM motorista");
                            $selecionaumotorista->execute();
                              while ($linha=$selecionaumotorista->fetch(PDO::FETCH_ASSOC)) 
                              {
                                    echo '<option value="'.$linha["mot_id"].'">'.$linha["mot_nome"].'</option>                                      
                                    ';
                              }
                        ?>

                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="input002" class="col-sm-2 control-label form-label">Veiculo</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="veiculo">
                        <?php
                            include('conexaopdo.php');
                            $selecionausuario=$con->prepare("SELECT * FROM veiculos WHERE vei_status='Disponivel'");
                            $selecionausuario->execute();
                              while ($linha=$selecionausuario->fetch(PDO::FETCH_ASSOC)) 
                              {
                                    $rfidimpit = $linha["vei_etiqueta"];  

                                    echo '<option value="'.$linha["vei_id"].'">ID: '.$linha["vei_id"].' - '.$linha["vei_modelo"].' '.$linha["vei_marca"].'</option>
                                    ';

                               }
                        ?>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="input001" class="col-sm-2 control-label form-label">Nome da Rota</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="input001" name="nome">
                    <span id="helpBlock" class="help-block">Ex. A</span>
                  </div>
                </div>

                <div class="form-group">
                  <label for="input001" class="col-sm-2 control-label form-label">Data</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="input001" name="data">
                    <span id="helpBlock" class="help-block">Ex. Dia/mês/ano</span>
                  </div>
                </div>

                <div class="form-group">
                  <label for="input001" class="col-sm-2 control-label form-label">Hora Entrada / Empresa</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="input001" name="horaentrada">
                    <span id="helpBlock" class="help-block">Ex. 13:00</span>
                  </div>
                </div>

                <div class="form-group">
                  <label for="input001" class="col-sm-2 control-label form-label">Hora Saída / Empresa</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="input001" name="horasaida">
                    <span id="helpBlock" class="help-block">Ex. 14:00</span>
                  </div>
                </div>

                <div class="form-group">
                  <label for="input002" class="col-sm-2 control-label form-label">RFID</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="rfid">
                        <?php
                            include('conexaopdo.php');
                            $selecionarfid=$con->prepare("SELECT * FROM veiculos WHERE vei_status='Disponivel'");
                            $selecionarfid->execute();
                              while ($linha=$selecionarfid->fetch(PDO::FETCH_ASSOC)) 
                              {
                                   echo '<option value="'.$linha["vei_etiqueta"].'">ID: '.$linha["vei_id"].' / RFID:'.$linha["vei_etiqueta"].'</option>';

                               }
                        ?>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="input001" class="col-sm-2 control-label form-label"></label>
                  <div class="col-sm-10">
                     <button type="submit" class="btn btn-default" name="salvar" id="salvar">Salvar</button>
                  </div>
                </div>


              </form> 

            </div>

      </div>
    </div>

  </div>
  <!-- End Row -->


</div>
<!-- END CONTAINER -->
 <!-- //////////////////////////////////////////////////////////////////////////// --> 



<!-- Start Footer -->
<?php include ('rodape.php');?>
<!-- End Footer -->



</div>
<!-- End Content -->
 <!-- //////////////////////////////////////////////////////////////////////////// --> 

<!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START SIDEPANEL -->
<div role="tabpanel" class="sidepanel">

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#today" aria-controls="today" role="tab" data-toggle="tab">TODAY</a></li>
    <li role="presentation"><a href="#tasks" aria-controls="tasks" role="tab" data-toggle="tab">TASKS</a></li>
    <li role="presentation"><a href="#chat" aria-controls="chat" role="tab" data-toggle="tab">CHAT</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">

    <!-- Start Today -->
    <div role="tabpanel" class="tab-pane active" id="today">

      <div class="sidepanel-m-title">
        Today
        <span class="left-icon"><a href="#"><i class="fa fa-refresh"></i></a></span>
        <span class="right-icon"><a href="#"><i class="fa fa-file-o"></i></a></span>
      </div>

      <div class="gn-title">NEW</div>

      <ul class="list-w-title">
        <li>
          <a href="#">
            <span class="label label-danger">ORDER</span>
            <span class="date">9 hours ago</span>
            <h4>New Jacket 2.0</h4>
            Etiam auctor porta augue sit amet facilisis. Sed libero nisi, scelerisque.
          </a>
        </li>
        <li>
          <a href="#">
            <span class="label label-success">COMMENT</span>
            <span class="date">14 hours ago</span>
            <h4>Bill Jackson</h4>
            Etiam auctor porta augue sit amet facilisis. Sed libero nisi, scelerisque.
          </a>
        </li>
        <li>
          <a href="#">
            <span class="label label-info">MEETING</span>
            <span class="date">at 2:30 PM</span>
            <h4>Developer Team</h4>
            Etiam auctor porta augue sit amet facilisis. Sed libero nisi, scelerisque.
          </a>
        </li>
        <li>
          <a href="#">
            <span class="label label-warning">EVENT</span>
            <span class="date">3 days left</span>
            <h4>Birthday Party</h4>
            Etiam auctor porta augue sit amet facilisis. Sed libero nisi, scelerisque.
          </a>
        </li>
      </ul>

    </div>
    <!-- End Today -->

    <!-- Start Tasks -->
    <div role="tabpanel" class="tab-pane" id="tasks">

      <div class="sidepanel-m-title">
        To-do List
        <span class="left-icon"><a href="#"><i class="fa fa-pencil"></i></a></span>
        <span class="right-icon"><a href="#"><i class="fa fa-trash"></i></a></span>
      </div>

      <div class="gn-title">TODAY</div>

      <ul class="todo-list">
        <li class="checkbox checkbox-primary">
          <input id="checkboxside1" type="checkbox"><label for="checkboxside1">Add new products</label>
        </li>
        
        <li class="checkbox checkbox-primary">
          <input id="checkboxside2" type="checkbox"><label for="checkboxside2"><b>May 12, 6:30 pm</b> Meeting with Team</label>
        </li>
        
        <li class="checkbox checkbox-warning">
          <input id="checkboxside3" type="checkbox"><label for="checkboxside3">Design Facebook page</label>
        </li>
        
        <li class="checkbox checkbox-info">
          <input id="checkboxside4" type="checkbox"><label for="checkboxside4">Send Invoice to customers</label>
        </li>
        
        <li class="checkbox checkbox-danger">
          <input id="checkboxside5" type="checkbox"><label for="checkboxside5">Meeting with developer team</label>
        </li>
      </ul>

      <div class="gn-title">TOMORROW</div>
      <ul class="todo-list">
        <li class="checkbox checkbox-warning">
          <input id="checkboxside6" type="checkbox"><label for="checkboxside6">Redesign our company blog</label>
        </li>
        
        <li class="checkbox checkbox-success">
          <input id="checkboxside7" type="checkbox"><label for="checkboxside7">Finish client work</label>
        </li>
        
        <li class="checkbox checkbox-info">
          <input id="checkboxside8" type="checkbox"><label for="checkboxside8">Call Johnny from Developer Team</label>
        </li>

      </ul>
    </div>    
    <!-- End Tasks -->

    <!-- Start Chat -->
    <div role="tabpanel" class="tab-pane" id="chat">

      <div class="sidepanel-m-title">
        Friend List
        <span class="left-icon"><a href="#"><i class="fa fa-pencil"></i></a></span>
        <span class="right-icon"><a href="#"><i class="fa fa-trash"></i></a></span>
      </div>

      <div class="gn-title">ONLINE MEMBERS (3)</div>
      <ul class="group">
        <li class="member"><a href="#"><img src="images/profileimg.png" alt="img"><b>Allice Mingham</b>Los Angeles</a><span class="status online"></span></li>
        <li class="member"><a href="#"><img src="images/profileimg2.png" alt="img"><b>James Throwing</b>Las Vegas</a><span class="status busy"></span></li>
        <li class="member"><a href="#"><img src="images/profileimg3.png" alt="img"><b>Fred Stonefield</b>New York</a><span class="status away"></span></li>
        <li class="member"><a href="#"><img src="images/profileimg4.png" alt="img"><b>Chris M. Johnson</b>California</a><span class="status online"></span></li>
      </ul>

      <div class="gn-title">OFFLINE MEMBERS (8)</div>
     <ul class="group">
        <li class="member"><a href="#"><img src="images/profileimg5.png" alt="img"><b>Allice Mingham</b>Los Angeles</a><span class="status offline"></span></li>
        <li class="member"><a href="#"><img src="images/profileimg6.png" alt="img"><b>James Throwing</b>Las Vegas</a><span class="status offline"></span></li>
      </ul>

      <form class="search">
        <input type="text" class="form-control" placeholder="Search a Friend...">
      </form>
    </div>
    <!-- End Chat -->

  </div>

</div>
<!-- END SIDEPANEL -->
<!-- //////////////////////////////////////////////////////////////////////////// --> 



<!-- ================================================
jQuery Library
================================================ -->
<script type="text/javascript" src="images/jquery.min.js"></script>

<!-- ================================================
Bootstrap Core JavaScript File
================================================ -->
<script src="images/bootstrap.min.js"></script>

<!-- ================================================
Plugin.js - Some Specific JS codes for Plugin Settings
================================================ -->
<script type="text/javascript" src="images/plugins.js"></script>

<!-- ================================================
Data Tables
================================================ -->
<script src="images/datatables.min.js"></script>



<script>
$(document).ready(function() {
    $('#example0').DataTable();
} );
</script>



<script>
$(document).ready(function() {
    var table = $('#example').DataTable({
        "columnDefs": [
            { "visible": false, "targets": 2 }
        ],
        "order": [[ 2, 'asc' ]],
        "displayLength": 25,
        "drawCallback": function ( settings ) {
            var api = this.api();
            var rows = api.rows( {page:'current'} ).nodes();
            var last=null;
 
            api.column(2, {page:'current'} ).data().each( function ( group, i ) {
                if ( last !== group ) {
                    $(rows).eq( i ).before(
                        '<tr class="group"><td colspan="5">'+group+'</td></tr>'
                    );
 
                    last = group;
                }
            } );
        }
    } );
 
    // Order by the grouping
    $('#example tbody').on( 'click', 'tr.group', function () {
        var currentOrder = table.order()[0];
        if ( currentOrder[0] === 2 && currentOrder[1] === 'asc' ) {
            table.order( [ 2, 'desc' ] ).draw();
        }
        else {
            table.order( [ 2, 'asc' ] ).draw();
        }
    } );
} );
</script>


</body>

</html>

<?php
          //conectar no banco
          include ('conexaopdo.php');
          //se clicar no botão salvar do formulário faça a inserção
          if (isset($_POST['salvar']))
          {
            // pagando os dados do formulário
            $motorista = $_POST['motorista'];
            $veiculo = $_POST['veiculo'];
            $nome = $_POST['nome'];
            $data = $_POST['data'];
            $horaentrada = $_POST['horaentrada'];
            $horasaida = $_POST['horasaida'];
            $rfid = $_POST['rfid'];
           
            // inserindo os dados no banco da tabela rotas
              $insertobjeto=$con->prepare("INSERT INTO rota 
                (motorista_mot_id, veiculos_vei_id, rot_nome, rot_data, rot_horaentrada, rot_horaeatrazo, rot_horasaida, rot_horasatrazo, rot_status_rota, rot_rfid) 
                VALUES 
                (:motorista_mot_id, :veiculos_vei_id, :rot_nome, :rot_data, :rot_horaentrada, :rot_horaeatrazo, :rot_horasaida, :rot_horasatrazo, :rot_status_rota, :rot_rfid)");
              $insertobjeto->bindValue(":motorista_mot_id", $motorista);
              $insertobjeto->bindValue(":veiculos_vei_id", $veiculo);
              $insertobjeto->bindValue(":rot_nome", $nome);
              $insertobjeto->bindValue(":rot_data", $data);
              $insertobjeto->bindValue(":rot_horaentrada", $horaentrada);
              $insertobjeto->bindValue(":rot_horaeatrazo", '-');
              $insertobjeto->bindValue(":rot_horasaida", $horasaida);
              $insertobjeto->bindValue(":rot_horasatrazo", '-');
              $insertobjeto->bindValue(":rot_status_rota", 'Inativo');
              $insertobjeto->bindValue(":rot_rfid", $rfid);
              // finaliza a inserção
              $insertobjeto->execute();


              $atulizavei = $con->prepare("UPDATE  veiculos SET  vei_status ='Em rota' WHERE vei_id =:vei_id;");
              $atulizavei->bindParam(':vei_id', $veiculo, PDO::PARAM_STR);
              $atulizavei->execute();
      
              echo "<script>alert('ROTA CADASTRADA!');top.location.href='cad_rotas.php';</script>"; 
          }



?>

