<?php
class EnviarSMS implements AcaoAoGerarNota
{
    public function executa($notaFiscal)
    {
        print PHP_EOL . "SMS enviado para o usuário." . PHP_EOL;
    }
}
