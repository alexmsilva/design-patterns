<?php
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
