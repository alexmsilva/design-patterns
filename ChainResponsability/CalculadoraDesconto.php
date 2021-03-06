<?php
namespace App\ChainResponsability;

use App\Orcamento;

class CalculadoraDesconto
{
	public function calcula(Orcamento $orcamento)
	{
		$desconto5Items = new Desconto5Items();
		$desconto500Reais = new Desconto500Reais();
		$semDesconto = new SemDesconto();
		$desconto6MilReais = new Desconto6MilReais();

		$desconto6MilReais->setProximo($desconto5Items);
		$desconto5Items->setProximo($desconto500Reais);
		$desconto500Reais->setProximo($semDesconto);

		return $desconto6MilReais->calcula($orcamento);
	}
}
