<?php
require "Strategy/Orcamento.php";
require "ChainResponsability/Desconto.php";
require "ChainResponsability/CalculadoraDesconto.php";
require "ChainResponsability/Item.php";
require "Strategy/CalculadoraImposto.php";
require "Strategy/Imposto.php";
require "Strategy/ICMS.php";
require "Strategy/ISS.php";
require "Strategy/IOF.php";
require "Strategy/ICCC.php";

$orcamento = new Orcamento(6500);
$calculadoraImposto = new CalculadoraImposto();

print "IMPOSTOS" . PHP_EOL;

echo "ICMS: ", $calculadoraImposto->calcula($orcamento, new ICMS()), PHP_EOL;
echo "ISS: ", $calculadoraImposto->calcula($orcamento, new ISS()), PHP_EOL;
echo "IOF: ", $calculadoraImposto->calcula($orcamento, new IOF()), PHP_EOL;
echo "ICCC: ", $calculadoraImposto->calcula($orcamento, new ICCC()), PHP_EOL;


$orcamento->addItem(new Item("Tinta", 2300));
$orcamento->addItem(new Item("Tacos", 3000));
$orcamento->addItem(new Item("Cimento", 500));
$orcamento->addItem(new Item("Ferramentas", 1200));

$calculadoraDesconto = new CalculadoraDesconto();
echo PHP_EOL, "DESCONTO: ", $calculadoraDesconto->calcula($orcamento), PHP_EOL;

?>