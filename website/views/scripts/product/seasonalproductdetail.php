<?php
$selectedProductObject = $this->selectedProductObject;
$selectedProductCategoryObject = $this->selectedProductCategoryObject;
//var_dump($selectedProductObject);
 $bgImg=$selectedProductObject->getBackgroundImage();
 $allProductsOfCategory = $this->allProductsOfCategory;
 //var_dump($allProductsOfCategory);
 ?>

<div class="wrapper">
    <style>
        .dynamicBg {
            background: url('<?= $bgImg?>') no-repeat, -moz-linear-gradient(top, #ffffff 0%, #e7dedf 100%);
            background: url('<?= $bgImg?>') no-repeat, -webkit-gradient(linear, 0% 0%, 0% 100%, from(#ffffff), to(#e7dedf));
            background: url('<?= $bgImg?>') no-repeat, -webkit-linear-gradient(top, #ffffff 0%, #e7dedf 100%);
            background: url('<?= $bgImg?>') no-repeat, -o-linear-gradient(top, #ffffff 0%, #e7dedf 100%);
            background: url('<?= $bgImg?>') no-repeat, -ms-linear-gradient(top, #ffffff 0%, #e7dedf 100%);
            background: url('<?= $bgImg?>') no-repeat, linear-gradient(top, #ffffff 0%, #e7dedf 100%);
        }
        .seasonal .img-placeholder {
    bottom: -14%;
    left: 3%;
    position: absolute;
  }
  .seasonal .product-image {
    margin-left: -15%;
    margin-top: 15%;
}
.product-image {
    display: inline-block;
    text-align: right;
}
.col5 {
    width: 34.66666667% !important;
}

.seasonal .product-detail-description h2 {
    color: #e35b0f;
    min-height: 30px;
    font-size: 28px;
}
.product-detail-description h2 {
    font-family: "neutra";
    font-size: 24px;
    color: #fff;
    display: inline-block;
    min-height: 60px;
    margin-top: 20px;
    text-transform: uppercase;
    vertical-align: top;
}
.seasonal .description-scroll {
    font-weight: bold;
    letter-spacing: 1px;
    color: #e35b0f;


}
.seasonal .description-scroll  {
    height: 250px;
}
.seasonal .description-scroll p  {
  color: #e35b0f;

}
.description-scroll {
    height: 70px;
    overflow: auto;
}


    </style>

    <div class="content-container productBg productDetail dynamicBg seasonal">
        <section class="introduction">
            <h1 class="introduction-heading" style="opacity:0">Seasonal</h1>
            <a href="/dunkin-coffees/seasonal-coffee" class="btnback"></a>
        </section>
        <section class="description">
            <span class="img-placeholder">
<img src="<?= $selectedProductObject->getDetailImage();?>">                            </span>
            <div class="col9 product-detail-description nav-right">


                <div class="col7 floatL">

                    <h2><?= $selectedProductObject->getName();?></h2>
                    <div class="bazare"><div id="BVRRSummaryContainer"></div></div>
                    <div class="description-scroll"> <?= $selectedProductObject->getDescription();?></div>

                </div>
              <?php  $sortedProductArray = array();
                foreach($allProductsOfCategory as $product)
                {
                  $sortedProductArray[] = object::getById($product['id']);
                }
                 foreach($sortedProductArray as $product)
                {

                  if($selectedProductObject->getId()!=$product->getId())
                  {?>


                <span class="product-image col5 floatL">
                              <a href="<?= $product->getUrlKeyword();?>">
                <img src="<?= $product->getMainImage();?>" style= "width:65px; height:131px;" >
                            </a>
<?php }}?>
                </span>

            </div>
            <div class="coffee-store-finder">
               <h3>Find a Store</h3>
               <div>
                   <input type="text"  onblur="restoreDefault(this);" onFocus="clearDefault(this);" class="zip" maxlength="5" value="Enter ZIP">
                   <input type="button" alt="Search" src="/website/static/images/products/buttons/button_search.png" class="search">
           </div>
           </div>
        </section>
    </div>
</div>
<div class="bazarewrapper" >
    <div id="BVRRContainer"></div>
</div>
<!-- Bazaar Voice Reviews - API Configuration (Start) -->
<script type="text/javascript" src="//display.ugc.bazaarvoice.com/static/dunkinathome/en_US/bvapi.js"></script>
<script type="text/javascript">
                        $BV.configure("global", {
                            submissionContainerUrl: "http://dunkinathome.com"
                        });
</script>
<script type="text/javascript">
    $BV.ui("rr", "show_reviews", {
        productId: '10',
    });
</script>
<!-- Bazaar Voice Reviews - API Configuration (End) -->


<div id="buyOnlineLeavingGlobal" class="reveal-modal leaving-modal">
    <div class="opener">
        <a rel="nofollow" href="http://www.dunkincreamer.com/" id="outbound-link" target="_blank" class="close-reveal-modal TwoStateRollover" onclick="_gaq.push(['_trackEvent', 'Creamers', 'Click', 'Interstitial']);"> <img src="/website/static/dunkinathome/images/header/btn_yes_deselected.png" /></a> <a href="#" id="close-reveal-modal" class="close-reveal-modal"><img src="/website/static/dunkinathome/images/header/btn_No_deselected.png"/></a>
    </div>
</div>
<div class="reveal-modal-bg" ></div>
<div id="overlay"></div>

<script type="text/javascript">
    $(document).keyup(function(e) {
     if (e.keyCode == 27) { // escape key maps to keycode `27`
        $("#close-reveal-modal").trigger("click");
    }
});
</script>


        <script>
            function setCookie(name, value, days) {
                if (days) {
                    var date = new Date();
                    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                    var expires = "; expires=" + date.toGMTString();
                } else
                    var expires = "";
                document.cookie = name + "=" + value + expires + "; path=/";
            }

            function getCookie(name) {
                var nameEQ = name + "=";
                var ca = document.cookie.split(';');
                for (var i = 0; i < ca.length; i++) {
                    var c = ca[i];
                    while (c.charAt(0) == ' ')
                        c = c.substring(1, c.length);
                    if (c.indexOf(nameEQ) == 0)
                        return c.substring(nameEQ.length, c.length);
                }
                return null;
            }

            function deleteCookie(name) {
                setCookie(name, "", -1);
            }

            $(document).ready(function () {
                $("#callout-find-store").hide();
            });

            function callZip(zip) {
                $(".zip").val(zip);
                $(".search").click();
            }

            function trackFacebook() {
                _gaq.push(['_trackEvent', 'exit-url', 'click', 'Facebook']);
            }

            //var appId = '269422273188888';
            var appId = '269422273188888';


            $(function () {
                // Slideshow 1
                 // Slideshow 1
                $("#slider1").responsiveSlides({
                  maxwidth: 0,
                  speed: 500,
                  timeout: 10000,
                  pager: true,
                  pause: false,
                  pauseControls: true,
                  auto: EDITMODE === false ? true : false,
                  nav: true,
                  prevText: '',
                  nextText: ''
                  //before: function(){    $('.share-container a').on('click', function(){$( "#slider1" ).responsiveSlides({pause: true});});                }
                });

                $('.share-container a').on('click', function(){
                    window.responsiveSlidesForcePause = true;
                });

                $('#close-button, #panel-background').on('click', function(){
                    window.responsiveSlidesForcePause = false;
                });


                $('.accordian h3').on('click', function(){
                    $(this).next('div').slideToggle(500);
                    $(this).siblings().next('div').hide();

                    $(this).toggleClass('tactive');

                    $(this).siblings().removeClass('tactive');
                });

                $('.fancybox').fancybox({
                    padding: 5,
                    autoHeight: true,
                    maxWidth: 400
                });
            });
        </script>

        <script>
        var _gaq = _gaq || [];
        _gaq.push(["_setAccount", "UA-4101430-1"]);
        _gaq.push(["_setDomainName", "dunkinathome.com"]);
        _gaq.push(["_setAllowLinker", true]);
        _gaq.push(["_setLocalRemoteServerMode"]);
        _gaq.push(["_initData"]);
    </script>
        <script type="text/javascript">
                </script>


<img src="https://secure.leadback.advertising.com/adcedge/lb?site=695501&srvc=1&betr=50816=1266162[720]" width="1" height="1" border="0" />
    <script language="JavaScript1.1" src="//pixel.mathtag.com/event/js?mt_id=803061&mt_adid=140845&v1=&v2=&v3=&s1=&s2=&s3="></script>
    <script>
        _gaq.push(["_trackPageview"]);
        (function () {
            var ga = document.createElement("script"); ga.type = "text/javascript"; ga.async = true;
            ga.src = ("https:" == document.location.protocol ? "https://ssl" : "http://www") + ".google-analytics.com/ga.js";
            var s = document.getElementsByTagName("script")[0]; s.parentNode.insertBefore(ga, s);
        })();
    </script>

    <!-- Google Code for Remarketing Tag -->
    <!--------------------------------------------------
    Remarketing tags may not be associated with personally identifiable
    information or placed on pages related to sensitive categories. See more
    information and instructions on how to setup the tag on:
    http://google.com/ads/remarketingsetup
    --------------------------------------------------->
    <script type="text/javascript">
        /* <![CDATA[ */
        var google_conversion_id = 1026977230;
        var google_custom_params = window.google_tag_params;
        var google_remarketing_only = true;
        /* ]]> */
    </script>
    <script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js"></script>
    <noscript>
        <div style="display:inline;">
            <img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/1026977230/?value=0&amp;guid=ON&amp;script=0"/>
        </div>
    </noscript>

</body>
</html>
