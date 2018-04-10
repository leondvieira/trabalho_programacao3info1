<?php

require_once 'DBConnection.php';
require_once 'Categoria.php';

class CategoriaCrud
{


    private $conexao;

    public function __construct()
    {
        $this->conexao = DBConnection::getConexao();
    }

    public function getCategoria(int $id)
    {

        $sql = 'select * from categoria where id_categoria=' . $id;
        $result = $this->conexao->query($sql);

        $categoria = $result->fetch(PDO::FETCH_ASSOC);


        $objetocat = new Categoria($categoria['id_categoria'], $categoria['nome_categoria'], $categoria['descricao_categoria']);
        return $objetocat;

    }


    public function getCategorias()
    {
        $sql = "SELECT * FROM categoria";

        $result = $this->conexao->query($sql);

        $categorias = $result->fetchAll(PDO::FETCH_ASSOC);

        foreach ($categorias as $categoria) {
            $id = $categoria['id_categoria'];
            $nome = $categoria['nome_categoria'];
            $descricao = $categoria['descricao_categoria'];

            $obj = new Categoria($id, $nome, $descricao);
            $listaCategoria[] = $obj;
        }
        return $listaCategoria;

    }

    public function insertCategoria(Categoria $cat)
    {

        $this->conexao = DBConnection::getConexao();

        $sql = "insert into categoria (nome_categoria, descricao_categoria) values ('" . $cat->getNome() . "',''" . $cat->getDescricao() . "')";

        try {

            $this->conexao->exec($sql);
        } catch (PDOException $e) {
            return $e->getMessage();
        }
    }


    public function upadateCategoria(Categoria $cat){

        $sql = "UPDATE categoria SET (nome_categoria = '".$cat->getNome()."', descricao_categoria = '".$cat->getDescricao()."') WHERE id_categoria =".$cat->getId();
        try{
            $this->conexao->exec($sql);

        }catch (PDOException $e){

            return $e->getMessage();
        }
    }

    public function deleteCategoria(int $id){
        $sql = "DELETE FROM categoria WHERE id_categoria=".$id;


        try{
            $this->conexao->exec($sql);

        }catch (PDOException $e){

            return $e;
        }
    }
}