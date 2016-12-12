<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from dunkinathome.com/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 12 Jan 2016 09:50:25 GMT -->
<!-- Added by HTTrack -->

<!-- /Added by HTTrack -->
<head id="ctl00_ctl00_Head1">
  <link rel="shortcut icon" href="/favicon.png" type="image/png">
<title><?php

if($this->document->getType()!='snippet')
{
  $title = $this->document->getTitle();
}
if(isset($title))
{
  echo $title;
}
  ?></title>
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

<meta name="apple-mobile-web-app-capable" content="yes">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

  <?php

      $this->headLink()->appendStylesheet('/website/static/css/styles.min.css');
      $this->headLink()->appendStylesheet('/website/static/css/share.min.css');

      $this->headLink()->appendStylesheet('/website/static/css/css.css');

      $this->headLink()->appendStylesheet('/website/static/css/responsive.css');
      $this->headLink()->appendStylesheet('/website/static/css/share.min.css');
      $this->headLink()->appendStylesheet('/website/static/css/custom/linktop.css');

      echo $this->headLink();

      $this->headScript()->appendFile('/website/static/js/jquery.min.js');
      $this->headScript()->appendFile('/website/static/js/scripts.js');
      $this->headScript()->appendFile('/website/static/js/function.js');
      $this->headScript()->appendFile('/website/static/js/holiday-share.minfb1b.js');
      $this->headScript()->appendFile('/website/static/js/responsiveslides.min.js');
      $this->headScript()->appendFile('/website/static/js/modernizr.custom.41054.min.js');
      echo $this->headScript();

  ?>

</head>

<body>

  <?php // $this->document->getProperty('header')  ?>
<?php  echo $this->inc($this->document->getProperty('header'));
      //echo $this->snippet('header');
 ?>

  <?php echo $this->layout()->content;  ?>

<?php  echo $this->inc($this->document->getProperty('footer')); ?>

</body>


</html>
