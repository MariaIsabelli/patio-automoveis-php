<?php
  //define o padrão de caracteres das páginas do software.
  header("Content-Type: text/html; charset=utf8");
  //variaveis de conexão com o bd. 
    $host = "localhost";
    $user = "root";
    $password = "root";
    $database = "automoveis_db";

    //variaves de coneçao com o banco de dados 
    $conectaDB = mysqli_connect($host, $user, $password, $database);

    //ver se tem erro com a conexão com o Banco de Dados
    if(!$conectaDB){
        print("Falha de conccao com o Banco de Dados" . mysqli_connect_errno());
    }
    //define o padrão de caracteres do bando de dados.
    mysqli_set_charset($conectaDB, "utf8");
?>