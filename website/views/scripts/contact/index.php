<!DOCTYPE html>
<html lang="en">

    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />

    <head>
      <!-- <script type="text/javascript">var EDITMODE = false;</script>
        <script type="text/javascript">var BASEURL = 'index.html';</script> -->
        <?php
        $this->headLink()->appendStylesheet('/website/static/contact/dunkinathome/css/styles.css');
        $this->headLink()->appendStylesheet('/website/static/contact/dunkinathome/css/custom.css');
        $this->headLink()->appendStylesheet('/website/static/contact/dunkinathome/css/css.css');
        // $this->headLink()->appendStylesheet('/website/static/contact/common/css/jquery-ui49e1.css?_dc=1457117570');
        $this->headLink()->appendStylesheet('/website/static/contact/common/css/jquery-ui49e1.css');
        $this->headLink()->appendStylesheet('/website/static/contact/dunkinathome/css/custom.css');
        $this->headLink()->appendStylesheet('/website/static/contact/custom/custom.css');
        $this->headLink()->appendStylesheet('/website/static/contact/dunkinathome/css/responsive.css');

        echo $this->headLink();

        $this->headScript()->appendFile('/website/static/contact/dunkinathome/js/jquery.min.js');
        $this->headScript()->appendFile('/website/static/contact/dunkinathome/js/scripts.js');
        $this->headScript()->appendFile('/website/static/contact/dunkinathome/js/responsiveslides.min.js');
        // $this->headScript()->appendFile('/website/static/contact/common/js/jquery.validate.min9879.js?_dc=1455304614');
        $this->headScript()->appendFile('/website/static/contact/common/js/jquery.validate.min9879.js');
        // $this->headScript()->appendFile('/website/static/contact/common/js/jquery-ui49e1.js_dc=1457117570');
        $this->headScript()->appendFile('/website/static/contact/common/js/jquery-ui49e1.js');
        // $this->headScript()->appendFile('/website/static/contact/common/js/jquery.maskedinput9879.js?_dc=1455304614');
        $this->headScript()->appendFile('/website/static/contact/common/js/jquery.maskedinput9879.js');
        $this->headScript()->appendFile('/website/static/contact/dunkinathome/js/custom.js');
        $this->headScript()->appendFile('/website/static/contact/dunkinathome/js/function.js');
        $this->headScript()->appendFile('/website/static/contact/dunkinathome/js/modernizr.custom.js');

        echo $this->headScript();
?>
      <script src="/website/static/contact/dunkinathome/js/contact.js"></script>

    </head>
    <body class="">

          <div class="wrapper">
            <div class="content-container bg-Image contact" >

                    <section id="intro-custom" class="introduction col7">
                        <?php

                                 if(isset($_SESSION['errorMsz'])){

                                       if($_SESSION['errorMsz']==true){
                                            echo "<p id='errorMsz' class='introduction-heading' style='font-size:20px'>Your response could not be saved due to an error<p>";
                                            $_SESSION['errorMsz']=false;
                                       }
                                   }
                          ?>


                        <h1 class="introduction-heading"><?= $this->image("title",["hidetext"=>true]);?></h1>
                        <div class="heading-description">
                        <?php  echo $this->wysiwyg("headingDescription"); ?>
                        </div>

                    </section>
                    <br>
                    <section class="description col7">
                    <div id='general-content'>
                    <div id="questions-cat" class="select-quest clearfix">
                        <h2 class="description-heading-custom"><?=$this->input("optionHeading"); ?></h2>

                          <ul class="contact-options-custom" style="margin-left:-2px">
                                  <li>  <a href="javascript:void(0);" class="" id="lnkGeneralQuestions"><img width="147" height="16" alt="General Questions" src="/website/static/contact/images/general.png"></a><br>
                                </li>
                                <li style="margin-top:-2px"><a href="javascript:void(0);" class="" id="lnkProductQuestions"><img width="153" height="16" alt="Product Questions" src="/website/static/contact/images/product.png"></a><br>
                                </li>

                    </div>

                    <?php //echo $this->wysiwyg("Contact"); ?>
                    <div class="new-custom" style="margin-top:3px">
                    <div class="contact-info">
                <?= $this->areablock('add', [
                 "allowed" => ["wysiwyg"]]) ?>
                    </div>



</div>

                  </div>


                    <form class="contact-form" id="aspnetForm" onsubmit="return submitForm();" action="#" method="post" style="display:none;">
                        <div id="pnlProduct1" class="contact general">
                            <div id="step1">
                                <h2 id="group-heading"  class="description-heading"></h2>
                                <p class="contact-des">Contact us online by completing the following:</p>
                                <p id="product-question-0">
                                      <span class="label">
                                    <font class="styleBtn" id="label1">1</font>
                                    <font class="styleText">* Select a product category:</font>
                                    </span>
                                    <span class="inputs selectSpan">
                                      <select class="required form-control" id="ddlCategories" name="ddlCategories" >
                                        <option value="">-SELECT-</option>
                                        <?php

                                        foreach ($this->ProductCategory as $key) {
                                        $obj = Object\ProductCategory::getById($key);
                                        $obj_name = strtoupper($obj->getName());
                                        echo  "<option value='$key'>$obj_name</option>";

                                        }

                                         ?>

                                    </select>

                                    </span>
                                </p>
                                <p id="product-question-1">
                                    <span class="label">
                                    <font class="styleBtn" id="label2">2</font>
                                    <font class="styleText">* Please select a product:</font>
                                    </span>
                                    <span class="inputs selectSpan">
                                        <select name="ddlProductProduct" id="ddlProductProduct" class="required form-control" disabled="disabled">
                                            <option value="">-SELECT</option>
                                            <option value="">Value</option>
                                        </select>
                                    </span>
                                </p>
                                <p id="product-question-2" class="non-req">
                                    <span class="label">
                                    <font class="styleBtn" id="label3">3</font>
                                    <font class="styleText">What is the UPC on your product?</font>
                                    </span>
                                    <span class="input-field">
                                    <input name="txtUPC" type="text" maxlength="20" id="txtUPC" class="form-control textbox">
                                    </span>
                                </p>
                                <p>
                                    <span class="label">
                                    <font class="styleBtn" id="label4">4</font>
                                    <font class="styleText">* Choose the type of feedback you’d like to share with us:</font>
                                    </span>
                                    <span id="rblProductFeedback" class="radio-buttons inputs">
                                    <input class="required" id="rblProductFeedback_0" type="radio" name="ProductFeedback" value="Compliment">
                                    <label for="rblProductFeedback_0">Compliment</label>
                                    <br>
                                    <input class="required" id="rblProductFeedback_1" type="radio" name="ProductFeedback" value="Complaint">
                                    <label for="rblProductFeedback_1">Complaint</label>
                                    <br>
                                    <input class="required" id="rblProductFeedback_2" type="radio" name="ProductFeedback" value="Question">
                                    <label for="rblProductFeedback_2">Question</label>
                                    <br>
                                    <input class="required" id="rblProductFeedback_3" type="radio" name="ProductFeedback" value="Suggestion">
                                    <label for="rblProductFeedback_3">Suggestion</label>
                                    <br>
                                    </span>
                                </p>
                                <p>
                                    <span class="label">
                                    <font class="styleBtn" id="label5">5</font>
                                    <font class="styleText">* What do you want to write about?</font>
                                    </span>
                                    <span class="inputs selectSpan">
                                    <select name="ddlProductTopic" id="ddlProductTopic" class="required"></select>
                                    </span>
                                </p>
                                <p>
                                    <span class="label">
                                    <font class="styleBtn" id="label6">6</font>
                                    <font class="styleText">* How do you feel?</font>
                                    </span>
                                    <span id="rblProductFeel" class="inputs radio-buttons">
                                    <input class="required" id="rblProductFeel_0" type="radio" name="ProductFeel" value="Very Pleased">
                                    <label for="rblProductFeel_0">Very Pleased</label>
                                    <br>
                                    <input class="required" id="rblProductFeel_1" type="radio" name="ProductFeel" value="Pleased">
                                    <label for="rblProductFeel_1">Pleased</label>
                                    <br>
                                    <input class="required" id="rblProductFeel_2" type="radio" name="ProductFeel" value="Neutral">
                                    <label for="rblProductFeel_2">Neutral</label>
                                    <br>
                                    <input class="required" id="rblProductFeel_3" type="radio" name="ProductFeel" value="Disappointed">
                                    <label for="rblProductFeel_3">Disappointed</label>
                                    <br>
                                    <input class="required" id="rblProductFeel_4" type="radio" name="ProductFeel" value="Very Disappointed">
                                    <label for="rblProductFeel_4">Very Disappointed</label>
                                    <br>
                                    </span>
                                </p>
                            </div>
                            <div id="step2" class="contact-step-two" style="display:none; ">
                                <div class="contact" id="pnlGeneral2">
                                    <h2 class="introduction-heading"><img src="/website/static/contact/dunkinathome/images/contact/general/8.2.2_title.png" /></h2>
                                </div>
                                <p style="margin:16px 0;">* required field</p>
                                <div style="color:Red;display:none;" class="validation-summary" id="vlsContactDetails"></div>
                                <p class="lessMargin">
                                    <span class="label white">* Share Your Comments:</span>
                                    <span class="input-field">
                                    <textarea class="required textarea textbox" id="txtDetails" cols="20" rows="2" name="txtDetails"></textarea>
                                    </span>
                                </p>
                                <h3 style="font-size:13px;">Tell Us About Yourself</h3>
                                <br/>
                                <p class="lessMargin">
                                    <span class="label white">* First Name:</span>
                                    <span class="input-field">
                                    <input type="text" class="required textbox" id="txtFirstName" name="txtFirstName" maxlength="30">
                                    </span>
                                </p>
                                <p class="lessMargin">
                                    <span class="label white">* Last Name:</span>
                                    <span class="input-field">
                                    <input type="text" class="required textbox" id="txtLastName" name="txtLastName" maxlength="30">
                                    </span>
                                </p>
                                <p class="lessMargin">
                                    <span class="label white">* Email Address:</span>
                                    <span class="input-field">
                                    <input type="text" class="required email textbox" id="txtEmailAddress" name="txtEmailAddress" maxlength="60">
                                    </span>
                                </p>
                                <p class="lessMargin">
                                    <span class="label white">* Address 1:</span>
                                    <span class="input-field">
                                    <input type="text" class="required textbox" id="txtAddress1" name="txtAddress1" maxlength="50">
                                    </span>
                                </p>
                                <p class="lessMargin">
                                    <span class="label white"> Address 2:</span>
                                    <span class="input-field">
                                    <input type="text" class="form-control textbox" id="txtAddress2" name="txtAddress2" maxlength="50">
                                    </span>
                                </p>
                                <p class="lessMargin">
                                    <span class="label white">* City:</span>
                                    <span class="input-field">
                                    <input type="text" class="required textbox" id="txtCity" name="txtCity" maxlength="50">
                                    </span>
                                </p>
                                <p class="lessMargin">
                                    <span class="label white">* State:</span>
                                    <span class="input-field">
                                        <select class="required" id="ddlState" name="ddlState">
                                            <option value="" selected="selected">-SELECT STATE-</option>
                                            <option value="AL">ALABAMA</option>
                                            <option value="AK">ALASKA</option>
                                            <option value="AZ">ARIZONA</option>
                                            <option value="AR">ARKANSAS</option>
                                            <option value="CA">CALIFORNIA</option>
                                            <option value="CO">COLORADO</option>
                                            <option value="CT">CONNECTICUT</option>
                                            <option value="DE">DELAWARE</option>
                                            <option value="FL">FLORIDA</option>
                                            <option value="GA">GEORGIA</option>
                                            <option value="HI">HAWAII</option>
                                            <option value="ID">IDAHO</option>
                                            <option value="IL">ILLINOIS</option>
                                            <option value="IN">INDIANA</option>
                                            <option value="IA">IOWA</option>
                                            <option value="KS">KANSAS</option>
                                            <option value="KY">KENTUCKY</option>
                                            <option value="LA">LOUISIANA</option>
                                            <option value="ME">MAINE</option>
                                            <option value="MD">MARYLAND</option>
                                            <option value="MA">MASSACHUSETTS</option>
                                            <option value="MI">MICHIGAN</option>
                                            <option value="MN">MINNESOTA</option>
                                            <option value="MS">MISSISSIPPI</option>
                                            <option value="MO">MISSOURI</option>
                                            <option value="MT">MONTANA</option>
                                            <option value="NE">NEBRASKA</option>
                                            <option value="NV">NEVADA</option>
                                            <option value="NH">NEW HAMPSHIRE</option>
                                            <option value="NJ">NEW JERSEY</option>
                                            <option value="NM">NEW MEXICO</option>
                                            <option value="NY">NEW YORK</option>
                                            <option value="NC">NORTH CAROLINA</option>
                                            <option value="ND">NORTH DAKOTA</option>
                                            <option value="OH">OHIO</option>
                                            <option value="OK">OKLAHOMA</option>
                                            <option value="OR">OREGON</option>
                                            <option value="PA">PENNSYLVANIA</option>
                                            <option value="RI">RHODE ISLAND</option>
                                            <option value="SC">SOUTH CAROLINA</option>
                                            <option value="SD">SOUTH DAKOTA</option>
                                            <option value="TN">TENNESSEE</option>
                                            <option value="TX">TEXAS</option>
                                            <option value="UT">UTAH</option>
                                            <option value="VT">VERMONT</option>
                                            <option value="VA">VIRGINIA</option>
                                            <option value="WA">WASHINGTON</option>
                                            <option value="WV">WEST VIRGINIA</option>
                                            <option value="WI">WISCONSIN</option>
                                            <option value="WY">WYOMING</option>
                                            <option value="DC">WASHINGTON, DC</option>
                                        </select>
                                    </span>
                                </p>
                                <p class="lessMargin">
                                    <span class="label white">* ZIP Code:</span>
                                    <span class="input-field">
                                    <input type="text" class="required textbox" maxlength="5" id="txtZip" name="txtZip">
                                    </span>
                                </p>
                                <p class="lessMargin">
                                    <span class="label white">* Phone Number:</span>
                                    <span class="input-field">
                                    <input type="text" class="required textbox" maxlength="12" id="txtPhone" name="txtPhone">
                                    </span>
                                </p>
                                <p class="lessMargin">
                                    <span class="label white">* Date Of Birth:</span>
                                    <span class="input-field dob">
                                        <!--
                                            <input type="text" name="dob" id="dob" class="required" readonly="readonly"/>
                                            -->
                                        <select id="birthMonth" name="birthMonth" class="required">
                                            <option value="">MONTH</option>
                                            <option value="1">JANUARY</option>
                                            <option value="2">FEBRUARY</option>
                                            <option value="3">MARCH</option>
                                            <option value="4">APRIL</option>
                                            <option value="5">MAY</option>
                                            <option value="6">JUNE</option>
                                            <option value="7">JULY</option>
                                            <option value="8">AUGUST</option>
                                            <option value="9">SEPTEMBER</option>
                                            <option value="10">OCTOBER</option>
                                            <option value="11">NOVEMBER</option>
                                            <option value="12">DECEMBER</option>
                                        </select>
                                        <select id="birthYear" name="birthYear" class="required">
                                            <option value="">YEAR</option>
                                            <option value="2016">2016</option>
                                            <option value="2015">2015</option>
                                            <option value="2014">2014</option>
                                            <option value="2013">2013</option>
                                            <option value="2012">2012</option>
                                            <option value="2011">2011</option>
                                            <option value="2010">2010</option>
                                            <option value="2009">2009</option>
                                            <option value="2008">2008</option>
                                            <option value="2007">2007</option>
                                            <option value="2006">2006</option>
                                            <option value="2005">2005</option>
                                            <option value="2004">2004</option>
                                            <option value="2003">2003</option>
                                            <option value="2002">2002</option>
                                            <option value="2001">2001</option>
                                            <option value="2000">2000</option>
                                            <option value="1999">1999</option>
                                            <option value="1998">1998</option>
                                            <option value="1997">1997</option>
                                            <option value="1996">1996</option>
                                            <option value="1995">1995</option>
                                            <option value="1994">1994</option>
                                            <option value="1993">1993</option>
                                            <option value="1992">1992</option>
                                            <option value="1991">1991</option>
                                            <option value="1990">1990</option>
                                            <option value="1989">1989</option>
                                            <option value="1988">1988</option>
                                            <option value="1987">1987</option>
                                            <option value="1986">1986</option>
                                            <option value="1985">1985</option>
                                            <option value="1984">1984</option>
                                            <option value="1983">1983</option>
                                            <option value="1982">1982</option>
                                            <option value="1981">1981</option>
                                            <option value="1980">1980</option>
                                            <option value="1979">1979</option>
                                            <option value="1978">1978</option>
                                            <option value="1977">1977</option>
                                            <option value="1976">1976</option>
                                            <option value="1975">1975</option>
                                            <option value="1974">1974</option>
                                            <option value="1973">1973</option>
                                            <option value="1972">1972</option>
                                            <option value="1971">1971</option>
                                            <option value="1970">1970</option>
                                            <option value="1969">1969</option>
                                            <option value="1968">1968</option>
                                            <option value="1967">1967</option>
                                            <option value="1966">1966</option>
                                            <option value="1965">1965</option>
                                            <option value="1964">1964</option>
                                            <option value="1963">1963</option>
                                            <option value="1962">1962</option>
                                            <option value="1961">1961</option>
                                            <option value="1960">1960</option>
                                            <option value="1959">1959</option>
                                            <option value="1958">1958</option>
                                            <option value="1957">1957</option>
                                            <option value="1956">1956</option>
                                            <option value="1955">1955</option>
                                            <option value="1954">1954</option>
                                            <option value="1953">1953</option>
                                            <option value="1952">1952</option>
                                            <option value="1951">1951</option>
                                            <option value="1950">1950</option>
                                            <option value="1949">1949</option>
                                            <option value="1948">1948</option>
                                            <option value="1947">1947</option>
                                            <option value="1946">1946</option>
                                            <option value="1945">1945</option>
                                            <option value="1944">1944</option>
                                            <option value="1943">1943</option>
                                            <option value="1942">1942</option>
                                            <option value="1941">1941</option>
                                            <option value="1940">1940</option>
                                            <option value="1939">1939</option>
                                            <option value="1938">1938</option>
                                            <option value="1937">1937</option>
                                            <option value="1936">1936</option>
                                            <option value="1935">1935</option>
                                            <option value="1934">1934</option>
                                            <option value="1933">1933</option>
                                            <option value="1932">1932</option>
                                            <option value="1931">1931</option>
                                            <option value="1930">1930</option>
                                            <option value="1929">1929</option>
                                            <option value="1928">1928</option>
                                            <option value="1927">1927</option>
                                            <option value="1926">1926</option>
                                            <option value="1925">1925</option>
                                            <option value="1924">1924</option>
                                            <option value="1923">1923</option>
                                            <option value="1922">1922</option>
                                            <option value="1921">1921</option>
                                            <option value="1920">1920</option>
                                            <option value="1919">1919</option>
                                            <option value="1918">1918</option>
                                            <option value="1917">1917</option>
                                            <option value="1916">1916</option>
                                            <option value="1915">1915</option>
                                            <option value="1914">1914</option>
                                            <option value="1913">1913</option>
                                            <option value="1912">1912</option>
                                            <option value="1911">1911</option>
                                            <option value="1910">1910</option>
                                            <option value="1909">1909</option>
                                            <option value="1908">1908</option>
                                            <option value="1907">1907</option>
                                            <option value="1906">1906</option>
                                            <option value="1905">1905</option>
                                            <option value="1904">1904</option>
                                            <option value="1903">1903</option>
                                            <option value="1902">1902</option>
                                            <option value="1901">1901</option>
                                            <option value="1900">1900</option>
                                            <option value="1899">1899</option>
                                            <option value="1898">1898</option>
                                            <option value="1897">1897</option>
                                        </select>
                                        <span id="why-dob-message-icon"><img src="/website/static/contact/dunkinathome/images/icon/why-message.png" /></span>
                                        <span id="birth-month-message"></span>
                                        <span id="birth-year-message"></span>
                                        <span id="age-error" style="padding: 5px 0;display: block;"></span>
                                    </span>
                                </p>
                                <div class="why-message col7" id="why-dob-message">
                                    A SPECIAL NOTE TO PARENTS:<br>We respect the privacy of all of our online users, especially
                                    children.  We do not intend to collect personally identifiable information from children under 13.  Our policy
                                    is intended to adhere to the Children's Advertising Review Unit (CARU) privacy guidelines and the Children's Online
                                    Privacy Protection Act (COPPA).  We encourage parents to monitor, supervise, and join their children in online activities.
                                </div>

                            </div>
                        </div>
                        <p>
                            <button type="button" class="frankfurter-prev button-disable" id="Back"> Previous</button>
                            <button type="button" class="frankfurter-next button-disable" id="Next">Next</button>
                            <button type="button" class="frankfurter-prev button-disable" id="Previous" style="display:none;">Previous</button>
                            <button type="submit" name="submit" class="frankfurter-next button-disable" id="Continue" style="display:none;">Submit</button>
                        </p>
                    </form>
                </section>
                <br class = "clear">
            </div>
        </div>

    </body>

</html>

<script>
$('#errorMsz').fadeOut(5000);


</script>
