<?php
namespace App;

use App\State\Estado;
use App\State\Processando;
use App\ChainResponsability\Item;

class Orcamento
{
    private $valor;
    private $items;
    private $estado;

    public function __construct($valor)
    {
        $this->valor = $valor;
        $this->items = [];
        $this->estado = new Processando($this);
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

    public function getEstado()
    {
        return $this->estado->getName();
    }

    public function setEstado(Estado $newEstado)
    {
        $this->estado = $newEstado;
    }

    public function aprovar()
    {
        $this->estado->aprovar();
    }

    public function reprovar()
    {
        $this->estado->reprovar();
    }

    public function finalizar()
    {
        $this->estado->finalizar();
    }
}
