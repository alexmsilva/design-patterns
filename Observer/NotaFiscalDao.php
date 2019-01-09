<?php
namespace App\Observer;

class NotaFiscalDao implements AcaoAoGerarNota
{
    public function executa($notaFiscal)
    {
        print PHP_EOL . "Nota fiscal salva com sucesso." . PHP_EOL;
    }
}
