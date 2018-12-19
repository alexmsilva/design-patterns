<?php
require_once "Finalizado.php";

class Aprovado implements Estado
{
    private $name;
    private $orcamento;

    function __construct(Orcamento $orcamento)
    {
        $this->name = "Aprovado";
        $this->orcamento = $orcamento;
    }

    public function getName()
    {
        return $this->name;
    }

    public function aprovar()
    {
        throw new Exception("Este orçamento já foi aprovado antes.");
    } 

    public function finalizar()
    {
        $this->orcamento->setEstado(new Finalizado($this->orcamento));
    }

    public function reprovar()
    {
        throw new Exception("Não é possível reprovar um orçamento que já foi aprovado.");
    }
}
