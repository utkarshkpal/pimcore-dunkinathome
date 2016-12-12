$(document).ready(function(e) {


	/*****************'
	   				mobile navigation
								'******************/
 $("#callout-find-store").hide();

	$('#top-nav-btn').on('click touchstart',function(e){
		  $(this).parent('.navigation').toggleClass('open');
		  e.preventDefault();
		  e.stopPropagation();
	});

	$('.navigation').on('click touchstart',function(e){

		  e.stopPropagation();
	});


	$(document).on('click touchstart',function(){

		$('#top-nav-btn').parent('.navigation').removeClass('open');
	});



	/*****************'
	   				mobile navigation
								'******************/





	/**************
				creamer popup display
						    *******************/

	 $('.openCreamer').click(function(e){
		 //e.preventDefault();
    //e.preventDefault();
		 $('#buyOnlineLeavingGlobal').addClass('reveal-modal-open');
		 return false;

	  });

	 $('#close-reveal-modal, #outbound-link').click(function(){
		   $('#buyOnlineLeavingGlobal').removeClass('reveal-modal-open');
			 //$('#buyOnlineLeavingGlobal').css("top","0");
	 });



});





function header(n,m){

g="";

g+='<div id="container">'
 g+=' <div id="header">'
g+='    <div id="site-logo"> <a href="index.html" class=" desktop-view"> <img src="images/header/nav_logo.jpg" title=""/> </a> <a href="index.html" class="mobile-view logo"> <img width="137" height="65"  alt="" src="images/responsive/logo_large.png" title=""/> </a> </div>'
g+='    <nav  class="navigation close">'
g+='      <button id="top-nav-btn" class="mobile-view"></button>'
g+='	  <div class="scroll-container">'
g+='      <div id="top-subnav">'
g+='        <ul>'
g+='          <li class="logo-view mobile-view home"><a href="index.html">Home</a></li>'
g+='          <li class="site-search"> <span class="search desktop-view" data-pass-through="false">Search</span>'
g+='            <div class="site-search-input  desktop-view">'
g+='              <div class="border-left"></div>'
g+='             <div class="border-bottom">'
 g+='               <input id="txtKeywords" name="txtKeywords" placeholder="Search by product or keyword" maxlength="150" />'
g+='                <a class="search-link" data-pass-through="true" href="search-results/index3f0e.html?keywords=" style="display:inline-block;width:94px;" > <img src="images/header/button_search_over.png" alt="Search" /> </a> </div>'
g+='            </div>'
 g+='           <aside class="mobile-view search">'
 g+='             <input id="txtKeywords" type="text" placeholder="Search by Keyword" maxlength="150">'
g+='              <input id="btnSearch" type="button">'
 g+='           </aside>'
 g+='         </li>'
g+='          <li class="first store-finder"> <a class=" desktop-view" href="dunkin-store-locator.html">Store Finder</a>'
 g+='           <aside class="mobile-view"> <a class="find_a_store_nav" href="dunkin-store-locator.html">Find in grocery</a>'
 g+='             <div >'
g+='                <p class="find-store-form">'
g+='                  <select class="locator_dropdown" id="ucFindStore_ddlProducts" name="ctl00$ucFindStore$ddlProducts">'
g+='                    <option value="">Please select</option>'
g+='                    <option value="8133400298">Original Blend K-Cup&reg; Pods</option>'
g+='                    <option value="8133400299">Dunkin Decaf&reg; K-Cup&reg; Pods</option>'
 g+='                   <option value="8133400301">Hazelnut K-Cup&reg; Pods</option>'
 g+='                   <option value="8133400300" selected="selected">French Vanilla K-Cup&reg; Pods</option>'
g+='                    <option value="8133400302">Chocolate Glazed Donut K-Cup&reg; Pods</option>'
g+='                    <option value="8133400046">Original Blend</option>'
g+='                    <option value="8133400048">Dunkin Decaf&reg;</option>'
g+='                    <option value="8133400076">Dunkin Dark&reg;</option>'
g+='                    <option value="8133400136">Dunkin Turbo&reg;</option>'
g+='                    <option value="8133400279">Colombian</option>'
g+='                    <option value="8133400280">French Roast</option>'
 g+='                   <option value="8133400147">Pumpkin Spice</option>'
 g+='                   <option value="8133400655">White Chocolate Peppermint</option>'
 g+='                   <option value="8133400248">Blueberry Muffin</option>'
g+='                    <option value="8133400249">Caramel Coffee Cake</option>'
g+='                    <option value="8133400250">Chocolate Glazed Donut</option>'
g+='                    <option value="8133400254">Old Fashioned Donut</option>'
g+='                    <option value="8133400276">Cinnamon Coffee Roll</option>'
g+='                    <option value="8133400654">Vanilla Cupcake</option>'
g+='                   <option value="8133400047">French Vanilla</option>'
g+='                    <option value="8133400049">Hazelnut</option>'
g+='                  </select>'
 g+='               </p>'
g+='                <p>'
g+='                  <input type="tel" placeholder="ZIP" class="set_zip_box" id="ucFindStore_txtZIP" maxlength="5" name="ctl00$ucFindStore$txtZIP">'
g+='                  <input type="image"  src="images/responsive/header/navigation_btn_search.png" text="Search &gt;" class="find_store_submit_button">'
g+='                </p>'
 g+='             </div>'
g+='            </aside>'
 g+='         </li>'
 g+='         <li class="sign-up"><a class="" href="sign-up.html">Sign Up</a></li>'
g+='        </ul>'
g+='      </div>'
g+='      <div id="top-nav">'
 g+='       <ul>'
 g+='         <li class="first coffees"><a class="Coffees" onclick="" href="dunkin-coffees.html">Coffees</a></li>'
g+='          <li class="creamers external-link desktop-view"><a class="openCreamer">Creamers</a></li>'
 g+='         <li class="how-to-brew"><a class="How To Brew " data-reveal-id="" onclick="" href="how-to-brew-coffee.html">How To Brew</a></li>'
g+='          <li class="about-us"><a class="About Us " data-reveal-id="" onclick="" href="about-us.html">About Us</a></li>'
 g+='         <li class="promotions"><a class="Promotions " data-reveal-id="" onclick="" href="coffee-samples-promotions.html">Promotions</a></li>'
g+='          <li class="commercial mobile-view"><a class="Promotions " data-reveal-id="" onclick="" href="commercials.html">Commercial</a></li>'
g+='        </ul>'
g+='      </div>'
g+='      </div>'
g+='    </nav>'
g+='   <div class="clear"></div>'
g+='  </div>'
g+='  <a id="content"></a>'
g+=' <div id="fb-root"></div>'
g+='</div>	'
document.write(g);


for(i=1; i<= $('#top-subnav>ul>li').length; ++i)
{
	if(i==n)
	{
	//	alert(n + ","+ i + "," + $('#top-subnav>ul>li').length);
	  $('#top-subnav>ul>li:nth-child(' + i + ') > a' ).addClass('active');
	}
}



for(j=1; j<= $('#top-nav>ul>li').length; ++j)
{
	if(j==m)
	{
		//alert(m + ","+ j + "," + $('#top-nav>ul>li').length);
	  $('#top-nav>ul>li:nth-child(' + j + ') > a' ).addClass('active');
	}
}


}




function footer(){

g="";


g+='  <div class="footerC">'
g+='    <div id="footercopy">'
g+='      <ul>'
g+='        <li><a href="contact-us.html">Contact Us</a></li>  '
g+='        <li><a href="frequently-asked-questions.html" >FAQ</a></li>    '
g+='        <li><a href="dunkin-store-locator.html">Store Finder</a></li> '
g+='       <li><a href="privacy-policy.html" >Privacy Policy</a></li> '
g+='        <li><a href="terms-of-use.html" >Terms of Use</a></li>  '
g+='        <li><a href="http://www.jmsmucker.com/smuckers-careers" target="_blank" >Corporate Careers</a></li>'
g+='        <li><a href="unsubscribe.html" >Unsubscribe</a></li>'
g+='        <li><a href="site-map.html" >Site Map</a></li>'
g+='      </ul>'
g+='      <p> Product formulation and packaging may change.<br />        For the most current information regarding a particular product, please refer to the product package.<br />     <br />   &copy; The J.M. Smucker Company | <a href="http://www.mealtimemovement.com/" target="_blank">Mealtime Movement</a> | <a href="TransparencyInTheSupplyChain.pdf" target="_blank">Transparency in the Supply Chain</a>&nbsp;&nbsp;&copy; 2016. DD IP Holder LLC <br />        (as to Dunkin Donuts and all other trademarks, logos and trade dress of DD IP Holder LLC) used under license<br /> <br /> Keurig, the Cup and Star Design, Keurig Brewed, K-Cup and the Keurig brewer trade dress are trademarks of Keurig Green Mountain, Inc., used with permission. </p>'
g+='    </div>'
g+='    <div id="footer-logo"> <img src="images/footer/ft_run_logo87cb.gif?v=635836319776109793" width="133" height="44" alt="America Runs on Dunkin" /><br />'
g+='    </div>'
g+='    <br class="clear" />'
g+='  </div>'

g+='<div id="buyOnlineLeavingGlobal" class="reveal-modal leaving-modal">'
g+='<div class="opener">'
g+=' <a href="http://www.dunkincreamer.com/" id="outbound-link" target="_blank" class="close-reveal-modal TwoStateRollover"> <img src="images/header/btn_yes_deselected.png" /></a> <a id="close-reveal-modal" class="close-reveal-modal"><img src="images/header/btn_No_deselected.png"/></a>'
g+='</div>'
g+='</div>'
g+='<div class="reveal-modal-bg" ></div>'


document.write(g);
}
