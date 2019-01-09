<?php
namespace App\ChainResponsability;

use App\Orcamento;

class SemDesconto implements Desconto
{
	public function calcula(Orcamento $orcamento)
	{
		return 0;
	}

	public function setProximo(Desconto $desconto)
	{

	}
}
