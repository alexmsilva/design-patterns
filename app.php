<?php
namespace App;

spl_autoload_register(function ($className) {
    $path = explode('\\', $className);
    array_shift($path);
    require implode('/', $path) . ".php";
});

use App\Strategy\CalculadoraImposto;
use App\Strategy\ICMS;
use App\Strategy\ISS;
use App\Strategy\IOF;
use App\Strategy\ICCC;
use App\TemplateMethod\ICPP;
use App\Decorator\ImpostoEstadual;
use App\Decorator\ImpostoFederal;
use App\ChainResponsability\Item;
use App\ChainResponsability\CalculadoraDesconto;
use App\Builder\NotaFiscalBuilder;
use App\Observer\NotaFiscalDao;
use App\Observer\EnviarSMS;
use App\Observer\Impressora;


$orcamento = new Orcamento(6500);

echo PHP_EOL, "STATUS: ", $orcamento->getEstado(), PHP_EOL;
try {
    $orcamento->finalizar();
} catch (\Exception $e) {
    echo PHP_EOL,  "TENTA FINALIZAR: ", $e->getMessage(), PHP_EOL;    
}

$calculadoraImposto = new CalculadoraImposto();

echo PHP_EOL,  "IMPOSTOS", PHP_EOL;

echo "ICMS: ", $calculadoraImposto->calcula($orcamento, new ICMS()), PHP_EOL;
echo "ISS: ", $calculadoraImposto->calcula($orcamento, new ISS()), PHP_EOL;
echo "IOF: ", $calculadoraImposto->calcula($orcamento, new IOF()), PHP_EOL;
echo "ICCC: ", $calculadoraImposto->calcula($orcamento, new ICCC()), PHP_EOL;
echo "ICPP: ", $calculadoraImposto->calcula($orcamento, new ICPP()), PHP_EOL;

echo "ESTADUAL: ", $calculadoraImposto->calcula($orcamento, new IOF(new ICPP(new ImpostoEstadual()))), PHP_EOL;
echo "FEDERAL: ", $calculadoraImposto->calcula($orcamento, new ISS(new ICCC(new ImpostoFederal()))), PHP_EOL;

$orcamento->addItem(new Item("Tinta", 2300));
$orcamento->addItem(new Item("Tacos", 3000));
$orcamento->addItem(new Item("Cimento", 500));
$orcamento->addItem(new Item("Ferramentas", 1200));

$calculadoraDesconto = new CalculadoraDesconto();
echo PHP_EOL, "DESCONTO: ", $calculadoraDesconto->calcula($orcamento), PHP_EOL;

$orcamento->aprovar();
try {
    $orcamento->aprovar();
} catch (\Exception $e) {
    echo PHP_EOL,  "TENTA APROVAR NOVAMENTE: ", $e->getMessage(), PHP_EOL;    
}

echo PHP_EOL, "STATUS: ", $orcamento->getEstado(), PHP_EOL;

$orcamento->finalizar();
echo PHP_EOL, "STATUS: ", $orcamento->getEstado(), PHP_EOL;

$notaFiscalBuilder = new NotaFiscalBuilder();
$notaFiscal = $notaFiscalBuilder->paraEmpresa("88 Insurtech")->comCnpj("11.976.469/0001-87")
    ->addItem(new Item("Tinta", 2300))
    ->addItem(new Item("Tacos", 3000))
    ->addItem(new Item("Cimento", 500))
    ->addItem(new Item("Ferramentas", 1200))
    ->addObservacao("Alex é um bom programador!")
    ->addAcao(new NotaFiscalDao())
    ->addAcao(new EnviarSMS())
    ->addAcao(new Impressora())
    ->build();
