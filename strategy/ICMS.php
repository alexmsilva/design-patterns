<?php
namespace App\Strategy;

use App\Orcamento;
use App\TemplateMethod\TemplateImpostoCondicional;

class ICMS extends TemplateImpostoCondicional
{
    public function deveUsarMaximaTaxacao(Orcamento $orcamento)
    {
    	return ($orcamento->getValor() > 500);
    }

    public function maximaTaxacao(Orcamento $orcamento)
    {
    	return number_format($orcamento->getValor() * 0.07, 2);
    }

    public function minimaTaxacao(Orcamento $orcamento)
    {
    	return number_format($orcamento->getValor() * 0.05, 2);
    }
}
