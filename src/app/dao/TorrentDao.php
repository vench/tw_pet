<?php

namespace app\dao;

use app\util\Connection;

/**
 * Description of TorrentDao
 *
 * @author vench
 */
class TorrentDao {

    /**
     * 
     * @param int $offset
     * @param int $limit
     * @return app\model\Torrent[]
     */
    public function query($offset = 0, $limit = 10) {
        $conn = $this->getConnection();
        $sql = 'SELECT * FROM tr_torrent '
                . 'LIMIT ' . (int) $offset . ',' . (int) $limit;
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        if (is_array($rows)) {
            $self = $this;
            return array_map(function($row) use(&$self) {
                return $self->fillModel($row);
            }, $rows);
        }
        return [];
    }

    /**
     * 
     * @param int $id
     * @return app\model\Torrent
     */
    public function get($id) {
        $conn = $this->getConnection();
        $sql = 'SELECT * FROM tr_torrent WHERE torId =:torId';
        $stmt = $conn->prepare($sql);

        $stmt->execute([':torId' => $id]);
        $row = $stmt->fetch(\PDO::FETCH_ASSOC);
        if ($row) {
            return $this->fillModel($row);
        }
        return null;
    }

    /**
     * 
     * @param app\model\Torrent $model
     * @return booelan
     */
    public function save(app\model\Torrent $model) {
        $conn = $this->getConnection();
        if (is_null($model->getTorId())) {
            $sql = 'INSERT INTO tr_torrent (`catId`,`title`,`name`,`image`,`url`,`metadata`,`metakeys`,`content`,`contentShort`) '
                    . 'VALUES (:catId,:title,:name,:image,:url,:metadata,:metakeys,:content,:contentShort)';
            $stmt = $conn->prepare($sql);
            return $stmt->execute([
                        ':catId' => $model->getcatId(),
                        ':title' => $model->gettitle(),
                        ':name' => $model->getname(),
                        ':image' => $model->getimage(),
                        ':url' => $model->geturl(),
                        ':metadata' => $model->getmetadata(),
                        ':metakeys' => $model->getmetakeys(),
                        ':content' => $model->getcontent(),
                        ':contentShort' => $model->getcontentShort(),
            ]);
        }
        $sql = 'UPDATE  tr_torrent SET `catId`=:catId,`title`=:title,`name`=:name,`image`=:image,`url`=:url,`metadata`=:metadata,`metakeys`=:metakeys,`content`=:content,`contentShort`=:contentShort WHERE torId =:torId';
        $stmt = $conn->prepare($sql);
        return $stmt->execute([
                    ':torId' => $model->gettorId(),
                    ':catId' => $model->getcatId(),
                    ':title' => $model->gettitle(),
                    ':name' => $model->getname(),
                    ':image' => $model->getimage(),
                    ':url' => $model->geturl(),
                    ':metadata' => $model->getmetadata(),
                    ':metakeys' => $model->getmetakeys(),
                    ':content' => $model->getcontent(),
                    ':contentShort' => $model->getcontentShort(),
        ]);
    }

    /**
     * 
     * @param app\model\Torrent $model
     * @return boolean
     */
    public function delete(app\model\Torrent $model) {
        $conn = $this->getConnection();
        $sql = 'DELETE FROM tr_torrent WHERE torId =:torId';
        $stmt = $conn->prepare($sql);
        return $stmt->execute([':torId' => $model->getTorId()]);
    }

    /**
     * @return int Description
     */
    public function size() {
        $conn = $this->getConnection();
        $sql = 'SELECT COUNT(*) AS c FROM tr_torrent';
        $stmt = $conn->prepare($sql);

        $stmt->execute();
        $row = $stmt->fetch(\PDO::FETCH_ASSOC);
        return isset($row['c']) ? $row['c'] : 0;
    }

    /**
     * 
     * @return \PDO
     */
    public function getConnection() {
        return Connection::getConn();
    }

    /**
     * 
     * @param array $row
     * @return app\model\Torrent
     */
    private function fillModel(array $row) {
        $model = new \app\model\Torrent();
        foreach ($row as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($model, $method)) {
                call_user_func_array([$model, $method], [$value]);
            }
        }
        return $model;
    }

}
