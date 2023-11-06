<?php

namespace App\Model;

use App\DAO\ClienteDAO;
use App\DAO\AnimalDAO;
use App\DAO\VendaDAO;

class VendaModel extends Model
{
    public $id, $agendamento, $id_cliente, $id_animal;
    public $lista_cliente, $lista_animal, $cliente, $animal;

    public function save()
    {
        $dao = new VendaDAO();

        if(empty($this->id))
            $dao->insert($this);
        else
            $dao->update($this);
    }

    public function getAllRows()
    {
        $dao = new VendaDAO();

        $this->rows = $dao->select();
    }

    public function getAll()
    {
        $dao = new VendaDAO();

        return $dao->select();
    }

    public function getById(int $id)
    {
        $dao = new VendaDAO();

        $obj = $dao->selectById($id);

        return ($obj) ? $obj : new VendaModel();
    }

    public function getAllCliente()
    {
        $dao = new ClienteDAO();

        $this->lista_cliente = $dao->select();
    }

    public function getAllAnimal()
    {
        $dao = new AnimalDAO();

        $this->lista_animal = $dao->select();
    }

    public function delete(int $id)
    {
        $dao = new VendaDAO();

        $dao->delete($id);
    }
}