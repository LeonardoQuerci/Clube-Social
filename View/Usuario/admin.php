<?php
    $nivel_da_tela = 2;
    require_once '../../verifica.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Painel do Administrador</title>
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
    <h3>Área do administrador</h3>
    <p>Olá, <?php echo htmlspecialchars($_SESSION['id']); ?>, você está autenticado!</p>

    <br>
    <a href="../Eventos/listar.php"><button>Gerenciar eventos</button></a>
    <a href="excluir.php"><button>Excluir usuário</button></a>
    <a href="../../login.php?logout=1"><button>Sair</button></a>
</body>
</html>