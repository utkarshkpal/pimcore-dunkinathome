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
$navStartNode = $this->document->getProperty("footerStart");

?>


   <div class="footerC">
     <div id="footercopy">
       <div>
       <ul>
         <!-- <li><a href="contact-us.html">Contact Us</a></li>
         <li><a href="frequently-asked-questions.html" >FAQ</a></li>
         <li><a href="dunkin-store-locator.html">Store Finder</a></li>
        <li><a href="privacy-policy.html" >Privacy Policy</a></li>
         <li><a href="terms-of-use.html" >Terms of Use</a></li>
         <li><a href="http://www.jmsmucker.com/smuckers-careers" target="_blank" >Corporate Careers</a></li>
         <li><a href="unsubscribe.html" >Unsubscribe</a></li>
         <li><a href="site-map.html" >Site Map</a></li> -->


         <?php $mainNavigation = $this->pimcoreNavigation()->getNavigation($this->document, $navStartNode); ?>
<?php foreach ($mainNavigation as $page) { ?>
   <?php /* @var $page Zend\Navigation\Page\Mvc */ ?>
   <?php // here need to manually check for ACL conditions ?>
   <?php  if (!$page->isVisible() || !$this->navigation()->accept($page)) { continue; } ?>
   <?php $hasChildren = $page->hasPages(); ?>
   <?php if (!$hasChildren && $page->getDocumentType()=='link') { ?>
     <?php $label = $page->getLabel(); ?>
     <?php
     echo '<li><a href="'.$page->getHref().'" >'.ucwords($label).'</a></li>';
    //    switch($label)
    //    {
    //      case 'Contact Us': echo '<li><a href="'.$page->getHref().'">Contact Us</a></li>';  //replace # with '.$page->getHref().'
    //                           break;
    //      case 'FAQ': echo '<li><a href="'.$page->getHref().'" >FAQ</a></li>';
    //                          break;
       //
    //      case 'Privacy Policy' : echo '<li><a href="'.$page->getHref().'" >Privacy Policy</a></li>';
    //                            break;
    //      case 'Terms Of Use': echo '<li><a href="'.$page->getHref().'" >Terms of Use</a></li>';
    //                             break;
    //     case 'Site Map': echo '<li><a href="'.$page->getHref().'" >Site Map</a></li>';
    //                           break;
    //     case 'About Our Ads': echo '<li><a href="'.$page->getHref().'" >About Our Ads</a></li>';
    //                           break;
    //     default : echo '<li><a href="'.$page->getHref().'" >'.ucwords($label).'</a></li>';
       //
    //    }

     ?>

   <?php } ?>
<?php } ?>


       </ul>
     </div>
     <?= $this->wysiwyg("footer_content",["height"=>"80","title"=>"Enter Footer Content","placeholder"=>"Enter Footer Content"]);?>
     </div>
     <div id="footer-logo"> <?= $this->image('footerLogo',["height"=>44 ,"width"=>133,"hidetext"=>true])?> <br />
     <!-- <div id="footer-logo"> <img src="/website/static/images/footer/ft_run_logo87cb.gif?v=635836319776109793" width="133" height="44" alt="America Runs on Dunkin" /><br /> -->
     </div>
     <br class="clear" />
   </div>

 <div id="buyOnlineLeavingGlobal" class="reveal-modal leaving-modal">
 <div class="opener">
  <a href="http://www.dunkincreamer.com/" id="outbound-link" target="_blank" class="close-reveal-modal TwoStateRollover"> <img src="images/header/btn_yes_deselected.png" /></a> <a id="close-reveal-modal" class="close-reveal-modal"><img src="images/header/btn_No_deselected.png"/></a>
 </div>
 </div>
 <div class="reveal-modal-bg" ></div>

</body>
</html>
