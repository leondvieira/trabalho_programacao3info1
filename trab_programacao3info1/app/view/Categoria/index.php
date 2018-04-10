
<!doctype html>
<html lang="pt-br">

<body>

    <table>
        <?php foreach ($categorias as $categoria):?>

        <tr>
            <td><?= $categoria->getNome()?></td>
            <td><?= $categoria->getDescricao()?></td>

            <td><a href="editar-produto.php?action=editar&id_categoria=<?=$categoria->getId();?>
            &nome_categoria=<?=$categoria->getNome();?>
            &descricao_categoria=<?=$categoria->getDescricao();?>">Editar</a> | <a href="categoria.php?action=excluir&id_categoria=<?=$categoria->getId();?>">Excluir</a></td>
        </tr>
        <?php endforeach ?>


    </table>

</body>
</html>