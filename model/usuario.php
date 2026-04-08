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

    function __destruct()
    {
        //echo "<br>No destrutor de Pessoas<br>" ;
    }
    /*
        function display(){
            echo "<br> nome = " . $this->nome ;
            echo "<br> sexo = " . $this->sexo . "<br>" ;
        }
*/
}
