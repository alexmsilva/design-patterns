<?php
class IOF extends Imposto
{
    public function calcula(Orcamento $orcamento)
    {
        return number_format($orcamento->getValor() * 0.0638 + $this->calculaOutroImposto($orcamento), 2);
    }
}
?>