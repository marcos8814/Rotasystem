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

 
  <!-- END TOP -->
 <!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- MENU -->



 <!-- //////////////////////////////////////////////////////////////////////////// --> 
<!-- START CONTENT -->


  <!-- Start Page Header -->
  

  <!-- Start Row -->
  <div class="row">

    <!-- Start Panel -->
    <div class="col-md-12">
      <div class="panel panel-default">
        <div class="panel-title">
          <h1 class="title">Relatório | Rotas no Sistema - ROTA System</h1><br>
           Fonte: Banco de dados do sistema
        </div>
        <div class="panel-body table-responsive">

            <table id="example0" class="table display">
                <thead>
                    <tr>
                        <th>ROTA - ID</th>
                        <th>MOTORISTA</th>
                        <th>VEICULO</th>
                        <th>NOME</th>
                        <th>DATA</th>
                        <th>HORA ENTRADA</th>
                        <th>ATRAZO ENTRADA</th>
                        <th>HORA SAIDA</th>
                        <th>ATRAZO SAIDA</th>
                        <th>STATUS</th>
                        
                    </tr>
                </thead>
             
                <tfoot>
                    <tr>
                        <th>ROTA - ID</th>
                        <th>MOTORISTA</th>
                        <th>VEICULO</th>
                        <th>NOME</th>
                        <th>DATA</th>
                        <th>HORA ENTRADA</th>
                        <th>ATRAZO ENTRADA</th>
                        <th>HORA SAIDA</th>
                        <th>ATRAZO SAIDA</th>
                        <th>STATUS</th>
                        
                    </tr>
                </tfoot>
             
                <tbody>
                     <!-- Início da listagem -->
                <?php
                    include('conexaopdo.php');
                    $selecionarota=$con->prepare("SELECT
                                                    rot_id,
                                                    motorista_mot_id,
                                                    veiculos_vei_id,
                                                    rot_nome,
                                                    rot_data,
                                                    rot_horaentrada,
                                                    rot_horaeatrazo,
                                                    rot_horasaida,
                                                    rot_horasatrazo,
                                                    rot_status_rota,
                                                    rot_rfid,
                                                    mot_id,
                                                    mot_nome
                                                    FROM
                                                    rota ,
                                                    motorista
                                                    WHERE
                                                    motorista_mot_id = mot_id
                                                ");
                    $selecionarota->execute();
                      while ($linha=$selecionarota->fetch(PDO::FETCH_ASSOC)){

                        if ($linha["rot_status_rota"] =="Finalizada") 
                          {
                            echo '
                                <tr>
                                 <td><font color="red">'.$linha["rot_id"].'</font></td>
                                 <td><font color="red">'.$linha["mot_nome"].'</font></td>
                                 <td><font color="red">'.$linha["veiculos_vei_id"].'</font></td>
                                 <td><font color="red">'.$linha["rot_nome"].'</font></td>
                                 <td><font color="red">'.$linha["rot_data"].'</font></td>
                                 <td><font color="red">'.$linha["rot_horaentrada"].'</font></td>
                                 <td><font color="red">'.$linha["rot_horaeatrazo"].'</font></td>
                                 <td><font color="red">'.$linha["rot_horasaida"].'</font></td>
                                 <td><font color="red">'.$linha["rot_horasatrazo"].'</font></td>
                                 <td><font color="red">'.$linha["rot_status_rota"].'</font></td>
                                </tr>
                            '; 
                          }   

                        else if ($linha["rot_status_rota"] =="Inativo") 
                        {
                            echo '
                              <tr>
                                <td><font color="Grey">'.$linha["rot_id"].'</font></td>
                                 <td><font color="Grey">'.$linha["mot_nome"].'</font></td>
                                 <td><font color="Grey">'.$linha["veiculos_vei_id"].'</font></td>
                                 <td><font color="Grey">'.$linha["rot_nome"].'</font></td>
                                 <td><font color="Grey">'.$linha["rot_data"].'</font></td>
                                 <td><font color="Grey">'.$linha["rot_horaentrada"].'</font></td>
                                 <td><font color="Grey">'.$linha["rot_horaeatrazo"].'</font></td>
                                 <td><font color="Grey">'.$linha["rot_horasaida"].'</font></td>
                                 <td><font color="Grey">'.$linha["rot_horasatrazo"].'</font></td>
                                 <td><font color="Grey">'.$linha["rot_status_rota"].'</font></td>
                              </tr>
                            ';
                        }

                        else 
                        {
                            echo '
                              <tr>
                                <td><font color="green">'.$linha["rot_id"].'</font></td>
                                 <td><font color="green">'.$linha["mot_nome"].'</font></td>
                                 <td><font color="green">'.$linha["veiculos_vei_id"].'</font></td>
                                 <td><font color="green">'.$linha["rot_nome"].'</font></td>
                                 <td><font color="green">'.$linha["rot_data"].'</font></td>
                                 <td><font color="green">'.$linha["rot_horaentrada"].'</font></td>
                                 <td><font color="green">'.$linha["rot_horaeatrazo"].'</font></td>
                                 <td><font color="green">'.$linha["rot_horasaida"].'</font></td>
                                 <td><font color="green">'.$linha["rot_horasatrazo"].'</font></td>
                                 <td><font color="green">'.$linha["rot_status_rota"].'</font></td>
                              </tr>
                            ';
                        }


                      }//fim do while
                ?>
                      
                      <!-- Fim da listagem -->
                </tbody>

            </table>

<br>
<br>
<br>

<button type="submit" class="btn btn-default" onclick="javascript:window.print();">IMPRIMIR</button>


<br>
<br>

         






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