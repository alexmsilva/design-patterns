<?php
namespace App\Strategy;

use App\Orcamento;

interface Imposto
{
    public function calcula(Orcamento $orcamento);
}
