<?php

namespace App\DAO;

use App\Model\VendaModel;
use \PDO;

class VendaDAO extends DAO
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert(VendaModel $model)
    {
        $sql = "INSERT INTO venda (data_venda, agendamento, id_cliente, id_animal) VALUE (?, ?, ?, ?)";

        $stmt = parent::getConnection()->prepare($sql);

        $stmt->bindValue(1, $model->data_venda);
        $stmt->bindValue(2, $model->agendamento);
        $stmt->bindValue(3, $model->id_cliente);
        $stmt->bindValue(4, $model->id_animal);

        $stmt->execute();

        $model_retorno = new VendaModel();
        $model_retorno->id = parent::getConnection()->lastInserteId();
        return $model_retorno;
    }

    public function update(VendaModel $model)
    {
        $sql = "UPDATE venda SET data_venda = ?, agendamento = ?, id_cliente = ?, id_animal = ? WHERE id = ?";

        $stmt = parent::getConnection()->prepare($sql);

        $stmt->bindValue(1, $model->data_venda);
        $stmt->bindValue(2, $model->agendamento);
        $stmt->bindValue(3, $model->id_cliente);
        $stmt->bindValue(4, $model->id_animal);
        $stmt->bindValue(5, $model->id);

        $stmt->execute();
    }

    public function select()
    {
        $sql = "SELECT v.*, c.nome AS nome_cliente,
                a.nome_animal AS nome_animal
                FROM venda v
                JOIN cliente c ON (c.id = v.id_cliente),
                JOIN animal a ON (a.id = v.id_animal)";

        $stmt = parent::getConnection()->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function selectById(int $id)
    {
        $sql = "SELECT v.*, c.nome AS nome_cliente,
                a.nome_animal AS nome_animal
                FROM venda v
                JOIN cliente c ON (c.id = v.id_cliente),
                JOIN animal a ON (a.id = v.id_animal)
                WHERE v.id=?";

        $stmt = parent::getConnection()->prepare($sql);
        $stmt->bindValue(1, $id);

        $stmt->execute();

        return $stmt->fetchObject("App\Model\VendaModel");
    }

    public function delete(int $id)
    {
        $sql = "DELETE FROM venda WHERE id = ?";

        $stmt = parent::getConnection()->prepare($sql);
        $stmt->bindValue(1, $id);
        
        $stmt->execute();
    }
}