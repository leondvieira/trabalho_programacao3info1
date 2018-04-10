<?php

require '../app/models/Produto.php';

$p1 = new Produto();
$p1->setid(1);
$p1->setNome("roupa");
$p1->setDescricao("blabl");
$p1->setPreco(5.00);
$p1->setFoto("");
$p1->setIdcategoria("XL");

print_r($p1);
