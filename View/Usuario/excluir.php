<?php
    $nivel_da_tela = 2;
    require_once '../../verifica.php';
    require_once '../../conecta.php';
    require_once '../../Model/cargos.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $cargos = new Cargos($pdo);
        $cargos->excluirUsuario();
    }

    $stmt = $pdo->prepare("SELECT id, nome FROM usuarios WHERE id != :id_logado");
    $stmt->execute([':id_logado' => $_SESSION['id']]);
    $listaUsuarios = $stmt->fetchAll();
?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Excluir Usuário - Clube Social</title>
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
    <h1>Excluir Usuário</h1>

    <?php if (empty($listaUsuarios)): ?>
        <p>Nenhum outro usuário cadastrado.</p>
    <?php else: ?>
    <form action="excluir.php" method="post" onsubmit="return confirm('Tem certeza que deseja excluir este usuário?')">
        Usuário:
        <select name="id" required>
            <?php foreach ($listaUsuarios as $u): ?>
                <option value="<?php echo htmlspecialchars($u['id']); ?>">
                    <?php echo htmlspecialchars($u['id']) . " - " . htmlspecialchars($u['nome']); ?>
                </option>
            <?php endforeach; ?>
        </select><br><br>

        <input type="submit" value="Excluir" />
    </form>
    <?php endif; ?>

    <br>
    <a href="admin.php"><button>Voltar ao painel</button></a>
</body>
</html>
