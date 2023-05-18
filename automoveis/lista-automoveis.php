<?php 
 //inclusão do arquivo de conexão com o bd.
 include("conecta.php");

//recupera a area via método get
$area = $_GET["area"];
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSS Do BootStrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Listagem de Autómoveis</title>
  </head>
  <body>
    <!-- Cabeçalho -->
    <header class="p-5">
        <h1 class="text-uppercase text-center">Pátio de Automóveis - Listagem de Autómoveis</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a href="index.php">Listagem de Áreas</a></li>
                <li class="breadcrumb-item"><a href="lista-automoveis.php">Listagem de Autómoveis</a></li>
                <li class="breadcrumb-item"><a href="vende-automoveis.php">Venda de Autómoveis</a></li>
            </ol>
        </nav>
    </header>

    <!-- conteudo principal -->
    <section class="container">
<h2 class="text-center">Área<?php print($area);?></h2>
      <table class="table table-bordered text-center">
              <thead>
                  <tr>
                      <th scope="col">Modelo</th>
                      <th scope="col">Preço</th>
                      <th scope="col">Quantidade</th>
                      <th scope="col">Ações</th>
                  </tr>
              </thead>
              <tbody>
              <?php
              //instruçào que busca os dados no bd.
              $SQL = "SELECT automovel, quantidade FROM alocacao WHERE area ='$area';";
              //executa a instrução do bd.
              $consulta = mysqli_query($conectaDB, $SQL);
              //executa todos os retornos da consulta ao bd
              while($automovel = mysqli_fetch_assoc($consulta)){
                $id = $automovel["automovel"];
                $quantidade = $automovel["quantidade"];
                //consulta que carrega as informações do automovel.
                $SQLModelo = "SELECT modelo, preco FROM automoveis WHERE id = '$id';";
                //executa a instrução do bd.
                $consultaModelo = mysqli_query($conectaDB, $SQLModelo);
                //cria vetor com os dados do modelo de automóveis.
                $modelo = mysqli_fetch_assoc($consultaModelo);
                ?>
              <tr>
                <td><?php print($modelo["modelo"]);?></td>
                <td><?php print($modelo["preco"]);?></td>
                <td><?php print($quantidade);?></td>
                <td><a class="btn btn-dark" href="vende-automoveis.php?id=<?php print($id); ?>&area=<?php print($area); ?>">Vender</a></td>
              </tr>
              <?php
                }
                ?>
              </tbody>
          </table>
    </section>
    <!-- JavaScript Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>