<?php
require "Orcamento.php";
require "ChainResponsability/Desconto.php";
require "ChainResponsability/CalculadoraDesconto.php";
require "ChainResponsability/Item.php";
require "Strategy/CalculadoraImposto.php";
require "Strategy/Imposto.php";
require "Decorator/ImpostoDecorator.php";
require "Decorator/ImpostoEstadual.php";
require "Decorator/ImpostoFederal.php";
require "TemplateMethod/TemplateImpostoCondicional.php";
require "TemplateMethod/ICPP.php";
require "Strategy/ICMS.php";
require "Strategy/ISS.php";
require "Strategy/IOF.php";
require "Strategy/ICCC.php";

$orcamento = new Orcamento(6500);

echo PHP_EOL, "STATUS: ", $orcamento->getEstado(), PHP_EOL;
try {
    $orcamento->finalizar();
} catch (Exception $e) {
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
} catch (Exception $e) {
    echo PHP_EOL,  "TENTA APROVAR NOVAMENTE: ", $e->getMessage(), PHP_EOL;    
}

echo PHP_EOL, "STATUS: ", $orcamento->getEstado(), PHP_EOL;

$orcamento->finalizar();
echo PHP_EOL, "STATUS: ", $orcamento->getEstado(), PHP_EOL;
