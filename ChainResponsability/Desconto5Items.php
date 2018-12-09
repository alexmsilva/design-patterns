<?php
class Desconto5Items implements Desconto
{
	private $proximo;

	public function calcula(Orcamento $orcamento)
	{
		if (count($orcamento->getItems()) >= 5) {
			return number_format($orcamento->getValor() * 0.05, 2);
		}

		return $this->proximo->calcula($orcamento);
	}

	public function setProximo(Desconto $desconto)
	{
		$this->proximo = $desconto;
	}
}
?>