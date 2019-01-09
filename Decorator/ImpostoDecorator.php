<?php
namespace App\Decorator;

use App\Orcamento;
use App\Strategy\Imposto;

abstract class ImpostoDecorator implements Imposto
{
    protected $outroImposto;

    function __construct($imposto = null)
    {
        $this->outroImposto = $imposto;
    }

    public function calculaOutroImposto(Orcamento $orcamento)
    {
        if (is_null($this->outroImposto)) {
            return 0;
        }
        
        return $this->outroImposto->calcula($orcamento);
    }
}
