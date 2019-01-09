<?php
namespace App\Decorator;

use App\Orcamento;
use App\Strategy\Imposto;

class ImpostoEstadual implements Imposto
{
    public function calcula(Orcamento $orcamento)
    {
        return number_format($orcamento->getValor() * 0.00001, 2);
    }
}
