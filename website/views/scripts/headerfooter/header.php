<!DOCTYPE html>
<html>
<head>
  <?php
    $this->headLink()->appendStylesheet('/website/static/css/styles.min.css');
    $this->headLink()->appendStylesheet('/website/static/css/css.css');
    echo $this->headLink();
    ?>

</head>


<body>
<?php
$navStartNode = $this->document->getProperty("startNode");

?>

<div id="container">
  <div id="header">
    <div id="site-logo"> <a href="<?= $navStartNode ?>" class=" desktop-view"> <img src="/website/static/images/header/nav_logo.jpg" title=""/> </a> <a href="index.html" class="mobile-view logo"> <img width="137" height="65"  alt="" src="images/responsive/logo_large.png" title=""/> </a> </div>
    <nav  class="navigation close">
      <button id="top-nav-btn" class="mobile-view"></button>
   <div class="scroll-container">
      <div id="top-subnav">
        <ul>
          <li class="logo-view mobile-view home"><a href="index.html">Home</a></li>
          <li class="site-search"> <span class="search desktop-view" data-pass-through="false">Search</span>
            <div class="site-search-input  desktop-view">
              <div class="border-left"></div>
             <div class="border-bottom">
                <input id="txtKeywords" name="txtKeywords" placeholder="Search by product or keyword" maxlength="150" />
                <a class="search-link" data-pass-through="true" href="#" style="display:inline-block;width:94px;" > <img src="/website/static/images/header/button_search_over.png" alt="Search" /> </a> </div>
            </div>
            <aside class="mobile-view search">
              <input id="txtKeywords" type="text" placeholder="Search by Keyword" maxlength="150">
              <input id="btnSearch" type="button">
            </aside>
          </li>
          <li class="first store-finder"> <a class=" desktop-view" href="#">Store Finder</a>
            <aside class="mobile-view"> <a class="find_a_store_nav" href="#">Find in grocery</a>
              <div >
                <p class="find-store-form">
                  <select class="locator_dropdown" id="ucFindStore_ddlProducts" name="ctl00$ucFindStore$ddlProducts">
                    <option value="">Please select</option>
                    <option value="8133400298">Original Blend K-Cup&reg; Pods</option>
                    <option value="8133400299">Dunkin Decaf&reg; K-Cup&reg; Pods</option>
                    <option value="8133400301">Hazelnut K-Cup&reg; Pods</option>
                    <option value="8133400300" selected="selected">French Vanilla K-Cup&reg; Pods</option>
                    <option value="8133400302">Chocolate Glazed Donut K-Cup&reg; Pods</option>
                    <option value="8133400046">Original Blend</option>
                    <option value="8133400048">Dunkin Decaf&reg;</option>
                    <option value="8133400076">Dunkin Dark&reg;</option>
                    <option value="8133400136">Dunkin Turbo&reg;</option>
                    <option value="8133400279">Colombian</option>
                    <option value="8133400280">French Roast</option>
                    <option value="8133400147">Pumpkin Spice</option>
                    <option value="8133400655">White Chocolate Peppermint</option>
                    <option value="8133400248">Blueberry Muffin</option>
                    <option value="8133400249">Caramel Coffee Cake</option>
                    <option value="8133400250">Chocolate Glazed Donut</option>
                    <option value="8133400254">Old Fashioned Donut</option>
                    <option value="8133400276">Cinnamon Coffee Roll</option>
                    <option value="8133400654">Vanilla Cupcake</option>
                   <option value="8133400047">French Vanilla</option>
                    <option value="8133400049">Hazelnut</option>
                  </select>
                </p>
                <p>
                  <input type="tel" placeholder="ZIP" class="set_zip_box" id="ucFindStore_txtZIP" maxlength="5" name="ctl00$ucFindStore$txtZIP">
                  <input type="image"  src="images/responsive/header/navigation_btn_search.png" text="Search &gt;" class="find_store_submit_button">
                </p>
              </div>
            </aside>
          </li>
          <li class="sign-up"><a class="" href="#">Sign Up</a></li>
        </ul>
      </div>
      <div id="top-nav">
        <ul>
          <!-- <li class="first coffees"><a class="Coffees" onclick="" href="dunkin-coffees.html">Coffees</a></li>
          <li class="creamers external-link desktop-view"><a class="openCreamer">Creamers</a></li>
          <li class="how-to-brew"><a class="How To Brew " data-reveal-id="" onclick="" href="how-to-brew-coffee.html">How To Brew</a></li>
          <li class="about-us"><a class="About Us " data-reveal-id="" onclick="" href="about-us.html">About Us</a></li>
          <li class="promotions"><a class="Promotions " data-reveal-id="" onclick="" href="coffee-samples-promotions.html">Promotions</a></li>
          <li class="commercial mobile-view"><a class="Promotions " data-reveal-id="" onclick="" href="commercials.html">Commercial</a></li> -->


                  <?php $mainNavigation = $this->pimcoreNavigation()->getNavigation($this->document, $navStartNode); ?>

        <?php foreach ($mainNavigation as $page) { ?>

              <?php
                $currentUri = $_SERVER['REQUEST_URI'];
                $currentPage = $page->getHref();
                //echo $currentPage;
                $acitveClass = '';
                 if (strpos($currentUri, $currentPage) !== false) {
                   $acitveClass = 'active';
                }
              ?>
            <?php // here need to manually check for ACL conditions ?>

            <?php  if (!$page->isVisible() || !$this->navigation()->accept($page)) { continue; } ?>
            <?php $hasChildren = $page->hasPages(); ?>
            <?php if (!$hasChildren ) { ?>
              <?php $label = $page->getLabel(); ?>
              <?php

                switch($label)
                {

                  case 'dunkin-coffees': echo '<li class="first coffees"><a class="Coffees '.$acitveClass.'" onclick="" href="'.$page->getHref().'">Coffees</a></li>';
                                       break;
                  case 'Creamers': echo '<li class="creamers external-link desktop-view"><a class="openCreamer  '.$acitveClass.'">Creamers</a></li>';
                                      break;

                  case 'About Us' : echo '<li class="about-us"><a class="About Us  '.$acitveClass.'" data-reveal-id="" onclick="" href="'.$page->getHref().'">About Us</a></li>';
                                        break;
                  case 'promotion': echo '<li class="promotions"><a class="Promotions  '.$acitveClass.'" data-reveal-id="" onclick="" href="'.$page->getHref().'">Promotions</a></li>';
                }

              ?>

            <?php } ?>
        <?php } ?>


        </ul>
      </div>
      </div>
    </nav>
   <div class="clear"></div>
  </div>
  <a id="content"></a>
 <div id="fb-root"></div>
</div>

</body>
</html>
