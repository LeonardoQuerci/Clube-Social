<?php
class Eventos
{
    public $nome;
    public $data;
    public $local;
    private $db;

    function __construct($pdo, $wnome = null, $wdata = null, $wlocal = null)
    {
        $this->db = $pdo;
        $this->nome = $wnome;
        $this->data = $wdata;
        $this->local = $wlocal;
    }

    function criarEvento()
    {
        $keyNome = $_POST['nome'];
        $keyData = $_POST['data'];
        $keyLocal = $_POST['local'];

        try {
            $query = "INSERT INTO eventos (nome, _data, _local) VALUES (:nome, :data, :local)";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':nome', $keyNome);
            $stmt->bindParam(':data', $keyData);
            $stmt->bindParam(':local', $keyLocal);
            $result = $stmt->execute();
            echo $result ? "✅ EVENTO CRIADO COM SUCESSO" : "❌ ERRO AO CRIAR EVENTO";
        } catch (PDOException $e) {
            echo "❌ ERRO AO CRIAR EVENTO: " . $e->getMessage();
        }
    }

    function listarEventos()
    {
        try {
            $query = "SELECT * FROM eventos";
            $stmt = $this->db->prepare($query);
            $stmt->execute();
            $eventos = $stmt->fetchAll();

            if (count($eventos) > 0) {
                foreach ($eventos as $row) {
                    echo "Nome: " . htmlspecialchars($row['nome']);
                    echo " | Data: " . htmlspecialchars($row['_data']);
                    echo " | Local: " . htmlspecialchars($row['_local']);
                    echo "<br>";
                }
            } else {
                echo "NENHUM EVENTO CADASTRADO";
            }
        } catch (PDOException $e) {
            echo "❌ ERRO AO LISTAR EVENTOS: " . $e->getMessage();
        }
    }

    function atualizarEventos()
    {
        $keyIdEvento = $_POST['id_evento'];
        $keyData = $_POST['data'];
        $keyLocal = $_POST['local'];

        try {
            $query = "UPDATE eventos SET _data = :data, _local = :local WHERE id_evento = :id_evento";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':data', $keyData);
            $stmt->bindParam(':local', $keyLocal);
            $stmt->bindParam(':id_evento', $keyIdEvento);
            $result = $stmt->execute();
            echo $result ? "✅ EVENTO ATUALIZADO COM SUCESSO" : "❌ ERRO AO ATUALIZAR EVENTO";
        } catch (PDOException $e) {
            echo "❌ ERRO AO ATUALIZAR EVENTO: " . $e->getMessage();
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
}
