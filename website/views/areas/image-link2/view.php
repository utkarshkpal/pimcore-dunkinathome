<?php while($this->block("contentblock")->loop()) { ?>



     <div style="position:relative;">
               <a <?php if(!$this->editmode) { ?> class="<?=$this->link('myLink1')->getData()["class"];?>"<?php }?> href="<?=$this->link('myLink1')->getHref();?>" title="<?=$this->link('myLink1')->getTitle();?>" target = "<?=$this->link('myLink1')->getTarget();?>" data-reveal-id="buyOnlineLeavingGlobal">

                <?=$this->image('myImage1', [
                                               "thumbnail"=>"homeImagelink",
                                                "width" => 480,
                                                "height" => 98,
                                                "hidetext"=>true,
                                            ]); ?>



              <div class="linktop"><?=$this->link('myLink1'); ?></div>
              </a>
      </div>

      <div style="float:right;position:relative;">
            <a href="<?=$this->link('myLink2')->getHref();?>" <?php if(!$this->editmode) { ?> class="<?=$this->link('myLink2')->getData()["class"];?>"<?php }?>  title="<?=$this->link('myLink2')->getTitle();?>" target ="<?=$this->link('myLink2')->getTarget();?>"  >
            <?=$this->image('myImage2', [
                                          "thumbnail"=>"homeImagelink",
                                          "width" => 480,
                                          "height" => 98,
                                          "hidetext"=>true,
                                      ]); ?>
          </a>
          <div class="linktop"><?=$this->link('myLink2'); ?></div>
      </div>


<?php } ?>
