<?php
class Orcamento
{
    private $valor;
    private $items;

    public function __construct($valor)
    {
        $this->valor = $valor;
        $this->items = [];
    }

    public function addItem(Item $novoItem)
    {
    	$this->items[] = $novoItem;
    }

    public function getItems()
    {
    	return $this->items;
    }

    public function getValor()
    {
        return $this->valor;
    }
}
?>