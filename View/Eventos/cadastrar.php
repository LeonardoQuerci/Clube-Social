<?php
    $nivel_da_tela = 2;
    require_once '../../verifica.php';
    require_once '../../conecta.php';
    require_once '../../Model/eventos.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $evento = new Eventos($pdo);
        $evento->criarEvento();
    }
?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cadastrar Evento - Clube Social</title>
    <link rel="stylesheet" href="../../css/style.css">
    <script src="eventos.js"></script>
</head>
<body>
    <h1>Cadastrar Evento</h1>

    <form action="cadastrar.php" method="post" onsubmit="return validarEvento()">
        Nome do evento:
        <input type="text" name="nome" id="nome" required /><br><br>

        Data:
        <input type="datetime-local" name="data" id="data" required /><br><br>

        Local:
        <input type="text" name="local" id="local" required /><br><br>

        <input type="submit" value="Cadastrar" />
    </form>

    <br>
    <a href="listar.php"><button>Voltar para a lista</button></a>
</body>
</html>
