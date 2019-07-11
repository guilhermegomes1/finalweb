<?php

//conexão com o banco
include 'conn.php';

//recebemos o id do produto via get por meio da url
$id = $_GET['id'];

//preparamos a query para o banco para deletar o item que tenha o id igual ao que recebemos na url
$stmt = $pdo->prepare('DELETE FROM movies WHERE id = ?');
$stmt->execute([$id]);

//então redirecionamos o usuário novamente à página home da aplicação
header('location: ../home.php');


?>
