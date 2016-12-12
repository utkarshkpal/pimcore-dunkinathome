<?php
$selectedProductObject = $this->selectedProductObject;
$selectedProductCategoryObject = $this->selectedProductCategoryObject;
//var_dump($selectedProductObject);

//var_dump($selectedProductCategoryObject);
if(!$selectedProductObject->getBackgroundImage())
  {
    if($selectedProductCategoryObject->getId()==9)
    {
        $backgroundImage = $selectedProductCategoryObject->getBackgroundImage()->getThumbnail('kcupBackgroundimage');

    }
    else {
      $backgroundImage = $selectedProductCategoryObject->getBackgroundImage();
    }

  }
  else
  {

    if($selectedProductCategoryObject->getId()==9)
    {
        $backgroundImage = $selectedProductObject->getBackgroundImage()->getThumbnail('kcupBackgroundimage');
    }
    else {
      $backgroundImage = $selectedProductObject->getBackgroundImage();
    }
  }

 ?>
 <style>
 .dynamicBg {
 	background: url('<?= $backgroundImage?>') no-repeat, -moz-linear-gradient(top, #ffffff 0%, #e7dedf 100%);
 	background: url('<?= $backgroundImage?>') no-repeat, -webkit-gradient(linear, 0% 0%, 0% 100%, from(#ffffff), to(#e7dedf));
 	background: url('<?= $backgroundImage?>') no-repeat, -webkit-linear-gradient(top, #ffffff 0%, #e7dedf 100%);
 	background: url('<?= $backgroundImage?>') no-repeat, -o-linear-gradient(top, #ffffff 0%, #e7dedf 100%);
 	background: url('<?= $backgroundImage?>') no-repeat, -ms-linear-gradient(top, #ffffff 0%, #e7dedf 100%);
 	background: url('<?= $backgroundImage?>') no-repeat, linear-gradient(top, #ffffff 0%, #e7dedf 100%);
 }
 </style>

<!-- //////////////////////////////////  Document start  ////////////////////////////////// -->
<div class="wrapper">
<div class="content-container productBg productDetail dynamicBg">
<!-- //////////////////////////////////  Dispaly catagory name on the top of page open  ////////////////////////////////// -->
 <section class="introduction">
         <?php if($selectedProductCategoryObject->getId()!= '7') {?>
    <h1 class="introduction-heading"  style="font-size:32px"><?= htmlspecialchars_decode($selectedProductCategoryObject->getName()) ;?></h1>
    <?php }
    else { ?>
      <h1 class="introduction-heading"  style="font-size:32px"><?= ' '?></h1>
      <?php } ?>
    <a class="btnback desktop-view" href="<?= '/dunkin-coffees/'.$selectedProductCategoryObject->getUrlKeyword();?>"></a>

 </section>
<!-- //////////////////////////////////  Dispaly catagory name on the top of page closed  ////////////////////////////////// -->

 <section class="description">

<!-- //////////////////////////////////  Display detail image open  ////////////////////////////////// -->
   <span class="img-placeholder desktop-view">
     <?php if($selectedProductCategoryObject->getId()== '9'){?>
    <img src="<?php echo $selectedProductObject->getDetailImage()->getThumbnail('kcupDetailImage');?>">
  <?php  }else {?>
    <img src="<?php echo $selectedProductObject->getDetailImage()->getThumbnail('detailImage');;?>" >
    <?php } ?>
   </span>
<!-- //////////////////////////////////  Display detail image closed  ////////////////////////////////// -->

   <div class="col9 product-detail-description nav-right">
     <?php if($selectedProductCategoryObject->getId()== '5' || $selectedProductCategoryObject->getId()== '8') {?>
     <h2 class="col5">DUNKIN' DONUTS<sup>®</sup> <?= $selectedProductObject->getName()?></h2>
   <?php }
   else if($selectedProductCategoryObject->getId()== '9')  {
     if($selectedProductObject->getId()== '35'){
      ?>
      <h2 class="col5"><?= $selectedProductObject->getName()?> K-CUP<sup>®</sup> PODS</h2>
      <?php } else {?>
       <h2 class="col5">DUNKIN' DONUTS<sup>®</sup> <?= $selectedProductObject->getName()?> K-CUP<sup>®</sup> PODS</h2>
       <?php } }
       else {?>
          <h2 class="col5"><?= $selectedProductObject->getName()?></h2>
        <?php }?>
<!-- //////////////////////////////////  Display sibling image list open  ////////////////////////////////// -->
     <span class="product-image col7" style="margin-right:20px">
       <?php
        $allProductsOfCategory = $this->allProductsOfCategory;
      //  var_dump($allProductsOfCategory);

// experimenting with ordering ------------------------------------------
        $sortedProductArray = array();
        foreach($allProductsOfCategory as $product)
        {
          $sortedProductArray[] = object::getById($product['id']);
        }
        aasort($sortedProductArray);
        function aasort (&$array) {

          $totalCount = count($array);
          for($k=0;$k<$totalCount;$k++)
          {
            for($i=0;$i<$totalCount-1;$i++)
            {
              $j = $i+1;

              if($array[$i]->getOrder() > $array[$j]->getOrder())
              {
                $temp = $array[$i];
                $array[$i] = $array[$j];
                $array[$j] = $temp;
              }
            }
          }


        }


//var_dump($sortedProductArray);

// experimenting   with ordering----------------------------------------
       foreach($sortedProductArray as $product)
       {

      //   $id = $product['id'];
         if($selectedProductObject->getId()!=$product->getId())
         {
      //   $object = Object::getById($id);

       ?>
          <a href="<?= $product->getUrlKeyword();?>" style="text-decoration:none">
          <img alt="French Roast" src="<?php echo $product->getMainImage()->getThumbnail('productSmallImage'); ?>">
          </a>


        <?php }} ?>

     </span>
<!-- //////////////////////////////////  Display sibling image list closed  ////////////////////////////////// -->
     <span style="margin-top:140px;display:block">
     <?= $selectedProductObject->getDescription();?>
   </span>
   </div>




 <div class="coffee-store-finder">
    <h3>Find a Store</h3>
    <div>
    	<input type="text"  onblur="restoreDefault(this);" onFocus="clearDefault(this);" class="zip" maxlength="5" value="Enter ZIP">
    	<input type="button" alt="Search" src="/website/static/images/products/buttons/button_search.png" class="search">
</div>
</div>
 </section>


</div>

</div>
<!-------- Container ------>
<!-- Bazaar Voice Reviews - Description (Start) -->
    <div style="padding-top:25px">
    	<div id="BVRRContainer">&nbsp;</div>
        <script type="text/javascript">
        	$BV.ui('rr', 'show_reviews', {
            	doShowContent: function () {
                	// If the container is hidden (such as behind a tab), put code here to make it visible
                    //(open the tab).
                }
            });
        </script>
    </div>
<!-- //////////////////////////////////////////////////////////////////////////// -->
