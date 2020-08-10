<?php
namespace Models;

use \Core\Model;

class Photos extends Model {

    public function getFeedCollection($ids, $offset, $per_page)
    {
        $array = array();
        if(count($ids) > 0) {
            $sql = "SELECT * 
                    FROM photo 
                    WHERE id_user IN (".implode(',', $ids).") 
                    ORDER BY id DESC 
                    LIMIT ".$offset.", ".$per_page;
            $sql = $this->db->query($sql);
            if($sql->rowCount() > 0) {
                $array = $sql->fetchAll(\PDO::FETCH_ASSOC);
            }
        }
        return $array;
    }

    public function getPhotosCount($id_user)
    {
        $sql = "SELECT COUNT(*) as c FROM photo WHERE id_user = :id";
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id', $id_user);
        $sql->execute();
        $info = $sql->fetch();
        return $info['c'];
    }

    public function deleteAll($id_user)
    {
        $sql = 'DELETE FROM photo WHERE id_user = :id_user';
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id_user', $id_user);
        $sql->execute();

        $sql = 'DELETE FROM photos_comments WHERE id_user = :id_user';
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id_user', $id_user);
        $sql->execute();

        $sql = 'DELETE FROM photos_likes WHERE id_user = :id_user';
        $sql = $this->db->prepare($sql);
        $sql->bindValue(':id_user', $id_user);
        $sql->execute();
    }


}