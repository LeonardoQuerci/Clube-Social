<?php

require_once "usuario.php";

class Cargos extends Usuario{
    public $id_cargo;
    public $data;

    //Método homonimo de classe não é mais construtor
    // construtor da classe (PHP só aceita um por classe)
     function __construct ($wnome, $wsexo, $wid, $wsenha, $wid_cargo, $wdata) {
            //echo "no construtor de Pessoa <br>" ;
            parent::__construct($wnome, $wsexo, $wid, $wsenha);
            $this->id_cargo = $wid_cargo;
            $this->data = $wdata;
        }

    function excluirUsuario(){
        $hostname="localhost";
        $username="Exemplo";
        $password="12345";
        $dbname="clubeSocial";
        $usertable="usuarios";
 
        $keyId=$_POST['id'];
 
        $conn=mysqli_connect($hostname,$username,$password);
        mysqli_select_db($conn,$dbname);
 
        // Exclui o usuario que tem o id informado
        $query="DELETE FROM $usertable WHERE id='$keyId'";
        $result=mysqli_query($conn,$query);
 
        echo $result ? "USUARIO EXCLUIDO COM SUCESSO" : "ERRO AO EXCLUIR USUARIO";
    }
    
    function excluirEvento(){
        $hostname="localhost";
        $username="Exemplo";
        $password="12345";
        $dbname="clubeSocial";
        $usertable="eventos";
 
        $keyNome=$_POST['nome'];
 
        $conn=mysqli_connect($hostname,$username,$password);
        mysqli_select_db($conn,$dbname);
 
        // Exclui o evento que tem o nome informado
        $query="DELETE FROM $usertable WHERE nome='$keyNome'";
        $result=mysqli_query($conn,$query);
 
        echo $result ? "EVENTO EXCLUIDO COM SUCESSO" : "ERRO AO EXCLUIR EVENTO";
    }
}
