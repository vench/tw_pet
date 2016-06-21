<?php

namespace app\dao;

use app\util\Connection;
use app\model\Page;
use app\ApplyAppableInterface;


/**
 * Description of PageDao
 *
 * @author vench
 */
class PageDao implements ApplyAppableInterface {
    
    /**
     * 
     * @param int $offset
     * @param int $limit
     * @return Page[]
     */
    public function query($offset = 0, $limit = 10) {
        $conn = $this->getConnection(); 
        $sql = 'SELECT * FROM pet__page '
                . 'LIMIT '. (int)$offset . ',' . (int)$limit; 
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        if(is_array($rows)) {
            $self = $this;
            return array_map(function($row) use(&$self){
                return $self->fillPage($row);
            }, $rows);  
        }         
        return [];
    }
    
    /**
     * 
     * @param int $pageId
     * @return Page
     */
    public function get($pageId) {
        $conn = $this->getConnection();
        $sql = 'SELECT * FROM pet__page WHERE pageId =:pageId';
        $stmt = $conn->prepare($sql);
        
        $stmt->execute([':pageId'=> $pageId]);
        $row = $stmt->fetch(\PDO::FETCH_ASSOC);
        if($row) {
            return $this->fillPage($row);  
        } 
        return null;
    }
    
    /**
     * 
     * @param Page $page
     * @return booelan
     */
    public function save(Page $page) {
        $conn = $this->getConnection();
        if(is_null($page->getPageId())) {
            $sql = 'INSERT INTO pet__page (`title`, `body`, `keywords`, `modified`) '
                    . 'VALUES (:title,:body,:keywords,:modified)';
            $stmt = $conn->prepare($sql); 
            return $stmt->execute([
                ':title' => $page->getTitle(),
                ':body' => $page->getBody(),
                ':keywords' => $page->getKeywords(),
                ':modified' => $page->getModified()->format('Y-m-d H:i:s'), 
                ]);
        }  
        $sql = 'UPDATE  pet__page SET `title`=:title, `body`=:body, '
                . '`keywords`=:keywords, `modified`=:modified WHERE pageId =:pageId';
        $stmt = $conn->prepare($sql);
        return $stmt->execute([
                ':title' => $page->getTitle(),
                ':body' => $page->getBody(),
                ':keywords' => $page->getKeywords(),
                ':modified' => $page->getModified()->format('Y-m-d H:i:s'), 
                ':pageId'   => $page->getPageId(),
                ]);
    }
    
    /**
     * 
     * @param Page $page
     * @return boolean
     */
    public function delete(Page $page) {
        $conn = $this->getConnection();
        $sql = 'DELETE FROM pet__page WHERE pageId =:pageId';
        $stmt = $conn->prepare($sql);
        return $stmt->execute([':pageId' => $page->getPageId()]);
    }

    /**
     * @return int Description
     */
    public function size() {
        $conn = $this->getConnection();
        $sql = 'SELECT COUNT(*) AS c FROM pet__page';
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
     * @return Page
     */
    private function fillPage(array $row) {
        $page = new Page();
        foreach ($row as $key => $value) {
            $method = 'set' . ucfirst($key);
            if(method_exists($page, $method)) {
               call_user_func_array([$page, $method], [$value]); 
            }
        }
        return $page;
    }

    /**
     * 
     * @param \app\AppContextInterface $app
     */
    public function appInit(\app\AppContextInterface $app) {
        
    }

}
