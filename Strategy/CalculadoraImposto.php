<?php
namespace App\Strategy;

use App\Orcamento;

class CalculadoraImposto
{
    public function calcula(Orcamento $orcamento, Imposto $imposto)
    {
        return $imposto->calcula($orcamento);
    }
}
