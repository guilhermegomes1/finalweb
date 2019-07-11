<?php

//dados de acesso para conectar ao banco (nome do database, usuário e senha do mysql)
$dbname = 'web20191filmes';
$user = 'root';
$pass = 'ifpe';

try {
  //nessa linha a gente instancia um objeto PDO pra nos conectarmos.
  //vamos sempre usar essa variável, pois nela contém as funções PDO para operações com o banco de dados
  $pdo = new PDO('mysql:host=localhost;dbname='.$dbname, $user, $pass);
  echo "Connected!";
} catch (\Exception $e) {
  //caso aconteça algum erro, ele nos retorna a mensagem.
  echo "ERRO: " . $e->getMessage();
}


?>