<?php
$catBg = $this->selectedProductCategoryObject->getBackgroundImage();

if($this->selectedProductCategoryObject->getName()!='SEASONAL')
{
  $catBg = $catBg->getThumbnail("backImage");
}

?>
<style>
  .dynamicBg {
    background: url('<?= $catBg ?>') no-repeat, -moz-linear-gradient(top, #ffffff 0%, #e7dedf 100%);
    background: url('<?= $catBg ?>') no-repeat, -webkit-gradient(linear, 0% 0%, 0% 100%, from(#ffffff), to(#e7dedf));
    background: url('<?= $catBg ?>') no-repeat, -webkit-linear-gradient(top, #ffffff 0%, #e7dedf 100%);
    background: url('<?= $catBg ?>') no-repeat, -o-linear-gradient(top, #ffffff 0%, #e7dedf 100%);
    background: url('<?= $catBg ?>') no-repeat, -ms-linear-gradient(top, #ffffff 0%, #e7dedf 100%);
    background: url('<?= $catBg ?>') no-repeat, linear-gradient(top, #ffffff 0%, #e7dedf 100%);
  }
  .product-description-text strong {
  }
  .seasonal-main .product-description-text {
    backImage;
    width: 60%;
    margin: 0 auto 10px;
    padding-top: 15px;
  }
  .seasonal-main {
    min-height: 400px;
    padding-bottom: 0;
  }
  .product-description-text {
    width: 52%;
    margin: 0 auto 20px;
    padding-top: 30px;
    color: #e35b0f;
    font-size: 16px;
    text-align: center;
  }
  .seasonal-main .product-description-text strong {
    font-family: Neutra,MavenProBold;
    font-size: 21px;
    font-weight: normal;
    text-transform: uppercase;
  }
  .seasonal-main.productBg .product-description-text p {
    color: #e35b0f;
    font-size: 13px;
    font-weight: bold;
    margin-top: -20px;
  }
</style>
<?php
$categoryId = $this->selectedProductCategoryObject->getId();
$catName    = $this->selectedProductCategoryObject->getName();
$catDesc = $this->selectedProductCategoryObject->getDescription();
$all     = $this->allProducts;

 $newArray = array();
 foreach($all as $a)
 {
 $str = $a['id'];
 $prodObj1 = Object\Product::getById($str);
 array_push($newArray,$prodObj1);
 }

   for ($c = 1 ; $c <= count($newArray) - 1; $c++) {
     $d = $c;

     while ($d > 0 && $newArray[$d]->getOrder() < $newArray[$d-1]->getOrder()) {
       $t          = $newArray[$d];
       $newArray[$d]   = $newArray[$d-1];
       $newArray[$d-1] = $t;

       $d--;
     }
   }



?>
<div class="wrapper">
  <?php
if ($catName == 'SEASONAL') {
?>
  <div class="content-container productBg dynamicBg seasonal-main">
    <?php
} else {
?>
    <div class="content-container productBg dynamicBg ">
      <?php
}
?>
      <section class="introduction">
        <?php
if ($catName == 'BAKERY SERIES&reg;' || $catName == 'SEASONAL') {
} else if ($catName == 'K-Cup Pods') {
?>
        <h2 class="introduction-heading" style="font-size: 32px;" >

          <?= $catName; ?>
        </h2>
        <?php
} else {
?>
        <h1 class="introduction-heading" style="font-size:32px">
          <?= $catName; ?>
        </h1>
        <?php
}
?>
        <span>
          <?php
echo $catDesc;
?>
        </span>
        <a class="btnback desktop-view" href="/dunkin-coffees">
        </a>
      </section>
      <section class="description">
        <ul class="product">
          <?php
              foreach ($newArray as $new) {

          ?>
          <li>
            <a href="<?= $this->selectedProductCategoryObject->getUrlKeyword().'/'.$new->getUrlKeyword();?>">
              <?php if($this->selectedProductCategoryObject->getName()!='K-Cup Pods')
              {?>
            <img class ="product-image" <?php if ($catName == 'SEASONAL') { ?>style="margin-top:-9px; height:257px; width:128px;" <?php } ?>  src= "<?php echo $new->getMainImage()->getThumbnail("mainImage");?>"/>
<?php } else {   ?>

            <img class ="product-image" src= "<?php echo $new->getMainImage(); ?>"/>

<?php } ?>

            <!-- <span class="bv-rating-stars"> <span aria-hidden="true">  ★★★★★  </span>(0)    </span> -->
            <span class="product-button" style="height:60px;">
              <?php
echo $new->getName();
?>
            </span>
          </a>
          </li>
          <?php
}
?>
        </ul>
      </section>
    </div>
  </div>
