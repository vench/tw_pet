<?php

namespace app\model;

/**
 * Description of Category
 *
 * @author vench
 */
class Category {

    /**
     *
     * @var int
     */
    private $catId;

    /**
     *
     * @var int
     */
    private $parentCatId;

    /**
     *
     * @var string
     */
    private $title;

    /**
     *
     * @var string
     */
    private $image;

    /**
     *
     * @var string
     */
    private $url;

    /**
     *
     * @return int
     */
    public function getCatId() {
        return $this->catId;
    }

    /**
     *
     * @param $catId int
     */
    public function setCatId($catId) {
        $this->catId = $catId;
    }

    /**
     *
     * @return int
     */
    public function getParentCatId() {
        return $this->parentCatId;
    }

    /**
     *
     * @param $parentCatId int
     */
    public function setParentCatId($parentCatId) {
        $this->parentCatId = $parentCatId;
    }

    /**
     *
     * @return string
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     *
     * @param $title string
     */
    public function setTitle($title) {
        $this->title = $title;
    }

    /**
     *
     * @return string
     */
    public function getImage() {
        return $this->image;
    }

    /**
     *
     * @param $image string
     */
    public function setImage($image) {
        $this->image = $image;
    }

    /**
     *
     * @return string
     */
    public function getUrl() {
        return $this->url;
    }

    /**
     *
     * @param $url string
     */
    public function setUrl($url) {
        $this->url = $url;
    }

}
