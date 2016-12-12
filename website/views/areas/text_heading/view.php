

<section class="introduction <?= $this->select("classValue1")->getData()  ?>">


                   <h1 class="introduction-heading"> <?= $this->input("heading"); ?></h1>
                   <?php

                   if($this->editmode)
                     {
                       echo "<h3>Choose the length of Dropdown</h3>";
                       echo $this->select("classValue1", [
                               "store" => [
                                   ['col7', 'Column length 7'],
                                   ['col8', 'Column length 8']
                               ],"reload"=>true,
                           ]);
                         }


                   ?>


                   <p><?= $this->wysiwyg("desc");?></p>

           </section>
           <br class="clear">
