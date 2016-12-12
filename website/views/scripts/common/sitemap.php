<style>
   .boldClass{
       font-weight : bold ;
   }
</style>

<?php //Category and Product Listing ?>

<div class="wrapper">
   <div class="content-container bg-Image faq">
       <?= $this->areablock('site-map') ?>
     <!-- <section class="introduction col7">
       <h1 class="introduction-heading"><img src="images/sitemap/10.0_title.png" alt="Explore DunkinAtHome.com"/></h1>

 </section> -->
       <section class="description col7">
           <ul id  ="site-map">
               <?php
               $newProductCategoryList = new Object\ProductCategory\Listing();
               $newProductList = new Object\Product\Listing();
               $newProductCategoryList->setOrderKey('order');


               echo '<li>';
               echo "<a href = '/dunkin-coffees' > COFFEES </a>";
               echo '</li>';

               foreach ($newProductCategoryList as $new) {
                   echo '<li>';
                   ?>
                   <a  style="margin-left:15px" class="leftClass" href = '/dunkin-coffees<?php echo '/' . $new->getUrlKeyword(); ?> '> <?php echo $new->getName(); ?></a>
                   <?php
                   $def = $new->getClass()->getFieldDefinition("allProducts");
                   $refKey = $def->getOwnerFieldName();
                   $refId = $def->getOwnerClassId();
                   $allProducts = $new->getRelationData($refKey, false, $refId);

                   echo '<ul>';
                   foreach ($allProducts as $all) {
                       $objectId = $all['id'];
                       $productObj = Object::getById($objectId);
                       $replacedOne = str_replace(' ', '-', $productObj->getName());
                       $finalreplacedOne = str_replace('\'', '', $replacedOne);
                       $getBold = $productObj->getProperty('isBold');
                       ?>
                       <li>
                           <a <?php if ($getBold) { ?> class='boldClass' <?php } ?> href="<?php echo '/dunkin-coffees/' . $new->getUrlKeyword(); ?><?php echo '/' . $productObj->getUrlKeyword(); ?> "> <?php if ($productObj->getName() == 'CHOCOLATE GLAZED DONUT') {
                   echo 'Bakery Series® ';
               } echo str_replace('\' ', '\'', ucwords(str_replace('\'', '\' ', strtolower($productObj->getName())))); ?> </a>
                       </li>
                       <?php
                   }echo '</ul>';
                   echo '</li>';
               }
               ?>

               <?php // Header Site-Map  ?>

               <?php $navStartNode = $this->document->getProperty("startNode"); ?>
               <?php $mainNavigation = $this->pimcoreNavigation()->getNavigation($this->document, $navStartNode); ?>

               <?php foreach ($mainNavigation as $page) { ?>

                   <?php
                   $currentUri = $_SERVER['REQUEST_URI'];
                   $currentPage = $page->getHref();
                   ?>
                   <?php // here need to manually check for ACL conditions  ?>

                   <?php if (!$page->isVisible() || !$this->navigation()->accept($page)) {
                       continue;
                   } ?>
                   <?php $hasChildren = $page->hasPages(); ?>
                   <?php // && $page->getDocumentType() == 'page'
                   if (!$hasChildren ) {
                       if ($page->getTitle() != 'dunkin-coffees') {
                           ?>
                           <a <?php if ($page->getTitle() !== 'Creamers') { ?> href = "/<?php echo strtolower(str_replace(' ', '-', $page->getTitle())) . '/';
           } ?> <?php if ($page->getTitle() == 'Creamers') { ?> class='openCreamer'<?php } ?>" />

                           <?php
                           echo "<li>";
                           echo $page->getTitle();

                           if ($page->getTitle() == 'promotion') {
                               echo '<ul>';
                               echo '<li>';
                               echo '<a href="/dunkin-coffees/seasonal-coffee"> Love \'Em Before They Leave </a>';
                               echo '</li>';
                               echo '</ul>';
                           }

                           echo '</li>';
                           echo '</a>';
                       }
                   }
                   ?>

               <?php } ?>

               <?php // Footer Site-Map ?>

               <?php $navStartNode1 = $this->document->getProperty("newFooterStart"); ?>
               <?php $mainNavigation1 = $this->pimcoreNavigation()->getNavigation($this->document, $navStartNode1); ?>

               <?php foreach ($mainNavigation1 as $page) { ?>

                   <?php
                   $currentUri = $_SERVER['REQUEST_URI'];
                   $currentPage = $page->getHref();
                   ?>
                   <?php // here need to manually check for ACL conditions ?>

                   <?php
                   $hasChildren = $page->hasPages();
                   $has
                   ?>

                       <?php
                       if (!$hasChildren && $page->getDocumentType() == 'link' & $page->getTitle() != 'Site Map') {
                           ?>
                       <a href = "/<?php echo strtolower(str_replace(' ', '-', $page->getTitle())); ?>/" >
       <?php echo '<li>' . $page->getTitle() . '</li>';
   }
   ?>
<?php } ?>


           </ul>
       </section>
       <br class="clear"/>
   </div>
</div>
