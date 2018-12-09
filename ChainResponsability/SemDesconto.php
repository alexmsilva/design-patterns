<?php
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
?>