<?php
namespace Models;

use \Core\Model;

class Usuarios extends Model
{
    public function getAll()
    {
        $dados = array();
        $sql = "SELECT * FROM usuarios";
        $sql = $this->db->query($sql);
        if ($sql->rowCount() > 0) {
            $dados = $sql->fetchAll();
        }
        return $dados;
    }
}
