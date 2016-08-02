<?php

namespace app\dao;

use app\util\Connection;

/**
 * Description of CategoryDao
 *
 * @author vench
 */
class CategoryDao {

    /**
     * 
     * @param int $offset
     * @param int $limit
     * @return app\model\Category[]
     */
    public function query($offset = 0, $limit = 10) {
        $conn = $this->getConnection();
        $sql = 'SELECT * FROM tr_category '
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
     * @return app\model\Category
     */
    public function get($id) {
        $conn = $this->getConnection();
        $sql = 'SELECT * FROM tr_category WHERE catId =:catId';
        $stmt = $conn->prepare($sql);

        $stmt->execute([':catId' => $id]);
        $row = $stmt->fetch(\PDO::FETCH_ASSOC);
        if ($row) {
            return $this->fillModel($row);
        }
        return null;
    }

    /**
     * 
     * @param app\model\Category $model
     * @return booelan
     */
    public function save(app\model\Category $model) {
        $conn = $this->getConnection();
        if (is_null($model->getCatId())) {
            $sql = 'INSERT INTO tr_category (`parentCatId`,`title`,`image`,`url`) '
                    . 'VALUES (:parentCatId,:title,:image,:url)';
            $stmt = $conn->prepare($sql);
            return $stmt->execute([
                        ':parentCatId' => $model->getparentCatId(),
                        ':title' => $model->gettitle(),
                        ':image' => $model->getimage(),
                        ':url' => $model->geturl(),
            ]);
        }
        $sql = 'UPDATE  tr_category SET `parentCatId`=:parentCatId,`title`=:title,`image`=:image,`url`=:url WHERE catId =:catId';
        $stmt = $conn->prepare($sql);
        return $stmt->execute([
                    ':catId' => $model->getcatId(),
                    ':parentCatId' => $model->getparentCatId(),
                    ':title' => $model->gettitle(),
                    ':image' => $model->getimage(),
                    ':url' => $model->geturl(),
        ]);
    }

    /**
     * 
     * @param app\model\Category $model
     * @return boolean
     */
    public function delete(app\model\Category $model) {
        $conn = $this->getConnection();
        $sql = 'DELETE FROM tr_category WHERE catId =:catId';
        $stmt = $conn->prepare($sql);
        return $stmt->execute([':catId' => $model->getCatId()]);
    }

    /**
     * @return int Description
     */
    public function size() {
        $conn = $this->getConnection();
        $sql = 'SELECT COUNT(*) AS c FROM tr_category';
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
     * @return app\model\Category
     */
    private function fillModel(array $row) {
        $model = new \app\model\Category();
        foreach ($row as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($model, $method)) {
                call_user_func_array([$model, $method], [$value]);
            }
        }
        return $model;
    }

}
