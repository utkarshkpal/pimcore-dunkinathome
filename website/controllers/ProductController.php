<?php
use Website\Controller\Action;

class ProductController extends Action
{
    public function indexAction()
    {
        $this->layout()->setLayout("layout");
    }

    public function categorylistingAction()
    {
        $this->layout()->setLayout("layout");
        $categoryList             = new Object\ProductCategory\Listing();
        $sortedCategory=$categoryList->setOrderKey('order');
        $this->view->categoryList = $sortedCategory;
    }

    public function productlistingAction()
    {
      $this->layout()->setLayout("layout");

      $doc = $this->getParam('doc');
      $cat = $this->getParam('cat');

      if($doc!=='dunkin-coffees')
      {
        $this->_redirect('/site-map');
      }

      $selectedProductCategoryUrl = $cat;


              $productCategoryList = new Object\ProductCategory\Listing();

              $selectedProductCategoryObject = '';
              $categoryFound = false;

              foreach ($productCategoryList as $productCategory) {
                  if ($productCategory->getUrlKeyword() == $selectedProductCategoryUrl) {
                      $selectedProductCategoryObject = $productCategory;
                      $categoryFound = true;
                  }
              }

              if($categoryFound==false)
              {
                $this->_redirect('/site-map');
              }


              $this->view->selectedProductCategoryObject = $selectedProductCategoryObject;



              $def                     = $selectedProductCategoryObject->getClass()->getFieldDefinition("allProducts");
              $refKey                  = $def->getOwnerFieldName();
              $refId                   = $def->getOwnerClassId();
              $allProducts             = $selectedProductCategoryObject->getRelationData($refKey, false, $refId);



              $this->view->allProducts = $allProducts;
    }

    public function productdetailAction()
    {
        $this->layout()->setLayout("layout");

        $doc = $this->getParam('doc');
        $cat = $this->getParam('cat');
        $product = $this->getParam('product');

        if($doc!=='dunkin-coffees')
        {
          $this->_redirect('/site-map');
        }

        $selectedProductCategoryUrl = $cat;
        $selectedProductUrl = $product;

        $productCategoryList = new Object\ProductCategory\Listing();
    //    echo 'all categories';
    //    var_dump($productCategoryList);

        $selectedProductCategoryObject = '';
        $categoryFound = false;

        foreach($productCategoryList as $productCategory)
        {
          if($productCategory->getUrlKeyword() == $selectedProductCategoryUrl)
          {
            $selectedProductCategoryObject = $productCategory;
            $categoryFound = true;
          }
        }

        if($categoryFound==false)
        {
          $this->_redirect('/site-map');
        }

        //var_dump($selectedProductCategoryObject->getId());

        $this->view->selectedProductCategoryObject = $selectedProductCategoryObject;



        $def = $selectedProductCategoryObject->getClass()->getFieldDefinition("allProducts");
        $refKey = $def->getOwnerFieldName();
        $refId = $def->getOwnerClassId();
        $allProducts = $selectedProductCategoryObject->getRelationData($refKey,false,$refId);
        $this->view->allProductsOfCategory = $allProducts;
      //  var_dump($nonOwnerRelations);
      $selectedProductObject = '';

  $productFound = false;

      foreach($allProducts as $product)
      {
        $id = $product['id'];
        $object = Object::getById($id);

        if($object->getUrlKeyword() == $selectedProductUrl)
        {
          $selectedProductObject = $object;
            $productFound = true;
        }
      }

      if(!$productFound)
      {
        // $this->redirector('sitemapAction', 'CommonController');
        $this->_redirect('/site-map');
      }


      $this->view->selectedProductObject = $selectedProductObject;

    //  echo "SElected product:".$selectedProductId;
    if ($selectedProductCategoryUrl == 'seasonal-coffee') {

            $this->renderScript('product/seasonalproductdetail.php');

    }


    }


}

?>
