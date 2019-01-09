<?php
namespace App\Strategy;

use App\Orcamento;
use App\Decorator\ImpostoDecorator;

class IOF extends ImpostoDecorator
{
    public function calcula(Orcamento $orcamento)
    {
        return number_format($orcamento->getValor() * 0.00638 + $this->calculaOutroImposto($orcamento), 2);
    }
}
