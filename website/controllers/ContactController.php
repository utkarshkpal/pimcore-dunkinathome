<?php

use Website\Controller\Action;

class ContactController extends Action
{
  public function indexAction() {
     session_start();
     $this->layout()->setLayout('layout');
     $categoryList = new Object\ProductCategory\Listing();
     $sortedCategory = $categoryList->setOrderKey('order');
     $ProductCategory = array();

     foreach ($categoryList as $key) {

         array_push($ProductCategory, $key->getId());
     }

     $this->view->ProductCategory = $ProductCategory;

//   ----------------------------- Form Submit Open  ------------------------------------

     if ($this->getRequest()->isPost()) {
         $this->view->form = $_POST;
         //print_r($formdata);
         $formdata = $this->getRequest()->getPOST();
         print_r($_POST);
         if (isset($formdata['submit'])) {
             $this->view->validated = true;
             $monthArr = array('JAN', 'FAB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC',);
             $contactObjectsList = new Object\Contact\Listing();
             $contactObjectsCount = count($contactObjectsList);
             $i = $contactObjectsCount + 1;
             $contactObject = new \Object\Contact();

//// ------------------- Creating Folder for year and month open -----------------------------------
             $yearExist = false;
             $monthExist = false;
             $year = \Pimcore\File::getValidFilename(date('Y'));
             $month = \Pimcore\File::getValidFilename(date('F'));

             if (!$formdata['ddlCategories']) {
                 $objectForYear = Object::getByPath('/contact-us/general-questions/');
                 $objectForMonth = Object::getByPath('/contact-us/general-questions/' . $year);
             } else {
                 $objectForYear = Object::getByPath('/contact-us/product-questions/');
                 $objectForMonth = Object::getByPath('/contact-us/product-questions/' . $year);
             }

//////////////////////////////////  creating year directory open  ///////////////////////////////////////
             $yearArray = $objectForYear->getChilds(array('folder'));
             if (count($yearArray) != 0) {
                 foreach ($yearArray as $yearFolderObject) {
                     if ($yearFolderObject->getKey() == $year) {
                         $yearExist = true;
                     //    echo "year exists";
                     }
                 }

                 if ($yearExist == false) {
                 //    echo "year does not exist";
                     $folder = new \Pimcore\Model\Object\Folder();
                     $folder->setKey($year);
                     $folder->setParentId($objectForYear->getId());
                     $folder->save();
                 }
             } else {
                 //echo "not any year exist";
                 $folder = new \Pimcore\Model\Object\Folder();
                 $folder->setKey($year);
                 $folder->setParentId($objectForYear->getId());
                 $folder->save();
             }
//////////////////////////////////  creating year directory closed  ///////////////////////////////////////
//////////////////////////////////  creating month directory open  ///////////////////////////////////////
             $monthArray = $objectForMonth->getChilds(array('folder'));

             if (count($monthArray) != 0) {
                 foreach ($monthArray as $monthFolderObject) {
                     if ($monthFolderObject->getKey() == $month) {
                         $monthExist = true;
                     //    echo "month exists";
                     }
                 }

                 if ($monthExist == false) {
                 //    echo "month does not exist";
                     $folder = new \Pimcore\Model\Object\Folder();
                     $folder->setKey($month);
                     $folder->setParentId($objectForMonth->getId());
                     $folder->save();
                 }
             } else {
                 //echo "not any month exist";
                 $folder = new \Pimcore\Model\Object\Folder();
                 $folder->setKey($month);
                 $folder->setParentId($objectForMonth->getId());
                 $folder->save();
             }

//////////////////////////////////  creating month directory closed  ///////////////////////////////////////
//// ------------------- Creating Folder for year and month closed -----------------------------------

             if ($formdata['txtFirstName'] && trim($formdata['txtFirstName']) != false && isset($formdata['txtLastName']) && trim($formdata['txtLastName']) != false) {
                 $contactObject->setFirstName($formdata['txtFirstName']);
                 $contactObject->setLastName($formdata['txtLastName']);

                 $contactObject->setKey(\Pimcore\File::getValidFilename($i . '-' . $formdata['txtFirstName'] . '-' . $formdata['txtLastName']));
                 if (!$formdata['ddlCategories']) {
                     $contactObject->setParentId(Object::getByPath('/contact-us/general-questions/' . $year . '/' . $month)->getId());
                     $contactObject->setProductCategory('NA');
                     $contactObject->setProduct('NA');
                     $contactObject->setUpc('NA');
                 //    echo "in general";
                 } else {
                     $contactObject->setParentId(Object::getByPath('/contact-us/product-questions/' . $year . '/' . $month)->getId());
                     if (trim($formdata['ddlCategories']) != false && trim($formdata['ddlProductProduct']) != false) {
                         $contactObject->setProductCategory(Object::getById($formdata['ddlCategories'])->getName());
                         $contactObject->setProduct(Object::getById($formdata['ddlProductProduct'])->getName());
                         $contactObject->setUpc($formdata['txtUPC']);
                     } else {
                         $this->view->validated = false;
                         $_SESSION['errorMsz'] = true;
                         $this->_redirect('/contact-us');
                     }
                 }
             } else {
                 $this->view->validated = false;
                 $_SESSION['errorMsz'] = true;
                 $this->_redirect('/contact-us');
             }


             if (isset($formdata['ProductFeedback']) && trim($formdata['ProductFeedback']) != false) {
                 $contactObject->setTypeOfFeedback($formdata['ProductFeedback']);
             } else {
                 $this->view->validated = false;
                 //   $sessionObject = new Zend_Session_Namespace('error');
                 //   $sessionObject->errorMsz = true ;
                 $_SESSION['errorMsz'] = true;
                 $this->_redirect('/contact-us');
             }

             if (isset($formdata['ddlProductTopic']) && trim($formdata['ddlProductTopic']) != false) {
                 $contactObject->setWroteAbout($formdata['ddlProductTopic']);
             } else {
                 $this->view->validated = false;
                 $_SESSION['errorMsz'] = true;
                 $this->_redirect('/contact-us');
             }

             if (isset($formdata['ProductFeel']) && trim($formdata['ProductFeel']) != false) {
                 $contactObject->setFeeling($formdata['ProductFeel']);
             } else {
                 $this->view->validated = false;
                 $_SESSION['errorMsz'] = true;
                 $this->_redirect('/contact-us');
             }

             if (isset($formdata['txtDetails']) && trim($formdata['txtDetails']) != false) {
                 $contactObject->setComments($formdata['txtDetails']);
             } else {
                 $this->view->validated = false;
                 $_SESSION['errorMsz'] = true;
                 $this->_redirect('/contact-us');
             }



             if (isset($formdata['txtEmailAddress']) && trim($formdata['txtEmailAddress']) != false && preg_match('/^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{1,4}\b$/i', $formdata['txtEmailAddress'])) {
                 $contactObject->setEmail($formdata['txtEmailAddress']);
             } else {
                 $this->view->validated = false;
                 $_SESSION['errorMsz'] = true;
                 $this->_redirect('/contact-us');
             }

             if (isset($formdata['txtPhone']) && trim($formdata['txtPhone']) != false && preg_match('/^\(?[\d\s]{3}-[\d\s]{3}-[\d\s]{4}$/', $formdata['txtPhone'])) {
                 $contactObject->setPhone($formdata['txtPhone']);
             } else {
                 $this->view->validated = false;
                 $_SESSION['errorMsz'] = true;
                 $this->_redirect('/contact-us');
             }

             if (isset($formdata['birthMonth']) && trim($formdata['birthMonth']) != false) {
                 $contactObject->setmonth($monthArr[$formdata['birthMonth'] - 1]);
             } else {
                 $this->view->validated = false;
                 $_SESSION['errorMsz'] = true;
                 $this->_redirect('/contact-us');
             }

             if (isset($formdata['birthYear']) && trim($formdata['birthYear']) != false) {
                 $contactObject->setYear($formdata['birthYear']);
             } else {
                 $this->view->validated = false;
                 $_SESSION['errorMsz'] = true;
                 $this->_redirect('/contact-us');
             }

             // insert address -----------------------------------------------

             $address = $formdata['txtAddress1'] . "\n" . $formdata['txtAddress2'];
             // insert address ----------------------------------------------

             if (isset($address) && trim($address) != false) {
                 $contactObject->setAddress($address);
             } else {
                 $this->view->validated = false;
                 $_SESSION['errorMsz'] = true;
                 $this->_redirect('/contact-us');
             }

             if (isset($formdata['txtCity']) && trim($formdata['txtCity']) != false) {
                 $contactObject->setCity($formdata['txtCity']);
             } else {
                 $this->view->validated = false;
                 $_SESSION['errorMsz'] = true;
                 $this->_redirect('/contact-us');
             }

             if (isset($formdata['ddlState']) && trim($formdata['ddlState']) != false) {
                 $contactObject->setState($formdata['ddlState']);
             } else {
                 $this->view->validated = false;
                 $_SESSION['errorMsz'] = true;
                 $this->_redirect('/contact-us');
             }


             if (isset($formdata['txtZip']) && trim($formdata['txtZip']) != false && preg_match('/^\d{5}(?:-\d{4})?$/', $formdata['txtZip'])) {
                 $contactObject->setZip($formdata['txtZip']);
             } else {
                 $this->view->validated = false;
                 $_SESSION['errorMsz'] = true;
                 $this->_redirect('/contact-us');
             }

             if ($this->view->validated == true) {

                 $contactObject->setPublished(true);
                 $contactObject->save();
                 $this->_redirect('/contact-us/thank-you');
             } else {
                 $_SESSION['errorMsz'] = true;
                 $this->_redirect('/contact-us');
             }
         }
     }

//   ----------------------------- Form Submit Closed  ------------------------------------
 }

  public function productReturnAction()
  {

    echo $_POST['categoryId'];
   if(isset($_POST["categoryId"]))
    {
          $productCategoryID =$_POST["categoryId"];
          $new = Object\ProductCategory::getById($productCategoryID);




            $def                     = $new->getClass()->getFieldDefinition("allProducts");
            $refKey                  = $def->getOwnerFieldName();
            $refId                   = $def->getOwnerClassId();
            $allProducts             = $new->getRelationData($refKey, false, $refId);

      echo  "<option value=''>-SELECT-</option>";

            foreach($allProducts as $all) {

            $objectId=$all['id'];

            $productObj=Object::getById($objectId);

            $productName = strtoupper($productObj->getName());

       echo "<option value= '" . $productObj->getId() . "'> " . $productName . "</option>";

          // echo $productObj->getName();

            }

        }
      die();
  }

  public function checkageAction(){

      $birthMonth =$_POST["birthMonth"];
      $birthYear =$_POST["birthYear"];

              $year = date("Y") - $birthYear;
              $month = (date("m")+1) - $birthMonth;

              if ($month < 0) {
                  $year--;
              } elseif ($month == 0 ) {
                  $year--;
              }

              if ($year >= 13) {
                     echo "success";
              } else {
                  echo " ";
              }

       die();

  }

}
