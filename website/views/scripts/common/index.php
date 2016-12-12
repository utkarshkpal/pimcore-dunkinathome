<div class="wrapper">

<?php
$pageClass = $this->document->getProperty('pageClass') ;
$pClass = $pageClass !== null ? $pageClass : 'dunkin-store';
$bricksLimit = $pageClass == 'aboutus' ? ["limit"=>3] : [];
?>
<!--
<div class='content-container <?php echo $pageClass;?>'>
    <?php echo $this->areablock("myBlock", $bricksLimit);?>
</div> -->


<?php

if(isset($pageClass)){
    echo "<div class='content-container $pageClass' >";
    if($pageClass=='aboutus'){
        echo $this->areablock("myBlock",["limit"=>3]);
    }
    else{
        echo $this->areablock("myBlock");
    }

}
else{
        echo '<div class="content-container dunkin-store"  >';
        echo $this->areablock("myBlock");
}

       echo '</div>';



// switch($docName)
// {
// case 'About Us':
//               echo '<div class="content-container aboutus"  >';
//               echo $this->areablock("myBlock");
//               echo '</div>';
//               break;
// case 'promotion':
//               echo '<div class="content-container dunkin-store" >';
//               echo $this->areablock("myBlock");
//               echo '</div>';
//               break;
// case 'Contact us':
//               echo '<div class="content-container">';
//               echo $this->areablock("myBlock");
//               echo '</div>';
//               break;
// case 'FAQ':
//               echo '<div class="content-container bg-Image faq" >';
//               echo $this->areablock("myBlock");
//               echo '</div>';
//               break;
// // case 'Privacy Policy':
// //               //echo $this->snippet('privacy_policy');
// //               echo $this->areablock('block');
// //               break;
// // case 'Terms Of Use':
// //               echo $this->snippet('terms_of_use');
// //               break;
// // case 'About Our Ads':
// //               echo $this->snippet('about_our_ads');
// //               break;
// default :
//               echo '<div class="content-container dunkin-store" >';
//               echo $this->areablock("newDoc");
//               echo '</div>';
// }
//  if($pageClass=='aboutus')   // about us////////////////////////////////
// {
//       echo $this->areablock("myBlock",["allowed"=>["about_heading","video","secondHeading"],"limit"=>"3"]);
// }
//
// else if($pageClass=='dunkin-store')     //  promotion
// {
//      echo $this->areablock("myBlock",["allowed"=>["heading","promotion"]]);
// }
//
// else if($pageClass=='bg-Image faq')   // site-map,FAQ
// {
//     echo $this->areablock("myBlock",["allowed"=>["site_map"]]);
// }
//
// else
// {
//
//     echo $this->areablock("newDoc");
//
// }
//
// echo $this->document->getName();

?>

</div>
