<?php

class Cargos
{
    private $db;

    function __construct($pdo)
    {
        $this->db = $pdo;
    }

    function excluirUsuario()
    {
        $keyId = $_POST['id'];

        try {
            $query = "DELETE FROM usuarios WHERE id = :id";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':id', $keyId);
            $result = $stmt->execute();
            echo $result ? "✅ USUÁRIO EXCLUÍDO COM SUCESSO" : "❌ ERRO AO EXCLUIR USUÁRIO";
        } catch (PDOException $e) {
            echo "❌ ERRO AO EXCLUIR USUÁRIO: " . $e->getMessage();
        }
    }

    function excluirEvento()
    {
        $keyIdEvento = $_POST['id_evento'];

        try {
            $query = "DELETE FROM eventos WHERE id_evento = :id_evento";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':id_evento', $keyIdEvento);
            $result = $stmt->execute();
            echo $result ? "✅ EVENTO EXCLUÍDO COM SUCESSO" : "❌ ERRO AO EXCLUIR EVENTO";
        } catch (PDOException $e) {
            echo "❌ ERRO AO EXCLUIR EVENTO: " . $e->getMessage();
        }
    }

    function listarCargos()
    {
        try {
            $query = "SELECT * FROM cargos";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            $cargos = $stmt->fetchAll();

            foreach ($cargos as $row) {
                echo "ID: " . htmlspecialchars($row['id']) . " | Nome: " . htmlspecialchars($row['nome']) . "<br>";
            }
        } catch (PDOException $e) {
            echo "❌ ERRO AO LISTAR CARGOS: " . $e->getMessage();
        }
    }
}
