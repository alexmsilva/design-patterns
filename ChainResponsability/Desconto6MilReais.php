<?php
namespace App\ChainResponsability;

use App\Orcamento;

class Desconto6MilReais implements Desconto
{
	private $proximo;

	public function calcula(Orcamento $orcamento)
	{
		if ($orcamento->getValor() > 6000) {
			return number_format($orcamento->getValor() * 0.2, 2);
		}

		return $this->proximo->calcula($orcamento);
	}

	public function setProximo(Desconto $desconto)
	{
		$this->proximo = $desconto;
	}
}
