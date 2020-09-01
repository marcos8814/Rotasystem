<?php 
/*inicia a sessao*/
session_start();
  /*verifica se o nivel do usuario é do administrador*/
  if(($_SESSION['nivel']!='administrador')){ 
    /*se não for redireciona ele para outra pagina*/
    echo "<script>alert('ACESSO NEGADO!');top.location.href='painel_controle.php';</script>"; 
  }
?>


}