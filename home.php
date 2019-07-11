<!DOCTYPE html>
<html lang="pt" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Final</title>
    <link rel="stylesheet" href="bootstrap.min.css">

    <?php
      //iniciamos a sessãoptimize
      session_start();

      //importamos a conexão com o banco
      include 'functions/conn.php';

      //caso não exista ( !isset() ) uma variável de sessão chamada 'nome', o usuário é redirecionado de volta ao login.
      //isso é utilizado como prevenção a acesso sem estar logado no sistema.
      if(!isset($_SESSION['nome'])){
        header('location: index.php');
      }

      //assim que a página é acessada, fazemos uma consulta ao banco de dados pegando todos os registros de movies.
      $stmt = $pdo->prepare('SELECT * FROM movies');
      $stmt->execute();
      //transformamos o retorno em um array associativo
      $stmt = $stmt->fetchAll(PDO::FETCH_ASSOC);

    ?>

  </head>
  <body>
    <div class="container mt-5 mb-5">
      <h1 class="m-2">
        Bem-vindo, <?= $_SESSION['nome'] ?>!
        <a href="functions/logout.php" class="h5 m-4">Sair</a>
      </h1>
      <div class="row">
        <div class="col-md-8">
          <div class="m-2 p-3 bg-light shadow border">
            <h4>Listagem de filmes</h4>
            <br>
            <table class="table table-hover">
              <thead class="bg-info text-light">
                <tr>
                  <th>ID</th>
                  <th>Nome</th>
                  <th>Gênero</th>
                  <th>Ano</th>
                  <th>Duração</th>
                  <th>Sinopse</th>
                </tr>
              </thead>
              <tbody>
                <!--
                  Pegamos o array associativo com os filmes e fazemos um foreach, preenchendo a tabela para exibição.
                -->
                <?php foreach ($stmt as $filme): ?>
                  <tr>
                    <td><?= $filme['id'] ?></td>
                    <td><?= $filme['nome'] ?></td>
                    <td><?= $filme['genero'] ?></td>
                    <td><?= $filme['ano'] ?></td>
                    <td><?= $filme['duracao'] ?></td>
                    <td><?= $filme['sinopse'] ?></td>
                    <td class="text-center">
                      <!--
                        Aqui a gente cria um botão de editar o filme, passando o id dele via get pela url pro arquivo de edição.
                      -->
                      <a href="edit.php?id=<?= $filme['id'] ?>" class="text-info d-block">Editar</a>
                      <!-- Mesma coisa, dessa vez passando o id via get pela url para o mesmo ser excluído dos registros -->
                      <a href="functions/deleteFilme.php?id=<?= $filme['id'] ?>" class="text-danger d-block">Excluir</a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="col-md-4">
          <div class="m-2 p-3 bg-light border shadow">
            <!-- Aqui é o mesmo esquema, um formulário que manda os dados pra registro de um novo filme -->
            <form class="" action="functions/addFilme.php" method="post">
              <h4>Adicionar Filme</h4>
              <hr>
              <div class="form-group">
                Nome: <input type="text" name="nome" class="form-control">
              </div>
              <div class="form-group">
                Gênero: <input type="text" name="genero" class="form-control">
              </div>
              <div class="form-group">
                Ano: <input type="text" name="ano" class="form-control">
              </div>
              <div class="form-group">
                Duração: <input type="text" name="duracao" class="form-control">
              </div>
              <div class="form-group">
                Sinopse: <input type="text" name="sinopse" class="form-control">
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Adicionar</button>
                <button type="reset" class="btn btn-danger">Cancelar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
