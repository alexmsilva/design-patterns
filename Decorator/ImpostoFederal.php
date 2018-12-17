<?php
class ImpostoFederal implements Imposto
{
    public function calcula(Orcamento $orcamento)
    {
        return number_format($orcamento->getValor() * 0.000015, 2);
    }
}
