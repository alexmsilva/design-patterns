<?php
class IOF extends ImpostoDecorator
{
    public function calcula(Orcamento $orcamento)
    {
        return number_format($orcamento->getValor() * 0.00638 + $this->calculaOutroImposto($orcamento), 2);
    }
}
