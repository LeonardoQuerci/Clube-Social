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

    }
    function excluirEvento(){
        
    }
}
