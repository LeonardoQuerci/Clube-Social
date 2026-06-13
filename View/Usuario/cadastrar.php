<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  require_once '../../conecta.php';
  require_once '../../Model/usuario.php';
  $usuario = new Usuario($pdo);
  $usuario->cadastrar();
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Pagina de cadastro</title>
</head>

<body>
  <h3>Pagina de cadastro</h3>

  <form action="cadastrar.php" method="post">
    <br />
    ID:
    <input type="text" name="id" /><br />
    <br />
    Nome:
    <input type="text" name="nome" /><br />
    <br>
    Senha:
    <input type="password" name="senha" /><br />
    <br />
    Sexo: <br />
    M<input type="radio" name="sexo" value="M" />
    F<input type="radio" name="sexo" value="F" /><br />
    <br />
    <input type="submit" value="Cadastrar" /><br><br>
  </form>

  <form action="../index.php">
    <button type="submit">Retornar</button>
  </form>

</body>

</html>