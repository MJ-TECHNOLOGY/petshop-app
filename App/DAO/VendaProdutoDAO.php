<?php

namespace App\DAO;

use App\Model\VendaProdutoModel;
use \PDO;

class VendaProdutoDAO extends DAO
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert(VendaProdutoModel $model)
    {
        $sql = "INSERT INTO venda_produto (data_venda, quantidade, valor_total, id_produto, id_cliente) VALUE (?, ?, ?, ?, ?)";

        $stmt = parent::getConnection()->prepare($sql);

        $stmt->bindValue(1, $model->data_venda);
        $stmt->bindValue(2, $model->quantidade);
        $stmt->bindValue(3, $model->valor_total);
        $stmt->bindValue(4, $model->id_produto);
        $stmt->bindValue(5, $model->id_cliente);

        $stmt->execute();
    }

    public function update(VendaProdutoModel $model)
    {
        $sql = "UPDATE venda_produto SET data_venda = ?, quantidade = ?, valor_total = ?, id_produto = ?, id_cliente = ? WHERE id = ?";

        $stmt = parent::getConnection()->prepare($sql);

        $stmt->bindValue(1, $model->data_venda);
        $stmt->bindValue(2, $model->quantidade);
        $stmt->bindValue(3, $model->valor_total);
        $stmt->bindValue(4, $model->id_produto);
        $stmt->bindValue(5, $model->id_cliente);
        $stmt->bindValue(6, $model->id);

        $stmt->execute();
    }

    public function select()
    {
        $sql = "SELECT v.*, c.nome AS nome_cliente,
                p.descricao AS descricao,
                p.preco AS preco
                FROM venda_produto v
                JOIN cliente c ON (c.id = v.id_cliente)
                JOIN produto p ON (p.id = v.id_produto)";

        $stmt = parent::getConnection()->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function selectById(int $id)
    {
        $sql = "SELECT v.*, c.nome AS nome_cliente,
                p.descricao AS produto,
                p.preco AS preco
                FROM venda_produto v
                JOIN cliente c ON (c.id = v.id_cliente)
                JOIN produto p ON (p.id = v.id_produto)
                WHERE v.id=?";

        $stmt = parent::getConnection()->prepare($sql);
        $stmt->bindValue(1, $id);

        $stmt->execute();

        return $stmt->fetchObject("App\Model\VendaProdutoModel");
    }

    public function delete(int $id)
    {
        $sql = "DELETE FROM venda_produto WHERE id = ?";

        $stmt = parent::getConnection()->prepare($sql);
        $stmt->bindValue(1, $id);
        
        $stmt->execute();
    }
}