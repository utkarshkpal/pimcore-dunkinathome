<section class="introduction col6">
<?php
if($this->editmode){
    echo "<h2 class='description-heading' style='color:black'>".$this->input('subheading')."</h2>";
}else{
        echo "<h2 class='description-heading'>".$this->input('subheading')->getData()."</h2>";
}

 ?>
</section>
<br class="clear">
