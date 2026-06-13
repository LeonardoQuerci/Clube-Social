<?php
    $nivel_da_tela = 1;
    require_once '../../verifica.php';

    $id = $_SESSION['id'];
    $stmt = $pdo->prepare()
?>
<!DOCTYPE html>
<html>
<head>
    <title>Painel do Membro</title>
</head>
<body>
    <h1>Área de Membros</h1>
    <p>Olá, <?php echo ($_SESSION['id']); ?>, você está autenticado!</p>
</body>
</html>