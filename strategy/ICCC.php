<?php
namespace App\Strategy;

use App\Orcamento;
use App\Decorator\ImpostoDecorator;

/**
 * Retorna 0,5% do valor do orçamento, caso seja menor que 1000
 * Retorna 0,7% do valor do orçamento, caso seja maior ou igual 1000 e menor ou igual 3000
 * Retorna 0,8% do valor do orçamento + 30, caso o valor seja acima de 3000
 */
class ICCC extends ImpostoDecorator
{
    public function calcula(Orcamento $orcamento)
    {
        if ($orcamento->getValor() < 1000) {
            return number_format($orcamento->getValor() * 0.005 + $this->calculaOutroImposto($orcamento), 2);
        }

        if ($orcamento->getValor() > 3000) {
            return number_format($orcamento->getValor() * 0.008 + 30 + $this->calculaOutroImposto($orcamento), 2);
        }

        return number_format($orcamento->getValor() * 0.007 + $this->calculaOutroImposto($orcamento), 2);
    }
}
