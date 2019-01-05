<?php
/**
 *
 */
class NotaFiscal
{
    private $empresa;
    private $cnpj;
    private $dataDeEmissao;
    private $valorBruto;
    private $impostos;
    private $itens;
    private $observacoes;

    function __construct($empresa, $cnpj, $dataDeEmissao, $valorBruto, $impostos, $itens, $observacoes)
    {
        $this->empresa = $empresa;
        $this->cnpj = $cnpj;
        $this->dataDeEmissao = $dataDeEmissao;
        $this->valorBruto = $valorBruto;
        $this->impostos = $impostos;
        $this->itens = $itens;
        $this->observacoes = $observacoes;
    }

    public function imprimir() {
        var_dump($this);
    }

    public function getDataDeEmissao() {
        return $this->dataDeEmissao->format("Y-m-d H:i:s");
    }

    public function getObservacoes() {
        return implode(PHP_EOL, $this->observacoes);
    }

    /* add anothers getters and setters here */
}
