<section class="promotion-description col8">

   <ul class="promotion about">

<?php


while($this->block("contentblock",["limit" => 2])->loop()) {
?>

<li style="z-index:1">

<span><?=$this->link('myLink'); ?></span>

<?php if($this->editmode){?>
  <a class='promotional-image'><?= $this->image("videoImage",["thumbnail"=>"abt_Thumbnail1","title"=>"Image1","hidetext"=>true]); ?></a>
<?php
}
else
{
?>
<a class="promotional-image" href="<?=$this->link('myLink')->getHref(); ?>" target="<?=$this->link('myLink')->getTarget();?>" title="<?=$this->link('mylink')->getTitle();?>">

<?= $this->image("videoImage",["title"=>"Image1","hidetext"=>true]); ?>

</a>
<?php } ?>

<div class="promotion-text">

<h2>
<?php  echo $this->input("videoTitle",["width"=>300]);?>
</h2>

  <?php echo $this->wysiwyg("videoDesc",["width"=>300,"height"=>20]); ?>

<?php if($this->editmode) { ?>
  <?= $this->image("watchNow",["title"=>"Image2","hidetext"=>true]); ?>
<?php } else{


  ?>
  <a href="<?=$this->link('myLink')->getHref(); ?>"  target="<?=$this->link('myLink')->getTarget(); ?>" title="<?=$this->link('myLink')->getTitle();?>" >
  <?= $this->image("watchNow"); ?>
  </a>
<?php

}
?>

</div>

</li>

<?php
}
?>

</ul>
</section>
