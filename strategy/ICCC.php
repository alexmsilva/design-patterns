<?php
/**
 * Retorna 5% do valor do orçamento, caso seja menor que 1000
 * Retorna 7% do valor do orçamento, caso seja maior ou igual 1000 e menor ou igual 3000
 * Retorna 8% do valor do orçamento + 30, caso o valor seja acima de 3000
 */
class ICCC implements Imposto
{
    public function calcula(Orcamento $orcamento)
    {
        if ($orcamento->getValor() < 1000) {
        	return number_format($orcamento->getValor() * 0.05, 2);
        }

        if ($orcamento->getValor() > 3000) {
        	return number_format($orcamento->getValor() * 0.08 + 30, 2);
        }

        return number_format($orcamento->getValor() * 0.07, 2);
    }
}
?>