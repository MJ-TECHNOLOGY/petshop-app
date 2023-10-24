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
        $sql = "INSERT INTO venda (data_venda) VALUE (?)";

        $stmt = parent::getConnection()->prepare($sql);

        $stmt->bindValue(1, $model->data_venda);

        $stmt->execute();

        $model_retorno = new VendaModel();
        $model_retorno->id = parent::getConnection()->lastInserteId();
        return $model_retorno;
    }

    public function update(VendaModel $model)
    {
        $sql = "UPDATE venda SET data_venda = ? WHERE id = ?";

        $stmt = parent::getConnection()->prepare($sql);

        $stmt->bindValue(1, $model->data_venda);
        $stmt->bindValue(2, $model->id);

        $stmt->execute();
    }

    public function selete()
    {
        $sql = "SELECT DATE_FORMAT(v.data_venda, '%d/%m/%Y') as data_venda,
                v.id as id_venda,
                "
    }
}