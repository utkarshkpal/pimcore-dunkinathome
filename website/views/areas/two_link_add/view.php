<section class="promotion-description col8">
   <ul class="promotion">

<?php while($this->block("contentblock", ["limit"=>7])->loop()) { ?><li>
    <?=$this->link('myLink1'); ?>
    <?php if($this->editmode){   ?>
        <a class="promotional-image"><?= $this->image("promotionImage",["hidetext"=>true]); ?></a>
      <?php  }else { ?>
<a href="<?=$this->link('myLink1')->getHref(); ?>" class="promotional-image" target="<?=$this->link('myLink1')->getTarget();?>" title="<?=$this->link('myLink1')->getTitle();?>" ><?= $this->image("promotionImage"); ?></a>
<?php } ?>
      <div class="promotion-text">
               <?=$this->link('myLink'); ?>
           <h2><?= $this->input("promotionTitle", ["title"=>"Enter promotion title"] );?></h2>
            <?= $this->wysiwyg("promotionDesc",["width" => 400,"height"=>100, "title"=>"Enter promotion Description"]); ?>

                        <?php if($this->editmode){   ?>
                            <a ><?= $this->image("promotionGotoImage",["alt"=>"Find A Store","hidetext"=>true]); ?></a>
                          <?php  }else { ?>
                    <a href="<?=$this->link('myLink')->getHref(); ?>" target="<?=$this->link('myLink')->getTarget(); ?>" title="<?=$this->link('myLink')->getTitle();?>" ><?= $this->image("promotionGotoImage",["alt"=>"Find A Store"]); ?></a>
                    <?php } ?>


</div>

</li>
<?php } ?>

</ul>
</section>

 <br class="clear"/>
