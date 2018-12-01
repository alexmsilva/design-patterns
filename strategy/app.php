<?php
require 'Orcamento.php';
require 'CalculadoraImposto.php';
require 'Imposto.php';
require 'ICMS.php';
require 'ISS.php';
require 'IOF.php';
require 'ICCC.php';

$orcamento = new Orcamento(780);
$calculadora = new CalculadoraImposto();

print $calculadora->calcula($orcamento, new ICMS()) . PHP_EOL;
print $calculadora->calcula($orcamento, new ISS()) . PHP_EOL;
print $calculadora->calcula($orcamento, new IOF()) . PHP_EOL;

$orcamentoExercicio = new Orcamento(780);
print $calculadora->calcula($orcamentoExercicio, new ICCC()) . PHP_EOL;

$orcamentoExercicio = new Orcamento(1000);
print $calculadora->calcula($orcamentoExercicio, new ICCC()) . PHP_EOL;

$orcamentoExercicio = new Orcamento(1500);
print $calculadora->calcula($orcamentoExercicio, new ICCC()) . PHP_EOL;

$orcamentoExercicio = new Orcamento(10000);
print $calculadora->calcula($orcamentoExercicio, new ICCC()) . PHP_EOL;
?>