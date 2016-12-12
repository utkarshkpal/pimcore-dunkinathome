<section class="full-container description about">

  <?php

  echo "<h2>".$this->input("secondHeading")."</h2>";

  ?>


<?php if($this->editmode)
{
echo $this->wysiwyg("secondContent",["placeholder" => "Second Content","title" => "Second Content"]);
}
else{
  echo $this->wysiwyg("secondContent")->text;
}
?>

</section>
<br class="clear"/>
