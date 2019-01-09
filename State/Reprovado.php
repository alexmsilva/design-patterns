<?php
namespace App\State;

use Exception;
use App\Orcamento;

class Reprovado implements Estado
{
    private $name;
    private $orcamento;

    function __construct(Orcamento $orcamento)
    {
        $this->name = "Reprovado";
        $this->orcamento = $orcamento;
    }

    public function getName()
    {
        return $this->name;
    }

    public function aprovar()
    {
        throw new Exception("Este orçamento já foi reprovado.");
    } 

    public function finalizar()
    {
        throw new Exception("Este orçamento já foi reprovado.");
    }

    public function reprovar()
    {
        throw new Exception("Este orçamento já foi reprovado antes.");
    }
}
