<?php
    $nivel_da_tela = 1;
    require_once '../../verifica.php';
    require_once '../../conecta.php';

    $id = $_SESSION['id'];

    // Busca dados do usuário logado
    $stmt = $pdo->prepare("SELECT nome, sexo FROM usuarios WHERE id = :id");
    $stmt->execute([':id' => $id]);
    $usuario = $stmt->fetch();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Painel do Membro</title>
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
    <h1>Área de Membros</h1>
    <p>Olá, <?php echo htmlspecialchars($_SESSION['id']); ?>, você está autenticado!</p>
    <?php if ($usuario): ?>
        <p>Nome: <?php echo htmlspecialchars($usuario['nome']); ?></p>
        <p>Sexo: <?php echo htmlspecialchars($usuario['sexo']); ?></p>
    <?php endif; ?>

    <br>
    <a href="../Eventos/listar.php"><button>Ver eventos</button></a>
    <a href="../../login.php?logout=1"><button>Sair</button></a>
</body>
</html>