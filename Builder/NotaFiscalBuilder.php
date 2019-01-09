<?php
namespace App\Builder;

date_default_timezone_set('America/Sao_Paulo');

use DateTime;
use App\ChainResponsability\Item;
use App\Observer\AcaoAoGerarNota;

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
    private $acoesAoGerarNota;

    function __construct()
    {
        $this->itens = [];
        $this->valorBruto = 0;
        $this->impostos = 0;
        $this->observacoes = [];
        $this->dataDeEmissao = new DateTime($data);
        $this->acoesAoGerar = [];
    }

    public function paraEmpresa($empresa)
    {
        $this->empresa = $empresa;

        return $this;
    }

    public function comCnpj($cnpj)
    {
        $this->cnpj = $cnpj;

        return $this;
    }

    public function naData($data = null)
    {
        $this->dataDeEmissao = new DateTime($data);

        return $this;
    }

    public function addItem(Item $item)
    {
        $this->itens[] = $item;
        $this->valorBruto += $item->getValor();
        $this->impostos += number_format($item->getValor() * 0.05);

        return $this;
    }

    public function addObservacao($obs)
    {
        $this->observacoes[] = $obs;

        return $this;
    }

    public function addAcao(AcaoAoGerarNota $acao)
    {
        $this->acoesAoGerarNota[] = $acao;

        return $this;
    }

    public function build()
    {
        $notaFiscal =  new NotaFiscal(
            $this->empresa,
            $this->cnpj,
            $this->dataDeEmissao,
            $this->valorBruto,
            $this->impostos,
            $this->itens,
            $this->observacoes
        );

        foreach ($this->acoesAoGerarNota as $acao) {
            $acao->executa($notaFiscal);
        }

        return $notaFiscal;
    }
}
