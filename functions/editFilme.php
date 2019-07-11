<?php

//conexão com o banco (de novo...)
include 'conn.php';

//pegamos os dados do filme vindos do formulário
$id = $_GET['id'];
$nome = $_POST['nome'];
$genero = $_POST['genero'];
$ano = $_POST['ano'];
$duracao = $_POST['duracao'];
$sinopse = $_POST['sinopse'];

//e preparamos a alteração dos dados na tabela
$stmt = $pdo->prepare('UPDATE movies SET name = ?, genre = ?, year = ?, duration = ?, sinopse = ? WHERE id = ?');

//LEMBRANDO!!!
//colocamos sempre na ordem que a gente especificou na linha (nome, descrição e DEPOIS o id)
$stmt->execute([$nome, $genero, $ano, $duracao, $sinopse, $descricao, $id]);

//por fim, seguimos o padrão e voltamos à página principal
header('location: ../home.php');

?>
