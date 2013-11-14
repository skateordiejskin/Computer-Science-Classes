<?php
	require_once("cookieCheck.php")
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<!-- CSS Files -->
   	 		<link rel="stylesheet" type="text/css" href="CSS/SocialMutiny.css" media="screen, projection"  />
   	 		<link rel="stylesheet" type="text/css" href="CSS/index.css" media="screen, projection"  />
			<link rel="stylesheet" type="text/css" href="CSS/header.css" media="screen, projection"  />
			<link rel="stylesheet" type="text/css" href="CSS/footer.css" media="screen, projection"  />
			<link rel="stylesheet" type="text/css" href="CSS/images.css" media="screen, projection"  />
			<script type="text/javascript" src="common/js/form_init.js" data-name="" id="form_init_script"> </script>
   			 <link rel="stylesheet" type="text/css" href="index/theme/default/css/default.css" id="theme" />

			
			<!-- Icon -->
			<link rel="shortcut icon" href="http://joeskinner.me/socialmutiny/favicon.ico">
		<title>Social Mutiny</title>
</head>

<body>
  <form id="docContainer" enctype="multipart/form-data" method="POST" action="userLogin.php" novalidate="novalidate" class="fb-toplabel fb-100-item-column fb-large selected-object" style="background-color: rgb(5, 5, 5); width: 900px; " data-form="automated">
    
      <div id="fb-form-header1" class="fb-form-header" style="min-height: 20px; top: 0px; padding-left: 50px; height: 225px; background-image: url(index/common/images/SocialMutinyLogo.png); background-repeat: no-repeat; ">
      </div>
      
      <div id="section1" class="section fb-100-item-column">
        <div id="column1" class="column ui-sortable">
          
             <div id="item9" class="fb-item fb-50-item-column">
            <div class="fb-grouplabel">
              <label id="item9_label_0" style="color: rgb(0, 255, 60); ">
                Email
              </label>
            </div>
            <div class="fb-input-box">
              <input type="email" id="email" maxlength="254" placeholder="you@domain.com"
              autocomplete="off" data-hint="" name="email" />
            </div>
          </div>
          <div id="item3" class="fb-item fb-50-item-column" style="opacity: 1; ">
            <div class="fb-grouplabel">
              <label id="item3_label_0" style="color: rgb(0, 255, 81); ">
                Password
              </label>
            </div>
            <div class="fb-input-box">
              <input type="password" id="item3_password_1" maxlength="254" placeholder=""
              autocomplete="off" data-hint="" name="password" required/>
            </div>
          </div>
         <label id="item3_label_0" style="color: rgb(0, 255, 81); ">
              Remember me
              </label>
             <input type=checkbox name="rememberMe" id="rememberMe" class="rememberMe" />
        </form>
          <!-- 
              <div id="item4" class="fb-item">
            <div class="fb-sectionbreak">
              <hr style="border-top-width: 1px; border-top-style: solid; width: 800px; ">
            </div>
          </div>
          <div id="item5" class="fb-item" style="height: 50px; opacity: 1; ">
            <div class="fb-spacer">
              <div id="item5_div_0">
              </div>
            </div>
          </div>
          <div id="item6" class="fb-item fb-100-item-column" style="opacity: 1; ">
            <div class="fb-header">
              <h2 style="display: inline; color: rgb(0, 255, 17); ">
                New User
              </h2>
            </div>
          </div>
          <div id="item7" class="fb-item fb-33-item-column" style="opacity: 1; ">
            <div class="fb-grouplabel">
              <label id="item7_label_0" style="display: inline; color: rgb(255, 255, 255); ">
                First Name
              </label>
            </div>
            <div class="fb-input-box">
              <input type="text" id="item7_text_1" maxlength="254" placeholder="" autocomplete="off"
              data-hint="" name="fname" />
            </div>
          </div>
          <div id="item8" class="fb-item fb-33-item-column" style="opacity: 1; ">
            <div class="fb-grouplabel">
              <label id="item8_label_0" style="color: rgb(255, 255, 255); display: inline; ">
                Last Name
              </label>
            </div>
            <div class="fb-input-box">
              <input type="text" id="item8_text_1" maxlength="254" placeholder="" autocomplete="off"
              data-hint="" name="lname" />
            </div>
          </div>
          <div id="item13" class="fb-item fb-100-item-column" style="opacity: 1; ">
            <div class="fb-header">
              <h2 style="display: inline; font-size: 15px; color: rgb(255, 255, 255); ">
                Date of Birth
              </h2>
            </div>
          </div>
          <div id="item12" class="fb-item fb-20-item-column" style="opacity: 1; ">
            <div class="fb-grouplabel">
              <label id="item12_label_0" style="color: rgb(255, 255, 255); display: inline; ">
                Month
              </label>
            </div>
            <div class="fb-dropdown">
              <select id="item12_select_1" data-hint="" name="month">
                <option id="item12_0_option" selected value="January">
                  January
                </option>
                <option id="item12_1_option" value="February">
                  February
                </option>
                <option id="item12_2_option" value="March">
                  March
                </option>
                <option id="item12_3_option" value="April">
                  April
                </option>
                <option id="item12_4_option" value="May">
                  May
                </option>
                <option id="item12_5_option" value="June">
                  June
                </option>
                <option id="item12_6_option" value="July">
                  July
                </option>
                <option id="item12_7_option" value="August">
                  August
                </option>
                <option id="item12_8_option" value="September">
                  September
                </option>
                <option id="item12_9_option" value="October">
                  October
                </option>
                <option id="item12_10_option" value="November">
                  November
                </option>
                <option id="item12_11_option" value="December">
                  December
                </option>
              </select>
            </div>
          </div>
          <div id="item14" class="fb-item fb-20-item-column" style="opacity: 1; ">
            <div class="fb-grouplabel">
              <label id="item14_label_0" style="color: rgb(255, 255, 255); display: inline; ">
                Date
              </label>
            </div>
            <div class="fb-dropdown">
              <select id="item14_select_1" data-hint="" name="date" required>
                <option selected id="item14_0_option" value="">
                  Choose one
                </option>
                <option id="item14_1_option" value="1">
                  1
                </option>
                <option id="item14_2_option" value="2">
                  2
                </option>
                <option id="item14_3_option" value="3">
                  3
                </option>
                <option id="item14_4_option" value="4">
                  4
                </option>
                <option id="item14_5_option" value="5">
                  5
                </option>
                <option id="item14_6_option" value="6">
                  6
                </option>
                <option id="item14_7_option" value="7">
                  7
                </option>
                <option id="item14_8_option" value="8">
                  8
                </option>
                <option id="item14_9_option" value="9">
                  9
                </option>
                <option id="item14_10_option" value="10">
                  10
                </option>
                <option id="item14_11_option" value="11">
                  11
                </option>
                <option id="item14_12_option" value="12">
                  12
                </option>
                <option id="item14_13_option" value="13">
                  13
                </option>
                <option id="item14_14_option" value="14">
                  14
                </option>
                <option id="item14_15_option" value="15">
                  15
                </option>
                <option id="item14_16_option" value="16">
                  16
                </option>
                <option id="item14_17_option" value="17">
                  17
                </option>
                <option id="item14_18_option" value="18">
                  18
                </option>
                <option id="item14_19_option" value="19">
                  19
                </option>
                <option id="item14_20_option" value="20">
                  20
                </option>
                <option id="item14_21_option" value="21">
                  21
                </option>
                <option id="item14_22_option" value="22">
                  22
                </option>
                <option id="item14_23_option" value="23">
                  23
                </option>
                <option id="item14_24_option" value="24">
                  24
                </option>
                <option id="item14_25_option" value="25">
                  25
                </option>
                <option id="item14_26_option" value="26">
                  26
                </option>
                <option id="item14_27_option" value="27">
                  27
                </option>
                <option id="item14_28_option" value="28">
                  28
                </option>
                <option id="item14_29_option" value="29">
                  29
                </option>
                <option id="item14_30_option" value="30">
                  30
                </option>
                <option id="item14_31_option" value="31">
                  31
                </option>
              </select>
            </div>
          </div>
          <div id="item15" class="fb-item fb-20-item-column" style="opacity: 1; ">
            <div class="fb-grouplabel">
              <label id="item15_label_0" style="color: rgb(255, 255, 255); display: inline; ">
                Year
              </label>
            </div>
            <div class="fb-dropdown">
              <select id="item15_select_1" data-hint="" name="year">
                <option id="item15_0_option" selected value="1980">
                  1980
                </option>
                <option id="item15_1_option" value="1981">
                  1981
                </option>
                <option id="item15_2_option" value="1982">
                  1982
                </option>
                <option id="item15_3_option" value="1983">
                  1983
                </option>
                <option id="item15_4_option" value="1984">
                  1984
                </option>
                <option id="item15_5_option" value="1985">
                  1985
                </option>
                <option id="item15_6_option" value="1986">
                  1986
                </option>
                <option id="item15_7_option" value="1987">
                  1987
                </option>
                <option id="item15_8_option" value="1988">
                  1988
                </option>
                <option id="item15_9_option" value="1989">
                  1989
                </option>
                <option id="item15_10_option" value="1990">
                  1990
                </option>
                <option id="item15_11_option" value="1991">
                  1991
                </option>
              </select>
            </div>
          </div>
          <div id="item16" class="fb-item fb-50-item-column" style="opacity: 1; ">
            <div class="fb-grouplabel">
              <label id="item16_label_0" style="color: rgb(252, 252, 252); ">
                Email
              </label>
            </div>
            <div class="fb-input-box">
              <input type="email" id="item16_email_1" maxlength="254" placeholder="you@domain.com"
              autocomplete="off" data-hint="" name="email16" />
            </div>
            <div class="fb-grouplabel">
              <label style="color: rgb(252, 252, 252); ">
                Confirm Email
              </label>
            </div>
            <div class="fb-input-box">
              <input type="email" id="item16_email_1_verification" maxlength="254" placeholder=""
              autocomplete="off" data-hint="" name="email16_verification" />
            </div>
          </div>
          <div id="item18" class="fb-item fb-50-item-column" style="opacity: 1; z-index: 0; ">
            <div class="fb-grouplabel">
              <label id="item18_label_0" style="color: rgb(255, 255, 255); ">
                Password
              </label>
            </div>
            <div class="fb-input-box">
              <input type="password" id="item18_password_1" maxlength="254" placeholder=""
              autocomplete="off" data-hint="" name="password18" />
            </div>
            <div class="fb-grouplabel">
              <label style="color: rgb(255, 255, 255); ">
                Confirm Password
              </label>
            </div>
            <div class="fb-input-box">
              <input type="password" id="item18_password_1_verification" maxlength="254"
              placeholder="" autocomplete="off" data-hint="" name="password18_verification"
              />
            </div>
          </div>
        </div>
      </div>-->
      <div id="fb-submit-button-div" class="fb-item-alignment-left">
        <input type="submit" class="fb-button-special" id="fb-submit-button" style="background-image: url(index/theme/default/images/btn_submit.png); "
        value="Submit" />
      </div>
      <input type="hidden" name="fb_form_custom_html" />
      <input type="hidden" name="fb_form_embedded" />
    </form>
   </div>
  </body>

</html>