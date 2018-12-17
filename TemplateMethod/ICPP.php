<?php
class ICPP extends TemplateImpostoCondicional
{
    public function deveUsarMaximaTaxacao(Orcamento $orcamento)
    {
    	return ($orcamento->getValor() > 500);
    }

    public function maximaTaxacao(Orcamento $orcamento)
    {
    	return number_format($orcamento->getValor() * 0.0007, 2);
    }

    public function minimaTaxacao(Orcamento $orcamento)
    {
    	return number_format($orcamento->getValor() * 0.0005, 2);
    }
}
