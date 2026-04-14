<?php
class Usuario
{
    public $id;
    public $nome;
    public $sexo;
    public $senha;

    //Método homonimo de classe não é mais construtor
    // construtor da classe (PHP só aceita um por classe)
    function __construct($wnome, $wsexo, $wid, $wsenha)
    {
        //echo "no construtor de Pessoa <br>" ;
        $this->nome = $wnome;
        $this->sexo = $wsexo;
        $this->id = $wid;
        $this->senha = $wsenha;
    }

    function cadastrar(){
        $hostname="localhost";
        $username="Exemplo";
        $password="12345";
        $dbname="clubeSocial";
        $usertable="usuarios";

        $keyId=$_POST['id'];
        $keyNome=$_POST['nome'];
        $keySenha=$_POST['senha'];
        $keySexo=$_POST['sexo'];

        $conn=mysqli_connect($hostname,$username,$password);
        mysqli_select_db($conn,$dbname);
        $query="INSERT INTO $usertable VALUES ('$keyId', '$keyNome','$keySenha','$keySexo')";

        $result=mysqli_query($conn,$query);
        echo $result ? "CADASTRADO COM SUCESSO" : "ERRO NO CADASTRO";
    }
    
    function login(){
        $hostname="localhost";
        $username="Exemplo";
        $password="12345";
        $dbname="clubeSocial";
        $usertable="usuarios";
 
        $keyId=$_POST['id'];
        $keySenha=$_POST['senha'];
 
        $conn=mysqli_connect($hostname,$username,$password);
        mysqli_select_db($conn,$dbname);
 
        // Busca o usuario no banco pelo id
        $query="SELECT * FROM $usertable WHERE id='$keyId'";
        $result=mysqli_query($conn,$query);
 
        // Verifica se encontrou algum usuario com esse id
        if(mysqli_num_rows($result) > 0){
 
            // Pega a linha encontrada como array
            $row=mysqli_fetch_assoc($result);
 
            // Compara a senha digitada com a senha salva no banco
            if($keySenha == $row['senha']){
                echo "LOGIN OK - Bem vindo " . $row['nome'];
            } else {
                echo "SENHA INCORRETA";
            }
 
        } else {
            echo "USUARIO NAO ENCONTRADO";
        }
    }
    
    function atualizar(){
        $hostname="localhost";
        $username="Exemplo";
        $password="12345";
        $dbname="clubeSocial";
        $usertable="usuarios";
 
        $keyId=$_POST['id'];
        $keyNome=$_POST['nome'];
        $keySenha=$_POST['senha'];
        $keySexo=$_POST['sexo'];
 
        $conn=mysqli_connect($hostname,$username,$password);
        mysqli_select_db($conn,$dbname);
 
        // Atualiza nome, senha e sexo do usuario que tem o id informado
        $query="UPDATE $usertable SET nome='$keyNome', senha='$keySenha', sexo='$keySexo' WHERE id='$keyId'";
        $result=mysqli_query($conn,$query);
 
        echo $result ? "ATUALIZADO COM SUCESSO" : "ERRO NA ATUALIZACAO";
    }

}
