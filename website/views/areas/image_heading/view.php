

 <section class="introduction <?= $this->select("classValue2")->getData()  ?>">
<h1 class="introduction-heading"><?= $this->image("title",["hidetext"=>true]);?></h1>
<?php

if($this->editmode)
  {
    echo "<h3>Select the length of description coloumn:</h3>";
    echo $this->select("classValue2", [
            "store" => [
                ['col7', 'Column length 7'],
                ['col8', 'Column length 8']
            ],"reload"=>true
        ]);
      }


?>

 <?= $this->wysiwyg("desc",["placeholder"=>"Enter Description","height"=>100, "title"=>"Enter Description"]);?>
  </section>
    <br class="clear">
