<?php

//iniciar a sessão
session_start();
//adicionar a conexão com o banco
include 'conn.php';

//resgatar valores passados pelo formulário
$nome = $_POST['nome'];
$genero = $_POST['genero'];
$ano = $_POST['ano'];
$duracao = $_POST['duracao'];
$sinopse = $_POST['sinopse'];
//id do usuário salva na variável de sessão
//aqui a gente prepara a query ao banco pra inserir um novo filme, passando nome, genero, ano, duracao, sinopse e o id do usuário
//para ser usado como chave estrangeira
$stmt = $pdo->prepare("INSERT INTO movies(name, genre, year, duration, synopsis) VALUES (?,?,?,?,?)");
$stmt->execute([$nome, $genero, $ano, $duracao, $sinopse]);


//redirecionamento de volta à home
header('location: ../home.php');	

 ?>
