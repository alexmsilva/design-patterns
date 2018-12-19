<?php
class Finalizado implements Estado
{
    private $name;
    private $orcamento;

    function __construct(Orcamento $orcamento)
    {
        $this->name = "Finalizado";
        $this->orcamento = $orcamento;
    }

    public function getName()
    {
        return $this->name;
    }

    public function aprovar()
    {
        throw new Exception("Este orçamento já foi finalizado.");
    } 

    public function finalizar()
    {
        throw new Exception("Este orçamento já foi finalizado antes.");
    }

    public function reprovar()
    {
        throw new Exception("Não é possível reprovar um orçamento que já foi finalizado.");
    }
}
