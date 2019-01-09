<?php
namespace App\Decorator;

use App\Orcamento;
use App\Strategy\Imposto;

class ImpostoFederal implements Imposto
{
    public function calcula(Orcamento $orcamento)
    {
        return number_format($orcamento->getValor() * 0.000015, 2);
    }
}
