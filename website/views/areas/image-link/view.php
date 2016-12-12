

<?php while($this->block("contentblock")->loop()) { ?>
<div><?=$this->link('myLink2'); ?></div>

 <a class="Creamers"  href="<?=$this->link('myLink2')->getHref();?>" data-reveal-id="buyOnlineLeavingGlobal">
    <?=$this->image('myImage2', [
                                  "width" => 480,
                                  "height" => 98,
                                  "hidetext" => true
                              ]); ?>
  </a>

<?php } ?>
