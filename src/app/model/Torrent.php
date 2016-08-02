<?php

namespace app\model;

/**
 * Description of Torrent
 *
 * @author vench
 */
class Torrent {

    /**
     *
     * @var int
     */
    private $torId;

    /**
     *
     * @var int
     */
    private $catId;

    /**
     *
     * @var string
     */
    private $title;

    /**
     *
     * @var string
     */
    private $name;

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
     * @var string
     */
    private $metadata;

    /**
     *
     * @var string
     */
    private $metakeys;

    /**
     *
     * @var string
     */
    private $content;

    /**
     *
     * @var string
     */
    private $contentShort;

    /**
     *
     * @return int
     */
    public function getTorId() {
        return $this->torId;
    }

    /**
     *
     * @param $torId int
     */
    public function setTorId($torId) {
        $this->torId = $torId;
    }

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
    public function getName() {
        return $this->name;
    }

    /**
     *
     * @param $name string
     */
    public function setName($name) {
        $this->name = $name;
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

    /**
     *
     * @return string
     */
    public function getMetadata() {
        return $this->metadata;
    }

    /**
     *
     * @param $metadata string
     */
    public function setMetadata($metadata) {
        $this->metadata = $metadata;
    }

    /**
     *
     * @return string
     */
    public function getMetakeys() {
        return $this->metakeys;
    }

    /**
     *
     * @param $metakeys string
     */
    public function setMetakeys($metakeys) {
        $this->metakeys = $metakeys;
    }

    /**
     *
     * @return string
     */
    public function getContent() {
        return $this->content;
    }

    /**
     *
     * @param $content string
     */
    public function setContent($content) {
        $this->content = $content;
    }

    /**
     *
     * @return string
     */
    public function getContentShort() {
        return $this->contentShort;
    }

    /**
     *
     * @param $contentShort string
     */
    public function setContentShort($contentShort) {
        $this->contentShort = $contentShort;
    }

}
