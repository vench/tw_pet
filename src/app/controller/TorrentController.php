<?php
 

namespace app\controller;

use app\ApplyAppableInterface;
use app\AppContextInterface; 

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
        $data = $this->daoCat->query();
        var_dump($data);
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
