<?php

//para fazer o logout do usuário a gente inicia a sessão
session_start();

//e depois destruímos ela. Não tem como a gente destruir os dados da sessão sem iniciar ela na página.
//é como se fosse um tipo de acesso às variáveis, você ganha o acesso depois destrói as informações.
session_destroy();

//por fim, a gente redireciona pra index.
header('location: ../index.php');

?>
