<?php
 

namespace app\controller;

use app\ApplyAppableInterface;
use app\AppContextInterface; 
use app\util\View;

/**
 * Description of TorrentController
 *
 * @author vench
 */
class TorrentController implements ApplyAppableInterface  {
 
    /**
     *
     * @var \app\dao\CategoryDao
     */
    private $daoCat;

    /**
     *
     * @var \app\Request
     */
    private $request;

    /**
     * 
     */
    public function actionIndex() { 
        $categories = $this->daoCat->all();
        View::renderPhp('torrent/index', [
            'categories'  => $categories,
        ]); 
    }

    /**
     * 
     * @param app\AppContextInterface $app
     */
    public function appInit(AppContextInterface $app) {
        $this->daoCat = $app->get('app\dao\CategoryDao');
        $this->request = $app->get('app\Request');
    }

}
