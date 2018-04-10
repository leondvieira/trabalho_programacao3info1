<?php

	require '../app/models/Categoria.php';
	require '../app/models/CategoriaCrud.php';



    $nome = $_POST['nome'];
    $desc = $_POST['descricao'];



    $crud =  "atomotivo";
    $res = "Acessorios para veiculos";

    $cat = new Categoria(null, $nome, $desc);

    $crud = new CategoriaCrud();
    $res = $crud->insertCategoria($cat);