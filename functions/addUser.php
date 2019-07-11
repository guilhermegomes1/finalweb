<?php

//conexão ao banco de dados
include 'conn.php';

//dados para consulta
$nome = $_POST['nome'];
$email = $_POST['email'];

//a gente já salva as senhas como md5, deixando criptografadas desde o começo
$senha1 = md5($_POST['senha1']);
$senha2 = md5($_POST['senha2']);

//preparação da query para consulta ao banco
$stmt = $pdo->prepare('SELECT name FROM users WHERE name = ?');
$stmt->execute([$nome]);

//se a senha for igual à confirmação, continuamos a operação de cadastro
if($senha1 == $senha2){
  //caso a pesquisa pelo nome encontre algo no banco, significa que o nome já está em uso...
  if($stmt->rowCount() > 0){
    //então o usuário é redirecionado para a página de cadastro
    header('location: ../cadastro.php');
  }else{
    //se não, inserimos as informações e completamos o cadastro do novo usuário...
    $stmt = $pdo->prepare('INSERT INTO users (name, email, password) VALUES (?, ?, ?)');
    $stmt->execute([$nome, $email, $senha1]);
    //e então é redirecionado à página de login
    header('location: ../index.php');
  }
}else{
  //caso as senhas informadas sejam diferentes, nada acontece e o usuário volta à tela de cadastro
  header('location: ../cadastro.php');
}


?>
