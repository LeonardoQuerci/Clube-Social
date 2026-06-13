<?php
    $nivel_da_tela = 2;
    require_once '../../verifica.php';
    require_once '../../conecta.php';
    require_once '../../Model/eventos.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $evento = new Eventos($pdo);
        $evento->excluirEvento();
    }

    $stmt = $pdo->prepare("SELECT id_evento, nome, _data FROM eventos");
    $stmt->execute();
    $listaEventos = $stmt->fetchAll();
?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Excluir Evento - Clube Social</title>
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
    <h1>Excluir Evento</h1>

    <?php if (empty($listaEventos)): ?>
        <p>Nenhum evento cadastrado.</p>
    <?php else: ?>
    <form action="excluir.php" method="post" onsubmit="return confirm('Tem certeza que deseja excluir este evento?')">
        Evento:
        <select name="id_evento" required>
            <?php foreach ($listaEventos as $ev): ?>
                <option value="<?php echo $ev['id_evento']; ?>">
                    <?php echo htmlspecialchars($ev['nome']) . " - " . htmlspecialchars($ev['_data']); ?>
                </option>
            <?php endforeach; ?>
        </select><br><br>

        <input type="submit" value="Excluir" />
    </form>
    <?php endif; ?>

    <br>
    <a href="listar.php"><button>Voltar para a lista</button></a>
</body>
</html>
