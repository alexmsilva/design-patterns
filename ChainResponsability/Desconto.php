<?php
namespace App\ChainResponsability;

use App\Orcamento;

interface Desconto
{
	public function calcula(Orcamento $orcamento);
	public function setProximo(Desconto $desconto);
}
