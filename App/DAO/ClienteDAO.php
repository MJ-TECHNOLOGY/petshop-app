<?php

namespace App\DAO;

use App\Model\ClienteModel;
use \PDO;

class ClienteDAO extends DAO
{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert(ClienteModel $model)
    {
        $sql = "INSERT INTO cliente (nome, cpf, email, data_nascimento, telefone, logradouro, numero, bairro, cidade, cep, ponto_referencia) VALUE (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,)";

        $stmt = parent::getConnection()->prepare($sql);

        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->cpf);
        $stmt->bindValue(3, $model->email);
        $stmt->bindValue(4, $model->data_nascimento);
        $stmt->bindValue(5, $model->telefone);
        $stmt->bindValue(6, $model->logradouro);
        $stmt->bindValue(7, $model->numero);
        $stmt->bindValue(8, $model->bairro);
        $stmt->bindValue(9, $model->cidade);
        $stmt->bindValue(10, $model->cep);
        $stmt->bindValue(11, $model->ponto_referencia);

        $stmt->execute();
    }

    public function update(ClienteModel $model)
    {
        $sql = "UPDATE cliente SET nome=?, cpf=?, email=?, data_nascimento=?, telefone=?, logradouro=?, numero=?, bairro=?, cidade=?, cep=?, ponto_referencia=? WHERE id=?";

        $stmt = parent::getConnection()->prepare($sql);
        $stmt->bindValue(1, $model->nome);
        $stmt->bindValue(2, $model->cpf);
        $stmt->bindValue(3, $model->email);
        $stmt->bindValue(4, $model->data_nascimento);
        $stmt->bindValue(5, $model->telefone);
        $stmt->bindValue(6, $model->logradouro);
        $stmt->bindValue(7, $model->numero);
        $stmt->bindValue(8, $model->bairro);
        $stmt->bindValue(9, $model->cidade);
        $stmt->bindValue(10, $model->cep);
        $stmt->bindValue(11, $model->ponto_referencia);
        $stmt->bindValue(12, $model->id);

        $stmt->execute();
    }

    public function select()
    {
        $sql = "SELECT * FROM cliente";

        $stmt = parent::getConnection()->prepare($sql);

        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_CLASS);
    }

    public function selectById(int $id)
    {
        $sql = "SELECT * FROM cliente WHERE id = ?";

        $stmt = parent::getConnection()->prepare($sql);
        $stmt->bindValue(1, $id);

        $stmt->execute();

        return $stmt->fetchObject("App\Model\ClienteModel");
        
    }

    public function delete(int $id)
    {
        $sql = "DELETE FROM cliente WHERE id = ?";

        $stmt = parent::getConnection()->prepare($sql);
        $stmt->bindValue(1, $id);

        $stmt->execute();
    }

}