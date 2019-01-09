<?php
namespace App\ChainResponsability;

use App\Orcamento;

class Desconto500Reais implements Desconto
{
	private $proximo;

	public function calcula(Orcamento $orcamento)
	{
		if ($orcamento->getValor() > 500) {
			return number_format($orcamento->getValor() * 0.1, 2);
		}

		return $this->proximo->calcula($orcamento);
	}

	public function setProximo(Desconto $desconto)
	{
		$this->proximo = $desconto;
	}
}
