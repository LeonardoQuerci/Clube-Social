<?php
class Eventos
{
    public $nome;
    public $data;
    public $local;

    //Método homonimo de classe não é mais construtor
    // construtor da classe (PHP só aceita um por classe)
    function __construct($wnome, $wdata, $wlocal)
    {
        //echo "no construtor de Pessoa <br>" ;
        $this->nome = $wnome;
        $this->data = $wdata;
        $this->local = $wlocal;
    }

    function criarEvento(){
        $hostname="localhost";
        $username="Exemplo";
        $password="12345";
        $dbname="clubeSocial";
        $usertable="eventos";
 
        $keyNome=$_POST['nome'];
        $keyData=$_POST['data'];
        $keyLocal=$_POST['local'];
 
        $conn=mysqli_connect($hostname,$username,$password);
        mysqli_select_db($conn,$dbname);
 
        $query="INSERT INTO $usertable VALUES ('$keyNome', '$keyData', '$keyLocal')";
        $result=mysqli_query($conn,$query);
 
        echo $result ? "EVENTO CRIADO COM SUCESSO" : "ERRO AO CRIAR EVENTO";
    }
    
    function listarEventos(){
        $hostname="localhost";
        $username="Exemplo";
        $password="12345";
        $dbname="clubeSocial";
        $usertable="eventos";
 
        $conn=mysqli_connect($hostname,$username,$password);
        mysqli_select_db($conn,$dbname);
 
        // Busca todos os eventos cadastrados no banco
        $query="SELECT * FROM $usertable";
        $result=mysqli_query($conn,$query);
 
        // Verifica se encontrou algum evento
        if(mysqli_num_rows($result) > 0){
 
            // Percorre linha por linha e exibe os dados
            while($row=mysqli_fetch_assoc($result)){
                echo "Nome: " . $row['nome'];
                echo " | Data: " . $row['data'];
                echo " | Local: " . $row['local'];
                echo "<br>";
            }
 
        } else {
            echo "NENHUM EVENTO CADASTRADO";
        }
    }
 
    function atulizarEventos(){
        $hostname="localhost";
        $username="Exemplo";
        $password="12345";
        $dbname="clubeSocial";
        $usertable="eventos";
 
        $keyNome=$_POST['nome'];
        $keyData=$_POST['data'];
        $keyLocal=$_POST['local'];
 
        $conn=mysqli_connect($hostname,$username,$password);
        mysqli_select_db($conn,$dbname);
 
        // Atualiza data e local do evento que tem o nome informado
        $query="UPDATE $usertable SET data='$keyData', local='$keyLocal' WHERE nome='$keyNome'";
        $result=mysqli_query($conn,$query);
 
        echo $result ? "EVENTO ATUALIZADO COM SUCESSO" : "ERRO AO ATUALIZAR EVENTO";
    }
}
