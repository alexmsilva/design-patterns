<?php
class Impressora implements AcaoAoGerarNota
{
    public function executa($notaFiscal)
    {
        print PHP_EOL;
        var_dump($notaFiscal) . PHP_EOL;
    }
}
