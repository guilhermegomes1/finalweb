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
$id_user = $_SESSION['id'];

//aqui a gente prepara a query ao banco pra inserir um novo filme, passando nome, genero, ano, duracao, sinopse e o id do usuário
//para ser usado como chave estrangeira
$stmt = $pdo->prepare('INSERT INTO movies (name, genre, year, duration, sinopsis, id_user) VALUES (?,?,?,?,?,?)');

//informações vindas do usuário para inserção no banco
//IMPORTANTE!!!
//a gente tem que colocar os dados na mesma ordem que colcamos na query (name, genre, year, duration, sinopsis, depois id_user)
$stmt->execute([$nome, $genero, $ano, $duracao, $sinopse, $id_user]);

//redirecionamento de volta à home
header('location: ../home.php');

 ?>
