<?php
require_once "Estado.php";
require_once "Aprovado.php";
require_once "Reprovado.php";

class Processando implements Estado
{
    private $name;
    private $orcamento;

    function __construct(Orcamento $orcamento)
    {
        $this->name = "Em processamento";
        $this->orcamento = $orcamento;
    }

    public function getName()
    {
        return $this->name;
    }

    public function aprovar()
    {
        $this->orcamento->setEstado(new Aprovado($this->orcamento));
    } 

    public function finalizar()
    {
        throw new Exception("Não é possível finalizar um orcamento sem aprová-lo.");
    }

    public function reprovar()
    {
        $this->orcamento->mudaEstado(new Reprovado($this->orcamento));
    }
}
