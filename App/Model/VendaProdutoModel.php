<?php

namespace App\Model;

use App\DAO\ClienteDAO;
use App\DAO\ProdutoDAO;
use App\DAO\VendaProdutoDAO;

class VendaProdutoModel extends Model
{
    public $id, $data_venda, $quantidade, $valor_total, $id_produto, $id_cliente;
    public $lista_produto, $lista_cliente, $produto, $cliente;

    public function save()
    {
        $dao = new VendaProdutoDAO();

        if(empty($this->id))
            $dao->insert($this);
        else
            $dao->update($this);
    }

    public function getAllRows()
    {
        $dao = new VendaProdutoDAO();

        $this->rows = $dao->select();
    }

    public function getAll()
    {
        $dao = new VendaProdutoDAO();

        return $dao->select();
    }

    public function getById(int $id)
    {
        $dao = new VendaProdutoDAO();

        $obj = $dao->selectById($id);

        return ($obj) ? $obj : new VendaModel();
    }

    public function getAllCliente()
    {
        $dao = new ClienteDAO();

        $this->lista_cliente = $dao->select();
    }

    public function getAllProduto()
    {
        $dao = new ProdutoDAO();

        $this->lista_produto = $dao->select();
    }

    public function delete(int $id)
    {
        $dao = new VendaProdutoDAO();

        $dao->delete($id);
    }
}