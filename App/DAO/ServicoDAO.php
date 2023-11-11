<?php

namespace App\DAO;

use App\Model\ServicoModel;
use \PDO;

class ServicoDAO extends DAO
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert(ServicoModel $model)
    {
        $sql = "INSERT INTO servico (descricao, valor) VALUE (?, ?)";

        $stmt = parent::getConnection()->prepare($sql);

        $stmt->bindValue(1, $model->descricao);
        $stmt->bindValue(2, $model->valor);

        $stmt->execute();
    }

    public function update(ServicoModel $model)
    {
        $sql = "UPDATE servico SET descricao=?, valor=? WHERE id=?";

        $stmt = parent::getConnection()->prepare($sql);
        $stmt->bindValue(1, $model->descricao);
        $stmt->bindValue(2, $model->valor);
        $stmt->bindValue(3, $model->id);

        $stmt->execute();
    }

    public function select()
    {
        $sql = "SELECT * FROM servico";

        $stmt = parent::getConnection()->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function selectById(int $id)
    {
        $sql = "SELECT * FROM servico WHERE id = ?";

        $stmt = parent::getConnection()->prepare($sql);
        $stmt->bindValue(1, $id);

        $stmt->execute();

        return $stmt->fetchObject("App\Model\ServicoModel");
        
    }

    public function delete(int $id)
    {
        $sql = "DELETE FROM servico WHERE id = ?";

        $stmt = parent::getConnection()->prepare($sql);
        $stmt->bindValue(1, $id);

        $stmt->execute();
    }

}