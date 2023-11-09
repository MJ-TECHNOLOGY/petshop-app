<?php

namespace App\Model;

use App\DAO\AnimalDAO;
use App\DAO\ClienteDAO;

class AnimalModel extends Model
{
    public $id, $nome_animal, $raca, $idade, $sexo, $cor, $observacao;

    public function save()
    {
        $dao = new AnimalDAO();
        
        if(empty($this->id))
        {
            $dao->insert($this);
        }
        else
            $dao->update($this);
        
    }

    public function getAllRows()
    {
        $dao = new AnimalDAO();

        $this->rows = $dao->select();
    }

    public function getById(int $id)
    {
        $dao = new AnimalDAO();

        $obj = $dao->selectById($id);

        return ($obj) ? $obj : new AnimalModel();
    }

    public function delete(int $id)
    {
        $dao = new AnimalDAO();

        $dao->delete($id);
    }
}