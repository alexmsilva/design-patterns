<?php
abstract class Imposto
{
    private $outroImposto;

    function __construct($imposto = null)
    {
        $this->outroImposto = $imposto;
    }

    public abstract function calcula(Orcamento $orcamento);

    public function calculaOutroImposto($orcamento)
    {
        if (is_null($this->outroImposto)) {
            return 0;
        }

        return $this->outroImposto->calcula($orcamento);
    }
}
?>