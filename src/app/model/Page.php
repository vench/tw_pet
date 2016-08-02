<?php


namespace app\model;

/**
 * Description of Page
 *
 * @author vench
 */
class Page {
    
    /**
     *
     * @var int
     */
    private $pageId;
    
    /**
     *
     * @var string
     */
    private $title;
    
    /**
     *
     * @var string 
     */
    private $body;
    
    /**
     *
     * @var string 
     */
    private $keywords;
    
    /**
     *
     * @var \DateTime
     */
    private $modified;
    
    /**
     * 
     */
    public function __construct() {
        $this->modified = new \DateTime();
    }
    
    /**
     * 
     * @return type
     */
    public function getPageId() {
        return $this->pageId;
    }

    /**
     * 
     * @return type
     */
    public function getTitle() {
        return $this->title;
    }

    public function getBody() {
        return $this->body;
    }

    public function getKeywords() {
        return $this->keywords;
    }

    public function getModified() {
        return $this->modified;
    }

    public function setPageId($pageId) {
        $this->pageId = $pageId;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function setBody($body) {
        $this->body = $body;
    }

    public function setKeywords($keywords) {
        $this->keywords = $keywords;
    }

    public function setModified($modified) {
        if(is_string($modified)) {
            $this->modified = new \DateTime($modified);
        } else {
           $this->modified = $modified; 
        }
        
    } 
    
}
