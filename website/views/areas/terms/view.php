

<?php

if($this->editmode)
  {
    echo "<h3>Choose the length of Dropdown</h3>";
    echo $this->select("classValue", [
            "store" => [
                ['col7', 'Column length 7'],
                ['col8', 'Column length 8']
            ],
            "reload" => true
        ]);
      }


?>



<?php if(!$this->editmode){?>
<section class="<?= $this->select("classValue")->getData()?> accordian">
  <?php }?>
<?php while($this->block("accordian")->loop()) { ?>

   <h3><?= $this->input("title");?></h3>

   <div>
     <?php if($this->editmode):?>
     <?= $this->wysiwyg("desc");?>
   <?php else:?>
     <?php echo $this->wysiwyg("desc")->text;?>
   <?php endif;?>
  </div>

<?php }?>
</section>
<br class="clear"/>
<script>
 $(document).ready(function(){

	$('.accordian h3').on('click', function(){

		$(this).next('div').slideToggle(500);
		$(this).siblings().next('div').hide();

		$(this).toggleClass('tactive');

		$(this).siblings().removeClass('tactive');
   });
 });
</script>
