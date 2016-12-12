<?php
$category=$this->categoryList;

?>

  <div class="wrapper">
  <div class="content-container mainProductBg main-product">

   <section class="introduction">
      <!--<h1 class="introduction-heading"><img src="images/products/global/title_coffees.png" /></h1>-->

      <svg style="width:85%">
       <text x="3" y="30"   class="introduction-heading"><?= $this->input("title",["width"=>"180"]);?></text>
      </svg>

      <?= $this->wysiwyg("desc");?>

      <a class="watch_commercial desktop-view" href="#">
  <img alt="Watch Now! Dunkin' Donuts Commercials" onMouseOut="this.src='/website/static/images/products/callouts/play_commercial.png';" onMouseOver="this.src='/website/static/images/products/callouts/play_commercial_over.png';" src="/website/static/images/products/callouts/play_commercial.png">
  </a>
   </section>

   <section class="description">
     <ul class="product">
      <?php foreach($category as $item){?>

       <li>
         <a href="<?= 'dunkin-coffees/'.$item->getUrlKeyword();?>">

            <?php
              list($width, $height) = getimagesize("website/var/assets".$item->getMainImage());
              if($width>190 || $height>247){   ?><img class="product-image" alt="Roasted Coffees" src="<?= $item->getMainImage()->getThumbnail('catImage');?>"/>
              <?php  } else{ ?>  <img class="product-image" alt="Roasted Coffees" src="<?= $item->getMainImage();?>"/><?php } ?>

              <span class="product-button"><?= $item->getName();?></span>
         </a>
       </li>
<?php }?>
     </ul>
   </section>


  </div>
  </div>
