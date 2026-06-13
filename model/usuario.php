<?php
class Usuario
{
    public $id;
    public $nome;
    public $sexo;
    public $senha;
    private $db; // Variável interna para guardar a conexão PDO

    // O construtor agora recebe a conexão com o banco ($pdo)
    function __construct($pdo, $wnome = null, $wsexo = null, $wid = null, $wsenha = null)
    {
        $this->db = $pdo;
        $this->nome = $wnome;
        $this->sexo = $wsexo;
        $this->id = $wid;
        $this->senha = $wsenha;
    }

    function cadastrar()
    {
        $keyId    = $_POST['id'];
        $keyNome  = $_POST['nome'];
        $keySenha = md5($_POST['senha']);
        $keySexo  = $_POST['sexo'];
        $keyCargo = $_POST['cargo_id'] ?? 1;

        $erros = [];

        if (empty($keyId)) {
            $erros[] = "O CPF É OBRIGATÓRIO";
        }
        if (empty($keyNome)) {
            $erros[] = "O NOME É OBRIGATÓRIO";
        }
        if (empty($keySexo)) {
            $erros[] = "O SEXO É OBRIGATÓRIO";
        }
        if (empty($keySenha)) {
            $erros[] = "A SENHA É OBRIGATÓRIA";
        } else if (strlen($keySenha) < 4) {
            $erros[] = "A SENHA DEVER TER NO MINIMO 4 CARACTERES";
        }

        //SE EXISTIR ERROS 
        if (!empty($erros)) {
            foreach ($erros as $erro) {
                echo "❌ " . $erro . "<br>";
            }
            echo "<br><a href='../View/Usuario/cadastrar.php'>Voltar</a>";
            exit;
        }

        try {
            $query_verificar = "SELECT id FROM usuarios WHERE id = :id";
            $stmt_verificar = $this->db->prepare($query_verificar);
            $stmt_verificar->bindParam(':id', $keyId);
            $stmt_verificar->execute();
            if ($stmt_verificar->rowCount() > 0) {
                echo "❌ O ID '$keyId' já está sendo utilizado por outro usuário.<br>";
                echo "<br><a href='javascript:history.back()'>Voltar e escolher outro</a>";
                exit;
            }
            $query = "INSERT INTO usuarios (id, nome, senha, sexo, cargo_id) VALUES (:id, :nome, :senha, :sexo, :cargo_id)";
            $stmt = $this->db->prepare($query);
            $stmt->bindParam(':id', $keyId);
            $stmt->bindParam(':nome', $keyNome);
            $stmt->bindParam(':senha', $keySenha);
            $stmt->bindParam(':sexo', $keySexo);
            $stmt->bindParam(':cargo_id', $keyCargo);
            $result = $stmt->execute();
            if ($result) {
                echo "<h2>✅ CADASTRADO COM SUCESSO!</h2>";
                echo "<p>Seu ID de acesso é: <strong>$keyId</strong></p>";
                echo "<br><a href='../../index.php'>Ir para a tela de Login</a>";
            } else {
                echo "❌ ERRO NO CADASTRO";
                echo "<br><a href='javascript:history.back()'>Voltar</a>";
            }
        } catch (PDOException $e) {
            echo "ERRO NO CADASTRO: " . $e->getMessage();
            echo "<br><a href='javascript:history.back()'>Voltar</a>";
        }
    }

    function atualizar()
    {
        $keyId    = $_POST['id'];
        $keyNome  = $_POST['nome'];
        $keySenha = $_POST['senha'];
        $keySexo  = $_POST['sexo'];

        try {
            $query = "UPDATE usuarios SET nome = :nome, senha = :senha, sexo = :sexo WHERE id = :id";
            $stmt = $this->db->prepare($query);

            $stmt->bindParam(':id', $keyId);
            $stmt->bindParam(':nome', $keyNome);
            $stmt->bindParam(':senha', $keySenha);
            $stmt->bindParam(':sexo', $keySexo);

            $result = $stmt->execute();
            echo $result ? "ATUALIZADO COM SUCESSO" : "ERRO NA ATUALIZACAO";
        } catch (PDOException $e) {
            echo "ERRO NA ATUALIZAÇÃO: " . $e->getMessage();
        }
    }
}
