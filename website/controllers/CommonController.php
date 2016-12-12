<?php

use Website\Controller\Action;

class CommonController extends Action
{
    public function indexAction()
    {
      $this->layout()->setLayout('layout');
    }

    public function sitemapAction()
{
  $this->layout()->setLayout('layout');

  $newProductCategoryList = new Object\ProductCategory\Listing();
  $newProductList = new Object\Product\Listing();
  $newProductCategoryList->setOrderKey('order');
  $this->view->newProductCategoryList = $newProductCategoryList;

}

    public function snippetAction()
    {
    //  $this->layout()->setLayout('layout');
    }

}
