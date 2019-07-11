<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Final</title>
    <link rel="stylesheet" href="bootstrap.min.css">

    <?php

      //iniciamos a sessão
      session_start();

      //conexão com o banco
      include 'functions/conn.php';

      //caso não exista ( !isset() ) uma variável de sessão chamada 'nome', o usuário é redirecionado de volta ao login.
      //isso é utilizado como prevenção a acesso sem estar logado no sistema.
      if(!isset($_SESSION['nome'])){
        header('location: index.php');
      }

      //recuperamos o id do filme que queremos editar
      $id = $_GET['id'];

      //e criamos uma query pro banco que nos retorna o filme que tem aquele id
      $stmt = $pdo->prepare('SELECT nome, genre, year, duration, sinopsis FROM movies WHERE id = ?');
      $stmt->execute([$id]);
      //transformamos o retorno num array associativo
      $stmt = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>

  </head>
  <body>
    <div class="container mt-5 mb-5">
      <div class="row justify-cotent-center">
        <div class="col-md-6">
          <!--
            Aqui criamos um novo formulário, dessa vez colocando o campo "value" com os valores já registrados no banco,
            apenas para o usuário editar o que achar melhor. O submit vai enviar os valores para o arquivo que vai fazer
            as edições no banco.
          -->
          <form class="" action="functions/editFilme.php" method="get">
            <h4>Editar Filme</h4>
            <!--
              Colocamos o id num input invisível para ser passado novamente junto com as outras informações. Isso é necessário
              para não editarmos todos os itens da tabela de uma só vez.
            -->
            <input type="hidden" name="id" value="<?= $id ?>">
            <div class="form-group">
              Nome: <input type="text" name="nome" class="form-control" value="<?= $stmt[0]['nome'] ?>">
            </div>
            <div class="form-group">
              Gênero: <input type="text" name="genero" class="form-control" value="<?= $stmt[0]['genero'] ?>">
            </div>
            <div class="form-group">
              Ano: <input type="text" name="ano" class="form-control" value="<?= $stmt[0]['ano'] ?>">
            </div>
            <div class="form-group">
              Duração: <input type="text" name="duracao" class="form-control" value="<?= $stmt[0]['duracao'] ?>">
            </div>
            <div class="form-group">
              Sinopse: <input type="text" name="sinopse" class="form-control" value="<?= $stmt[0]['sinopse'] ?>">
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-info">Editar</button>
              <a href="home.php" class="btn btn-danger">Cancelar</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
