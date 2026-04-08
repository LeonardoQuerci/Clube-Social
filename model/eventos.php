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

    function criarEvento()
}
