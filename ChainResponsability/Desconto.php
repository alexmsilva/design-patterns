<?php
interface Desconto
{
	public function calcula(Orcamento $orcamento);
	public function setProximo(Desconto $desconto);
}
