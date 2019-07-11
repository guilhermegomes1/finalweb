<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Crud Simples - PHP</title>
    <link rel="stylesheet" href="bootstrap.min.css">
  </head>
  <body>
    <div class="container mt-5 mb-5">
      <div class="row justify-content-center">
        <div class="col-md-5">
          <!-- Começamos com um formulário que joga os dados de nome e senha para o arquivo responsável pelo login -->
          <form class="m-2 p-3 border shadow bg-light" action="functions/login.php" method="post">
            <h3>Login</h3>
            <hr>
            <div class="form-group">
              Nome: <input type="text" name="nome" class="form-control">
            </div>
            <div class="form-group">
              Senha:
              <input type="password" name="senha" class="form-control">
            </div>
            <div class="form-group">
              <!-- Um link para a página de cadastro -->
              <p>
                Ainda não tem conta? <a href="cadastro.php">Cadastre-se!</a>
              </p>
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary">Login</button>
              <button type="reset" class="btn btn-danger">Cancel</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
