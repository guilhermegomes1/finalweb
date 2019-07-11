<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Final</title>
    <link rel="stylesheet" href="bootstrap.min.css">
  </head>
  <body>
    <div class="container mt-5 mb-5">
      <div class="row justify-content-center">
        <div class="col-md-5">
          <!--
            Aqui temos o formulário de cadastro de usuários. Muito simples, os names são os campos
            que vc vai cadastrar na tabela. Pegamos os dados e jogamos pro arquivo que vai fazer a
            inserção no banco.
          -->
          <form class="m-2 p-3 border shadow bg-light" action="functions/addUser.php" method="post">
            <h3>Cadastro</h3>
            <hr>
            <div class="form-group">
              Nome: <input type="text" name="nome" class="form-control">
            </div>
            <div class="form-group">
              Email: <input type="text" name="email" class="form-control">
            </div>
            <div class="form-group">
              Senha: <input type="password" name="senha1" class="form-control">
            </div>
            <div class="form-group">
              Confirme a senha: <input type="password" name="senha2" class="form-control">
            </div>
            <div class="form-group">
              <p>Voltar ao <a href="index.php">login</a>.</p>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-success">Cadastrar</button>
              <button type="reset" class="btn btn-danger">Cancelar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
