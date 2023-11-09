<?php

namespace App\DAO;

use App\Model\ProdutoModel;
use \PDO;

class ProdutoDAO extends DAO
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert(ProdutoModel $model)
    {
        $sql = "INSERT INTO produto (descricao, marca, preco, peso, codigo, data_validade, id_categoria) VALUE (?, ?, ?, ?, ?, ?, ?)";

        $stmt = parent::getConnection()->prepare($sql);

        $stmt->bindValue(1, $model->descricao);
        $stmt->bindValue(2, $model->marca);
        $stmt->bindValue(3, $model->preco);
        $stmt->bindValue(4, $model->peso);
        $stmt->bindValue(5, $model->codigo);
        $stmt->bindValue(6, $model->data_validade);
        $stmt->bindValue(7, $model->id_categoria);

        $stmt->execute();
    }

    public function update(ProdutoModel $model)
    {
        $sql = "UPDATE produto SET descricao = ?, marca = ?, preco = ?, peso = ?, codigo = ?, data_validade = ?, id_categoria = ? WHERE id = ?";

        $stmt = parent::getConnection()->prepare($sql);

        $stmt->bindValue(1, $model->descricao);
        $stmt->bindValue(2, $model->marca);
        $stmt->bindValue(3, $model->preco);
        $stmt->bindValue(4, $model->peso);
        $stmt->bindValue(5, $model->codigo);
        $stmt->bindValue(6, $model->data_validade);
        $stmt->bindValue(7, $model->id_categoria);
        $stmt->bindValue(8, $model->id);

        $stmt->execute();
    }

    public function select()
    {
        $sql = "SELECT p.*, c.descricao AS categoria
                FROM produto p
                JOIN categoria c ON (c.id = p.id_categoria)";

        $stmt = parent::getConnection()->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function selectById(int $id)
    {
        $sql = "SELECT p.*, c.descricao AS categoria
                FROM produto p
                JOIN categoria c ON (c.id = p.id_categoria)";

        $stmt = parent::getConnection()->prepare($sql);
        $stmt->bindValue(1, $id);

        $stmt->execute();

        return $stmt->fetchObject("App\Model\ProdutoModel");
    }

    public function delete(int $id)
    {
        $sql = "DELETE FROM produto WHERE id = ?";

        $stmt = parent::getConnection()->prepare($sql);
        $stmt->bindValue(1, $id);
        
        $stmt->execute();
    }
}