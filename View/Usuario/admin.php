<?php
    $nivel_da_tela = 2;
    require_once '../../verifica.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Painel do Membro</title>
</head>
<body>
    <h3>Área do administrador</h3>
    <p>Olá, <?php echo ($_SESSION['id']); ?>, você está autenticado!</p>
</body>
</html>