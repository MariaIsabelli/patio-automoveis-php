<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSS Do BootStrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Venda Autómoveis</title>
  </head>
  <body>
    <!-- Cabeçalho -->
    <header class="p-5">
        <h1 class="text-uppercase text-center">Pátio de Automóveis - Venda Autómoveis</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="index.php">Listagem de Áreas</a></li>
                <li class="breadcrumb-item"><a href="lista-automoveis.php">Listagem de Autómoveis</a></li>
                <li class="breadcrumb-item"><a href="vende-automoveis.php">Venda de Autómoveis</a></li>
            </ol>
        </nav>
    </header>
    <!-- conteudo principal -->
    <section class="container justify-content-center text-center">
<?php 
 //inclusão do arquivo de conexão com o bd.
 include("conecta.php");

 //recupa os valores dos formularios via method post
 $automovelID = $_POST["automovel"];
 $clienteID = $_POST["cliente"];
 $concessionariaID = $_POST["concessionaria"];

//instrução SQL que irá atualizar o campo de quantidade de veiculos.
$SQL = "UPDATE alocacao SET quantidade = quantidade -1 WHERE automovel = '$automovelID'AND concessionaria = '$concessionariaID';";

//tenta executar a instrução sql
if(mysqli_query($conectaDB, $SQL)){
  //enecerra a conexão com o banco de dados ...
   mysqli_close($conectaDB);
   //Exibe uma mensagem na tela para o usário.
   ?>
   <div class="p-3 mb-2 bg-info rounded-circle border border-dark">
   <h1 class="text-success"><?php print("Venda efetuada com sucesso !!"); ?></h1>
   </div>
   <?php
   //esprera 5 segundos e então redireciona o usuário.
   //sleep(5);
   header("refresh: 5; URL=index.php");
}else{
   //enecerra a conexão com o banco de dados ...
   mysqli_close($conectaDB);
   //Exibe uma mensagem na tela para o usário.
   ?>
   <div class="p-3 mb-2 bg-dark rounded-circle border border-dark">
   <h1 class="text-danger"><?php print("Venda efetuada com sucesso !!"); ?></h1>
   </div>
   <?php
   //esprera 5 segundos e então redireciona o usuário.
   //sleep(5);
   header("refresh: 5; URL=index.php");
}        
?>
    </section>
    <!-- JavaScript Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>