<?php

//iniciamos uma sessão
session_start();
//conexão com o banco
include 'conn.php';

//resgatamos as informações do formulário
$nome = $_POST['nome'];
$email = $_POST['email'];
//guardamos a senha com a codificação md5
$senha = md5($_POST['senha']);

//pesquisamos no banco um usuário com nome e senha cadastrados
$stmt = $pdo->prepare('SELECT * FROM users WHERE name = ? AND password = ?');
$stmt->execute([$nome, $senha]);

//caso o retorno seja vazio, os dados passados são incorretos ou não existe um cadastrado
//com os dados passados
if($stmt->rowCount() == 0){
  //então o usuário é redirecionado à página de cadastro
  header('location: ../cadastro.php');
}else{
  //senão, transformamos o retorno em um array associativo
  $stmt = $stmt->fetchAll(PDO::FETCH_ASSOC);

  //salvamos o id e o nome do usuário em variáveis de sessão para uso posterior
  $_SESSION['id'] = $stmt[0]['id'];
  $_SESSION['nome'] = $stmt[0]['name'];

  //então o usuário é redirecionado para a página principal da aplicação
  header('location: ../home.php');
}

?>
