<?php
    $nivel_da_tela = 1;
    require_once '../../verifica.php';
    require_once '../../conecta.php';
    require_once '../../Model/eventos.php';

    $eventos = new Eventos($pdo);
?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Eventos - Clube Social</title>
    <link rel="stylesheet" href="../../css/style.css">
</head>
<body>
    <h1>Eventos do Clube</h1>

    <div>
        <?php $eventos->listarEventos(); ?>
    </div>

    <br>
    <?php if ($_SESSION['nivel'] == 2): ?>
        <a href="cadastrar.php"><button>Cadastrar novo evento</button></a>
        <a href="atualizar.php"><button>Atualizar evento</button></a>
        <a href="excluir.php"><button>Excluir evento</button></a>
        <br><br>
        <a href="../Usuario/admin.php"><button>Voltar ao painel</button></a>
    <?php else: ?>
        <a href="../Usuario/membro.php"><button>Voltar ao painel</button></a>
    <?php endif; ?>

</body>
</html>
