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
