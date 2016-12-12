<section class="description col7">
  <ol id="faqs">

<?php

$i=1;

while($this->block("mycontentblock")->loop()) {
?>

<li>

<a id="faqQues<?php echo $i; ?>">
<h2><?php if($this->editmode){ echo $this->wysiwyg("quesTitle",array("enterMode"=>2),["height"=>20]); } else { echo $this->wysiwyg("quesTitle",array("enterMode"=>2)); }?></h2></a>

<div id="faqDesc<?php echo $i; ?>">
  <?php  echo $this->wysiwyg("quesDesc"); ?>
</div>

</li>


<?php

$i++;

}
?>

</ol>
</section>
<br class="clear">
<a href="#top"><u>Back to Top</u></a>

<?php if(!$this->editmode){ ?>
<script>
$( document ).ready(function() {

        $( "div[id^=faqDesc]" ).hide();

  $( "a[id^=faqQues]" ).each(function() {

    $(this ).click(function () {
    $(this).next('div[id^=faqDesc]').toggle();
    });


    });

});
</script>
<?php }?>
