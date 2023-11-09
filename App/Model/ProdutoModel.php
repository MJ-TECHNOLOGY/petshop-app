<?php

namespace App\Model;

use App\DAO\CategoriaDAO;
use App\DAO\ProdutoDAO;

class ProdutoModel extends Model
{
    public $id, $descricao, $marca, $preco, $peso, $codigo, $data_validade, $id_categoria;
    public $lista_categoria, $categoria;

    public function save()
    {
        $dao = new ProdutoDAO();

        if(empty($this->id))
            $dao->insert($this);
        else
            $dao->update($this);
    }

    public function getAllRows()
    {
        $dao = new ProdutoDAO();

        $this->rows = $dao->select();
    }

    public function getAll()
    {
        $dao = new ProdutoDAO();

        return $dao->select();
    }

    public function getById(int $id)
    {
        $dao = new ProdutoDAO();

        $obj = $dao->selectById($id);

        return ($obj) ? $obj : new VendaModel();
    }

    public function getAllCategoria()
    {
        $dao = new CategoriaDAO();

        $this->lista_categoria = $dao->select();
    }

    public function delete(int $id)
    {
        $dao = new ProdutoDAO();

        $dao->delete($id);
    }
}