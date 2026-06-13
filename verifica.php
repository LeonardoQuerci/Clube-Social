<?php
session_start();

if (!isset($_SESSION['id']) || !isset($_SESSION['nivel']) || !isset($_SESSION['senha'])) {
    echo "❌ Falta identificação.<br>";
    echo "<br><a href='../../index.php'>Ir para a página de login</a>";
    exit; 
}

if (!isset($nivel_da_tela)) {
    $nivel_da_tela = 2;
}

if ($_SESSION['nivel'] != $nivel_da_tela) {
    echo "❌ Acesso negado: Seu nível de acesso não permite visualizar esta página.<br>";
    echo "<br><a href='../../index.php'>Voltar</a>";
    exit;
}
?>