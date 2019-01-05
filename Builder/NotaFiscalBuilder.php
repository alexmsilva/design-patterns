<?php

date_default_timezone_set('America/Sao_Paulo');

/**
 * 
 */
class NotaFiscalBuilder
{
    private $empresa;
    private $cnpj;
    private $dataDeEmissao;
    private $valorBruto;
    private $impostos;
    private $itens;
    private $observacoes;

    function __construct()
    {
        $this->itens = [];
        $this->valorBruto = 0;
        $this->impostos = 0;
        $this->observacoes = [];
        $this->dataDeEmissao = new DateTime($data);
    }

    public function paraEmpresa($empresa)
    {
        $this->empresa = $empresa;
    }

    public function comCnpj($cnpj)
    {
        $this->cnpj = $cnpj;
    }

    public function naData($data = null)
    {
        $this->dataDeEmissao = new DateTime($data);
    }

    public function addItem(Item $item)
    {
        $this->itens[] = $item;
        $this->valorBruto += $item->getValor();
        $this->impostos += number_format($item->getValor() * 0.05);
    }

    public function addObservacao($obs)
    {
        $this->observacoes[] = $obs;
    }

    public function build()
    {
        return new NotaFiscal(
            $this->empresa,
            $this->cnpj,
            $this->dataDeEmissao,
            $this->valorBruto,
            $this->impostos,
            $this->itens,
            $this->observacoes
        );
    }
}
