<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Clube-Social</title>
  </head>
  <body>
    <h1>Seja bem-vindo ao clube do IBTP</h1>
    <div>
      <h3>Entrar</h3>
      <form action="login.php" method="post"> 
        ID:
        <input type="text" name="id" placeholder="santana" required /> <br /> 
        <br />
        Senha:
        <input type="password" name="senha" placeholder="******" required /> <br /> 
        <br />
        <input type="submit" value="Entrar" /> <br />
        <br />
      </form>
      
      <hr />
      
      <h3>Caso seja sua primeira vez clique no botão abaixo</h3>
      <a href="View/Usuario/cadastrar.php"><button>Cadastrar</button></a>
      
      <br><br>
      <hr>
      
      <h3>Caso deseje acessar a documentação do site, clique no botão abaixo</h3>
      <a href="Doc/documentacao.html"><button>Documentacao</button></a>
    </div>
  </body>
</html>