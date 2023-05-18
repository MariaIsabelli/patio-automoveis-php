<?php 
 //inclusão do arquivo de conexão com o bd.
 include("conecta.php");

//recupera o id ea area via método get
$idAutomovel = $_GET["id"];
$area = $_GET["area"];
?>

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
    <section class="container justify-content-center">

    <?php
    $SQLAutomovel = "SELECT modelo FROM automoveis WHERE id = '$idAutomovel';";
    //executa a instrução do bd.
    $consultaAutomovel = mysqli_query($conectaDB, $SQLAutomovel);
    //cria vetor com os dados do modelo de automóveis.
    $automovel = mysqli_fetch_assoc($consultaAutomovel);
    
    ?>
    <h2 class="text-center"><?php print($automovel["modelo"]); ?></h2>
        <form action="processa-venda.php" method="post" class="col-8 aling-text-center">
          <input type="hidden" value="<?php print($idAutomovel);?>" name="automovel"/>
          <div class="form-group">
            <label>Client</label>
              <select name="cliente" class="form-control">
               <?php
               //instruçào que busca os dados no bd.
              $SQLCliente = "SELECT id, nome FROM clientes;";
              //executa a instrução do bd.
              $consultaCliente = mysqli_query($conectaDB, $SQLCliente);
              //executa todos os retornos da consulta ao bd
              while($cliente = mysqli_fetch_assoc($consultaCliente)){
                ?>
                <option value="<?php print($cliente["id"]); ?>"><?php print($cliente["nome"]);?></option>
             <?php
              }
                ?>
              </select>
          </div>
          <div class="form-group">
            <label>Concessionária</label>
                <select name="concessionaria" class="form-control">
                <?php
               //instruçào que busca os dados no bd.
              $SQLConcessionaria = "SELECT concessionaria FROM alocacao WHERE area='$area' AND automovel = '$idAutomovel';";
              //executa a instrução do bd.
              $consultaConcessionaria = mysqli_query($conectaDB, $SQLConcessionaria);
              //carrega os dados da consulta em um vetor.
              $concessionaria = mysqli_fetch_assoc($consultaConcessionaria);
              //grava o id da concessionaria em uma variavel.
              $idConcessionaria = $concessionaria["concessionaria"];
              //instruçào que busca os dados no bd.
              $SQLNomeCS = "SELECT concessionaria FROM concessionarias WHERE id='$idConcessionaria';";
              //executa a instrução do bd.
              $consultaNomeCS = mysqli_query($conectaDB, $SQLNomeCS);
              //executa todos os retornos da consulta ao bd
              while($nomeCS = mysqli_fetch_assoc($consultaNomeCS)){
                ?>
                <option value="<?php print($idConcessionaria); ?>"><?php print($nomeCS["concessionaria"]);?></option>
             <?php
              }
                ?>
                </select>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-dark">Vender</button>
          </div>
        </form>
    </section>
    <!-- JavaScript Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>