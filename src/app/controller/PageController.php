<?php

namespace app\controller;

use app\dao\PageDao;
use app\util\View;
use app\model\Page;
use app\ApplyAppableInterface;
use app\AppContextInterface; 
use app\Form;
use app\Request;

/**
 * Description of HomeController
 *
 * @author vench
 */
class PageController implements ApplyAppableInterface {
    
    /**
     *
     * @var PageDao 
     */
    private $dao;
    
    /**
     *
     * @var Request
     */
    private $request; 


    /**
     * 
     * @param int $p
     */
    public function actionIndex($p = 0) { 
        $limit = 5;
        View::renderPhp('list', [
            'list'  => $this->dao->query( $p, $limit ),
            'size'  => $this->dao->size(),
            'limit' => $limit,
            'page'  => $p,
        ]); 
    }
    
 
    /**
     * 
     */
    public function actionAdd() {
        $page = new Page();
        $form = new Form($page);
        $form->bind($this->request);
        if($this->request->isPost() && $form->validate()) {
            $this->dao->save($page);
            $this->request->redirect('page/index');
        }
        
        View::renderPhp('add', [
            'page' => $page,
            'form' => $form,
        ]); 
    }
    
    /**
     * 
     * @param type $id
     */
    public function actionDelete($id) {
        $page = $this->getPage($id);
        $this->dao->delete($page);
        $this->request->redirect('page/index');
    }
    
    /**
     * 
     * @param type $id
     */
    public function actionEdit($id) {
        $page = $this->getPage($id); 
        $form = new Form($page);
        $form->bind($this->request);
        if($this->request->isPost() && $form->validate()) {
            $page->setModified(new \DateTime());
            $this->dao->save($page);
            $this->request->redirect('page/index');
        }
        
        View::renderPhp('edit', [
            'page' => $page,
            'form' => $form,
        ]); 
    }
    
    /**
     * 
     * @param type $id
     */
    public function actionView($id) {
        $page = $this->getPage($id);
        View::renderPhp('view', [
            'page' => $page, 
        ]); 
    }
    
    /**
     * 
     * @param type $id
     * @return Page
     * @throws \Exception
     */
    public function getPage($id) {
        $page = $this->dao->get($id);
        if(is_null($page)) {
            throw new \Exception("404 not found page");
        }
        return $page;
    }

    /**
     * 
     * @param app\AppContextInterface $app
     */
    public function appInit(AppContextInterface $app) {
        $this->dao = $app->get('app\dao\PageDao');
        $this->request = $app->get('app\Request');
    }

}
