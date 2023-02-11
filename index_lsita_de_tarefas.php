<?php

  session_start();

  if(isset($_POST['acao'])){
    echo 'form enviado.';
    // recuperando o valor do input: 
    $tarefa = strip_tags($_POST['tarefa']);

    //Verificando se existe seção tarefas.
    if(!isset($_SESSION['tarefas'])){
      $_SESSION['tarefas'] = array();
      $_SESSION['tarefas'][] = $tarefa;
    }else{
      $_SESSION['tarefas'][] = $tarefa;
    }

    echo '<script>alert("Tarefa foi adicionada.");</script>';
  }
?>

<!DOCTYPE html>
<html>
<head>
  <title>Lista de Tarefas</title>
</head>
  <style type="text/css">
    *{
      <?php
        echo 'margin:0;padding:0;box-sizing: border-box;';
      ?>
     }

    form{
      max-width:600px;
      margin:10x auto;
      display: block;
      text-align:center;
    
    }

      input[type=text]{
      width:100%;
      height:40px;
      border:1px solid #ccc;
      padding-left: 10px;
      text-align:center;
    }

    input[type=submit]{
      width:100%;
      height:40px;
      background-color:#069;
      font-size:17px;
      text-align:center;
    }
    h3{
      text-align:center;
    }
  </style>
<body>
  <form method="post">
    <input class = "tarefa" type="text" name="tarefa" placeholder="Digite sua tarefa...">
    <input class = "envio" type="submit" name="acao" value"Enviar!"> 
  </form>
  </br>
  <h3> Suas Tarefas Atuais:</h3>
  <?php
    foreach ($_SESSION['tarefas'] as $key => $value) {
      echo '<p>'.$value.'</p>';
    }
  ?>
</body>
</html>