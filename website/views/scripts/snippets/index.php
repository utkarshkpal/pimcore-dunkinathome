  <?php // $snippetName = $this->document->getProperty('snippetName') ;?>

<?php
                if($this->editmode){
                $this->headLink()->appendStylesheet('/website/static/css/css.css');
                echo $this->headLink();
                }

              echo $this->areablock("myBlock");

?>
