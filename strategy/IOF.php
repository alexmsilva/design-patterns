<?php
class IOF implements Imposto
{
    public function calcula(Orcamento $orcamento)
    {
        return number_format($orcamento->getValor() * 0.0638, 2);
    }
}
?>