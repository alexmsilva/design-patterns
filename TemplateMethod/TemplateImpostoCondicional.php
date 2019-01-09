<?php
namespace App\TemplateMethod;

use App\Orcamento;
use App\Decorator\ImpostoDecorator;

abstract class TemplateImpostoCondicional extends ImpostoDecorator
{
	public final function calcula(Orcamento $orcamento)
	{
		if ($this->deveUsarMaximaTaxacao($orcamento)) {
			return $this->maximaTaxacao($orcamento) + $this->calculaOutroImposto($orcamento);
		}

		return $this->minimaTaxacao($orcamento) + $this->calculaOutroImposto($orcamento);
	}

	public abstract function deveUsarMaximaTaxacao(Orcamento $orcamento);

	public abstract function maximaTaxacao(Orcamento $orcamento);

	public abstract function minimaTaxacao(Orcamento $orcamento);
}
