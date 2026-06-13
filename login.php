<?php
session_start();

require "conecta.php"; 

if (isset($_POST['id']) && isset($_POST['senha'])) {
    $id = $_POST['id'];
    $senha = $_POST['senha'];
    $veio_do_post = true;
} elseif (isset($_SESSION['id']) && isset($_SESSION['senha'])) {
    $id = $_SESSION['id'];
    $senha = $_SESSION['senha'];
    $veio_do_post = false;
} else {
    $id = false;
    $senha = false;
    $veio_do_post = false;
}

if ($id === false || $senha === false || empty($id) || empty($senha)) {
    header("Location: index.php");
    exit;
}

try {
    $stmt = $pdo->prepare("SELECT id, senha, cargo_id FROM usuarios WHERE id = :id");
    $stmt->execute([
        ":id" => $id
    ]);
    $usuario = $stmt->fetch();

    if ($usuario) {
        $senha_valida = false;
        
        if ($veio_do_post) {
            if (md5($senha) === $usuario['senha']) {
                $senha_valida = true;
            }
        } else {
            if ($senha === $usuario['senha']) {
                $senha_valida = true;
            }
        }

        if ($senha_valida) {
            $_SESSION['id'] = $usuario['id'];
            $_SESSION['senha'] = $usuario['senha']; 
            $_SESSION['nivel'] = $usuario['cargo_id'];

            if ($_SESSION['nivel'] == 2) {
                header("Location: View/Usuario/admin.php");
            } else {
                header("Location: View/Usuario/membro.php");
            }
            exit;
        }
    }

    unset($_SESSION['id']);
    unset($_SESSION['senha']);
    unset($_SESSION['nivel']);
    header("Location: index.php");
    exit;

} catch (PDOException $e) {
    header("Location: index.php");
    exit;
}
?>