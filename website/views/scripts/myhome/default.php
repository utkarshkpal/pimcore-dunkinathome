<!-- Slider -->
<div class="home-container">
    <div class="slider">
        <!-- Slideshow 1 -->
        <ul class="rslides" id="slider1">

          <?php
            $count = $this->select("carouselSlides")->getData();
            if(!$count) {
                $count = 1;
            }

            for($i=0; $i<$count; $i++) { ?>

                  <li>
                    <div style="position:relative;">
                      <a href="<?=$this->link('cLink_'.$i)->getHref(); ?>">
                          <?= $this->image("cImage_".$i,[

                                          // "thumbnail"=>"CarouselImage",
                                          "reload" => true,
                                        "hidetext" => true,
                                          "title" => "Drag Image Here",
                                          "width" => 1196,
                                          "height" => 547,

                                    ]); ?>
                          </a>
                    <div class="linktop">
                  <?= $this->link("cLink_".$i); ?>
                 </div>
                  </div>
                 </li>

           <?php } ?>

        </ul>
    </div>
</div>
<!-- select no of slides -->
<?php if($this->editmode) { ?>

<div class="container" style="padding-bottom: 40px">
    Number of Slides: <?= $this->select("carouselSlides", [
        "width" => 70,
        "reload" => true,
        "store" => [[1,1],[2,2],[3,3],[4,4]]
        ]); ?>
</div>


<!-- body link -->
<script>
    $(function () {

        // Slideshow 1
      $("#slider1").responsiveSlides({
      maxwidth: 0,

      speed: 800,
      pager: true,
      auto: false
        });
      });

</script>

<?php }else{ ?>

<script>
    $(function () {

      // Slideshow 1
      $("#slider1").responsiveSlides({
        maxwidth: 0,
        speed: 800,
    pager: true,
    auto: true
      });
    });
</script>
<?php } ?>
