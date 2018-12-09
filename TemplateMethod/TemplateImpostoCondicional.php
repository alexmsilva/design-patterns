<?php
abstract class TemplateImpostoCondicional implements Imposto
{
	public final function calcula(Orcamento $orcamento)
	{
		if ($this->deveUsarMaximaTaxacao($orcamento)) {
			return $this->maximaTaxacao($orcamento);
		}

		return $this->minimaTaxacao($orcamento);
	}

	public abstract function deveUsarMaximaTaxacao(Orcamento $orcamento);

	public abstract function maximaTaxacao(Orcamento $orcamento);

	public abstract function minimaTaxacao(Orcamento $orcamento);
}
?>
