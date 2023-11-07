<?php

namespace App\DAO;

use App\Model\AnimalModel;
use \PDO;

class AnimalDAO extends DAO
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert(AnimalModel $model)
    {
        $sql = "INSERT INTO animal (nome_animal, raca, idade, sexo, cor, observacao, id_cliente) VALUE (?, ?, ?, ?, ?, ?, ?)";

        $stmt = parent::getConnection()->prepare($sql);

        $stmt->bindValue(1, $model->nome_animal);
        $stmt->bindValue(2, $model->raca);
        $stmt->bindValue(3, $model->idade);
        $stmt->bindValue(4, $model->sexo);
        $stmt->bindValue(5, $model->cor);
        $stmt->bindValue(6, $model->observacao);
        $stmt->bindValue(7, $model->id_cliente);

        $stmt->execute();
    }

    public function update(AnimalModel $model)
    {
        $sql = "UPDATE animal SET nome_animal=?, raca=?, idade=?, sexo=?, cor=?, observacao=?, id_cliente=? WHERE id=?";

        $stmt = parent::getConnection()->prepare($sql);
        $stmt->bindValue(1, $model->nome_animal);
        $stmt->bindValue(2, $model->raca);
        $stmt->bindValue(3, $model->idade);
        $stmt->bindValue(4, $model->sexo);
        $stmt->bindValue(5, $model->cor);
        $stmt->bindValue(6, $model->observacao);
        $stmt->bindValue(7, $model->id_cliente);
        $stmt->bindValue(8, $model->id);

        $stmt->execute();
    }

    public function select()
    {
        $sql = "SELECT a.*, c.nome AS nome_cliente
                FROM animal a
                JOIN cliente c ON (c.id = a.id_cliente)";

        $stmt = parent::getConnection()->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function selectById(int $id)
    {
        $sql = "SELECT a.*, c.nome AS nome_cliente
                FROM animal a
                JOIN cliente c ON (c.id = a.id_cliente)
                WHERE a.id=?";

        $stmt = parent::getConnection()->prepare($sql);
        $stmt->bindValue(1, $id);

        $stmt->execute();

        return $stmt->fetchObject("App\Model\AnimalModel");
        
    }

    public function delete(int $id)
    {
        $sql = "DELETE FROM animal WHERE id = ?";

        $stmt = parent::getConnection()->prepare($sql);
        $stmt->bindValue(1, $id);

        $stmt->execute();
    }

}