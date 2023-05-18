<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSS Do BootStrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Listagem de Áreas</title>
  </head>
  <body>
    <!-- Cabeçalho -->
    <header class="p-5">
        <h1 class="text-uppercase text-center">Pátio de Automóveis - Listagem de Áreas</h1>
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
      

        <table class="table table-bordered text-center">
            <thead>
                <tr>
                    <th scope="col">Áreas</th>
                    <th scope="col">Modelos a Venda</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
                <tbody>
                <?php
        //inclusão do arquivo de conexão com o bd.
                    include("conecta.php");

                    //instruçào que busca os dados no bd.
                    $SQL = "SELECT area, COUNT(automovel) AS quantidade FROM alocacao GROUP BY area;";

                    //executa a instrução do bd.
                    $consulta = mysqli_query($conectaDB, $SQL);

                    //executa todos os retornos da consulta ao bd
                    while ($automovel = mysqli_fetch_assoc($consulta)){
                      ?>
                      <tr>
                        <td><?php print($automovel["area"]);?></td>
                        <td><?php print($automovel["quantidade"]);?></td>
                        <td><a class="btn btn-dark" href="lista-automoveis.php?area=<?php print($automovel["area"]);?>">Visualizar</a></td>
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