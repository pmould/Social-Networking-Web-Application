
<?php 
if (isset($_POST["updatesubmit"]))
{
	$nationality = $_POST['nationality'];
	$currentcountry = $_POST['current_country'];
	$hometown = $_POST['hometown'];
	$currentcity = $_POST['current_city'];
	
	$errorMessage = "";
	if (empty($_POST["nationality"])) {

		$errorMessage .= "<span class=alerts><li> Nationality field cannot be empty</li></span>";
	}
	if (empty($_POST["current_country"])) {

		$errorMessage .= "<span class=alerts><li>Current country field cannot be empty</li></span>";
	}
	if (empty($_POST["hometown"])) {

		$errorMessage .= "<span class=alerts><li> Hometown field cannot be empty</li></span>";
	}
	if (empty($_POST["current_city"])) {
	
		$errorMessage .= "<span class=alerts><li> Hometown field cannot be empty</li></span>";
	}	
	//START SESSION	
	//Querying the database to get the nationlaity name from the given code
	$query = "SELECT nationality_name FROM nationality WHERE nationality='$nationality'";
	$result = mysqli_query($link, $query);
	if(!$result) die ("Database access failed:" . mysqli_error($link));
	elseif (mysqli_num_rows($result))
	$row2 = mysqli_fetch_row($result);
	$nationality_name = $row2[0];
	$_SESSION['nationality_name']  = $row2[0];
	
	//Saving the session varable for hometown
	$_SESSION['hometown']  = $hometown;
	
	//Querying the database to get the country name from the given code
	$query = "SELECT name_en FROM countries WHERE code='$currentcountry'";
	$result = mysqli_query($link, $query);
	if(!$result) die ("Database access failed:" . mysqli_error($link));
	elseif (mysqli_num_rows($result))
	$row3 = mysqli_fetch_row($result);
	$current_country_name = $row3[0];
	$_SESSION['current_country_name']  = $row3[0];
	$_SESSION['current_city'] = $currentcity;
//	echo "$nationality\n$current_country\n$hometown\n";

	if(!empty($errorMessage))
	{
		echo("<p>There was an error with your form:</p>\n");
		echo("<ul>" . $errorMessage . "</ul>\n");
	}

	//Querying a database to Insert the salted username and password into the database
	if (isset($_POST['nationality'])  && isset($_POST['current_country']) && isset($_POST['hometown']) && isset($_POST['current_city']))
	{
		echo "<p class=alerts>Thanks for completing this section of the sign up process</p>";

	$query = "UPDATE users
			 SET nationality='$nationality', current_country = '$currentcountry', hometown = '$hometown', current_city = '$currentcity'
			 WHERE username = '$username'";
	$result = mysqli_query($link, $query);
	if (!$result) die ("Database access failed: " . mysqli_error($link));
	?>

	<?php 
	}
}

mysqli_close($link);


	
	
	
	
?>
<div class="modalContent">

<h1>Origin & Location Profile Update</h1>
<div id="profilethumb">
<?php 
$name ="";
$name .=@ $_SESSION['profilepic'];

if ($name !="")
{
	echo "<img alt='profile picture\' src=\"$uploadDir/$name\">";
}
else
{
	echo "<img alt=\"profile picture\" src=\"images/defaultthumbpic.jpg\">";
}
?>
</div>
<h1 id="test" ></h1>
<p><?php echo @$forename ?>,</p>
<p><span>Thank you for choosing to join Kingdom Connect!</span></p>
<p><span>Please provide the following information to get your KC Profile started.</span></p>
</article>
<div id="profile_fields2">



<form name="upprof" action="userhomepage.php" method="post">
<p><select onblur="validateFields()" onclick="validateFields()" name="nationality" id="nationality" value ="<?php echo $nationality;?>">
<!-- 		onblur="validatFields()"		  -->
<option value="0" selected ="selected">Nationality</option>
<option value="AF">Afghan</option>
<option value="AL">Albanian</option>
<option value="DZ">Algerian</option>
<option value="US">American</option>
<option value="AS">American Samoan</option>
<option value="AD">Andorran</option>
<option value="AO">Angolan</option>
<option value="AI">Anguillan</option>
<option value="AQ">Antarctican</option>
<option value="AG">Antigua and Barbuda national</option>
<option value="AN">Antillean</option>
<option value="AR">Argentinian</option>
<option value="AM">Armenian</option>
<option value="AW">Aruban</option>
<option value="AU">Australian</option>
<option value="AT">Austrian</option>
<option value="AZ">Azerbaijani</option>
<option value="BS">Bahamian</option>
<option value="BH">Bahraini</option>
<option value="BD">Bangladeshi</option>
<option value="BB">Barbadian</option>
<option value="LS">Basotho</option>
<option value="BY">Belarusian</option>
<option value="BE">Belgian</option>
<option value="BZ">Belizean</option>
<option value="BJ">Beninese</option>
<option value="BM">Bermudian</option>
<option value="BT">Bhutanese</option>
<option value="BO">Bolivian</option>
<option value="BA">Bosnia and Herzegovina national</option>
<option value="BW">Botswanan</option>
<option value="BV">Bouvet Island</option>
<option value="BR">Brazilian</option>
<option value="IO">British Indian Ocean Territory</option>
<option value="VG">British Virgin Islander</option>
<option value="UK">Briton</option>
<option value="BN">Bruneian</option>
<option value="BG">Bulgarian</option>
<option value="BF">Burkinabe</option>
<option value="MM">Burmese</option>
<option value="BI">Burundian</option>
<option value="KH">Cambodian</option>
<option value="CM">Cameroonian</option>
<option value="CA">Canadian</option>
<option value="CV">Cape Verdean</option>
<option value="KY">Caymanian</option>
<option value="CF">Central African</option>
<option value="TD">Chadian</option>
<option value="CL">Chilean</option>
<option value="CN">Chinese</option>
<option value="CX">Christmas Islander</option>
<option value="CC">Cocos Islander</option>
<option value="CO">Colombian</option>
<option value="KM">Comorian</option>
<option value="CG">Congolese</option>
<option value="CD">Congolese</option>
<option value="CK">Cook Islander</option>
<option value="CR">Costa Rican</option>
<option value="HR">Croat</option>
<option value="CU">Cuban</option>
<option value="CY">Cypriot</option>
<option value="CZ">Czech</option>
<option value="DK">Dane</option>
<option value="DJ">Djiboutian</option>
<option value="DO">Dominican</option>
<option value="DM">Dominican</option>
<option value="TL">East Timorese</option>
<option value="EC">Ecuadorian</option>
<option value="EG">Egyptian</option>
<option value="AE">Emirian</option>
<option value="GQ">Equatorial Guinean</option>
<option value="ER">Eritrean</option>
<option value="EE">Estonian</option>
<option value="ET">Ethiopian</option>
<option value="FO">Faeroese</option>
<option value="FK">Falkland Islander</option>
<option value="FJ">Fiji Islander</option>
<option value="PH">Filipino</option>
<option value="FI">Finn</option>
<option value="FR">French</option>
<option value="TF">French Southern Territories</option>
<option value="GA">Gabonese</option>
<option value="GM">Gambian</option>
<option value="GE">Georgian</option>
<option value="DE">German</option>
<option value="GH">Ghanaian</option>
<option value="GI">Gibraltarian</option>
<option value="GR">Greek</option>
<option value="GL">Greenlander</option>
<option value="GD">Grenadian</option>
<option value="GP">Guadeloupean</option>
<option value="GU">Guamanian</option>
<option value="GT">Guatemalan</option>
<option value="GF">Guianese</option>
<option value="GW">Guinea-Bissau national</option>
<option value="GN">Guinean</option>
<option value="GY">Guyanese</option>
<option value="HT">Haitian</option>
<option value="HM">Heard Island and McDonald Islands</option>
<option value="HN">Honduran</option>
<option value="HK">Hong Kong Chinese</option>
<option value="HU">Hungarian</option>
<option value="IS">Icelander</option>
<option value="IN">Indian</option>
<option value="ID">Indonesian</option>
<option value="IR">Iranian</option>
<option value="IQ">Iraqi</option>
<option value="IE">Irish</option>
<option value="IL">Israeli</option>
<option value="IT">Italian</option>
<option value="CI">Ivorian</option>
<option value="JM">Jamaican</option>
<option value="JP">Japanese</option>
<option value="JO">Jordanian</option>
<option value="KZ">Kazakh</option>
<option value="KE">Kenyan</option>
<option value="KI">Kiribatian</option>
<option value="KW">Kuwaiti</option>
<option value="KG">Kyrgyz</option>
<option value="LA">Lao</option>
<option value="LV">Latvian</option>
<option value="LB">Lebanese</option>
<option value="LR">Liberian</option>
<option value="LY">Libyan</option>
<option value="LI">Liechtensteiner</option>
<option value="LT">Lithuanian</option>
<option value="LU">Luxembourger</option>
<option value="MO">Macanese</option>
<option value="MK">Macedonian</option>
<option value="YT">Mahorais</option>
<option value="MG">Malagasy</option>
<option value="MW">Malawian</option>
<option value="MY">Malaysian</option>
<option value="MV">Maldivian</option>
<option value="ML">Malian</option>
<option value="MT">Maltese</option>
<option value="MH">Marshallese</option>
<option value="MQ">Martinican</option>
<option value="MR">Mauritanian</option>
<option value="MU">Mauritian</option>
<option value="MX">Mexican</option>
<option value="FM">Micronesian</option>
<option value="MD">Moldovan</option>
<option value="MC">Monegasque</option>
<option value="MN">Mongolian</option>
<option value="ME">Montenegrian</option>
<option value="MS">Montserratian</option>
<option value="MA">Moroccan</option>
<option value="MZ">Mozambican</option>
<option value="NA">Namibian</option>
<option value="NR">Nauruan</option>
<option value="NP">Nepalese</option>
<option value="NL">Netherlander</option>
<option value="NC">New Caledonian</option>
<option value="NZ">New Zealander</option>
<option value="NI">Nicaraguan</option>
<option value="NG">Nigerian</option>
<option value="NE">Nigerien</option>
<option value="NU">Niuean</option>
<option value="NF">Norfolk Islander</option>
<option value="KP">North Korean</option>
<option value="MP">Northern Mariana Islander</option>
<option value="NO">Norwegian</option>
<option value="OM">Omani</option>
<option value="PK">Pakistani</option>
<option value="PW">Palauan</option>
<option value="PA">Panamanian</option>
<option value="PG">Papua New Guinean</option>
<option value="PY">Paraguayan</option>
<option value="PE">Peruvian</option>
<option value="PN">Pitcairner</option>
<option value="PL">Pole</option>
<option value="PF">Polynesian</option>
<option value="PT">Portuguese</option>
<option value="PR">Puerto Rican</option>
<option value="QA">Qatari</option>
<option value="RE">Reunionese</option>
<option value="RO">Romanian</option>
<option value="RU">Russian</option>
<option value="RW">Rwandan</option>
<option value="EH">Sahrawi</option>
<option value="SH">Saint Helenian</option>
<option value="KN">Saint Kitts and Nevis national</option>
<option value="LC">Saint Lucian</option>
<option value="PM">Saint Pierre and Miquelon national</option>
<option value="SV">Salvadorian</option>
<option value="WS">Samoan</option>
<option value="SM">San Marinese</option>
<option value="ST">São Toméan</option>
<option value="SA">Saudi Arabian</option>
<option value="SN">Senegalese</option>
<option value="RS">Serbian</option>
<option value="SC">Seychellois</option>
<option value="SL">Sierra Leonean</option>
<option value="SG">Singaporean</option>
<option value="SK">Slovak</option>
<option value="SI">Slovene</option>
<option value="SB">Solomon Islander</option>
<option value="SO">Somali</option>
<option value="ZA">South African</option>
<option value="GS">South Georgia and the South Sandwich Islands</option>
<option value="KR">South Korean</option>
<option value="ES">Spaniard</option>
<option value="LK">Sri Lankan</option>
<option value="SD">Sudanese</option>
<option value="SR">Surinamer</option>
<option value="SJ">Svalbard and Jan Mayen</option>
<option value="SZ">Swazi</option>
<option value="SE">Swede</option>
<option value="CH">Swiss</option>
<option value="SY">Syrian</option>
<option value="TW">Taiwanese</option>
<option value="TJ">Tajik</option>
<option value="TZ">Tanzanian</option>
<option value="TH">Thai</option>
<option value="TG">Togolese</option>
<option value="TK">Tokelauan</option>
<option value="TO">Tongan</option>
<option value="TT">Trinidad and Tobago national</option>
<option value="TN">Tunisian</option>
<option value="TR">Turk</option>
<option value="TM">Turkmen</option>
<option value="TC">Turks and Caicos Islander</option>
<option value="TV">Tuvaluan</option>
<option value="UG">Ugandan</option>
<option value="UA">Ukrainian</option>
<option value="UM">United States Minor Outlying Islands</option>
<option value="UY">Uruguayan</option>
<option value="VI">US Virgin Islander</option>
<option value="UZ">Uzbek</option>
<option value="VU">Vanuatuan</option>
<option value="VA">Vatican</option>
<option value="VE">Venezuelan</option>
<option value="VN">Vietnamese</option>
<option value="VC">Vincentian</option>
<option value="WF">Wallis and Futuna Islander</option>
<option value="YE">Yemeni</option>
<option value="ZM">Zambian</option>
<option value="ZW">Zimbabwean</option>
<option value="AX">Åland Islander</option>
</select> </p>

<p><input onblur="validateFields()" onclick="validateFields()" id="ht" name="hometown" type="text" value =""  placeholder="Home Town"></p>

<p><select onblur="validateFields()" onclick="validateFields()" name="current_country" id="country_country" value ="<?php echo $current_country;?>">
    <option value="0" label="Current Country " selected="selected">Select a country ... </option>
    <option value="AF" label="Afghanistan">Afghanistan</option>
    <option value="AL" label="Albania">Albania</option>
    <option value="DZ" label="Algeria">Algeria</option>
    <option value="AS" label="American Samoa">American Samoa</option>
    <option value="AD" label="Andorra">Andorra</option>
    <option value="AO" label="Angola">Angola</option>
    <option value="AI" label="Anguilla">Anguilla</option>
    <option value="AQ" label="Antarctica">Antarctica</option>
    <option value="AG" label="Antigua and Barbuda">Antigua and Barbuda</option>
    <option value="AR" label="Argentina">Argentina</option>
    <option value="AM" label="Armenia">Armenia</option>
    <option value="AW" label="Aruba">Aruba</option>
    <option value="AU" label="Australia">Australia</option>
    <option value="AT" label="Austria">Austria</option>
    <option value="AZ" label="Azerbaijan">Azerbaijan</option>
    <option value="BS" label="Bahamas">Bahamas</option>
    <option value="BH" label="Bahrain">Bahrain</option>
    <option value="BD" label="Bangladesh">Bangladesh</option>
    <option value="BB" label="Barbados">Barbados</option>
    <option value="BY" label="Belarus">Belarus</option>
    <option value="BE" label="Belgium">Belgium</option>
    <option value="BZ" label="Belize">Belize</option>
    <option value="BJ" label="Benin">Benin</option>
    <option value="BM" label="Bermuda">Bermuda</option>
    <option value="BT" label="Bhutan">Bhutan</option>
    <option value="BO" label="Bolivia">Bolivia</option>
    <option value="BA" label="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
    <option value="BW" label="Botswana">Botswana</option>
    <option value="BV" label="Bouvet Island">Bouvet Island</option>
    <option value="BR" label="Brazil">Brazil</option>
    <option value="BQ" label="British Antarctic Territory">British Antarctic Territory</option>
    <option value="IO" label="British Indian Ocean Territory">British Indian Ocean Territory</option>
    <option value="VG" label="British Virgin Islands">British Virgin Islands</option>
    <option value="BN" label="Brunei">Brunei</option>
    <option value="BG" label="Bulgaria">Bulgaria</option>
    <option value="BF" label="Burkina Faso">Burkina Faso</option>
    <option value="BI" label="Burundi">Burundi</option>
    <option value="KH" label="Cambodia">Cambodia</option>
    <option value="CM" label="Cameroon">Cameroon</option>
    <option value="CA" label="Canada">Canada</option>
    <option value="CT" label="Canton and Enderbury Islands">Canton and Enderbury Islands</option>
    <option value="CV" label="Cape Verde">Cape Verde</option>
    <option value="KY" label="Cayman Islands">Cayman Islands</option>
    <option value="CF" label="Central African Republic">Central African Republic</option>
    <option value="TD" label="Chad">Chad</option>
    <option value="CL" label="Chile">Chile</option>
    <option value="CN" label="China">China</option>
    <option value="CX" label="Christmas Island">Christmas Island</option>
    <option value="CC" label="Cocos [Keeling] Islands">Cocos [Keeling] Islands</option>
    <option value="CO" label="Colombia">Colombia</option>
    <option value="KM" label="Comoros">Comoros</option>
    <option value="CG" label="Congo - Brazzaville">Congo - Brazzaville</option>
    <option value="CD" label="Congo - Kinshasa">Congo - Kinshasa</option>
    <option value="CK" label="Cook Islands">Cook Islands</option>
    <option value="CR" label="Costa Rica">Costa Rica</option>
    <option value="HR" label="Croatia">Croatia</option>
    <option value="CU" label="Cuba">Cuba</option>
    <option value="CY" label="Cyprus">Cyprus</option>
    <option value="CZ" label="Czech Republic">Czech Republic</option>
    <option value="CI" label="Côte d’Ivoire">Côte d’Ivoire</option>
    <option value="DK" label="Denmark">Denmark</option>
    <option value="DJ" label="Djibouti">Djibouti</option>
    <option value="DM" label="Dominica">Dominica</option>
    <option value="DO" label="Dominican Republic">Dominican Republic</option>
    <option value="NQ" label="Dronning Maud Land">Dronning Maud Land</option>
    <option value="DD" label="East Germany">East Germany</option>
    <option value="EC" label="Ecuador">Ecuador</option>
    <option value="EG" label="Egypt">Egypt</option>
    <option value="SV" label="El Salvador">El Salvador</option>
    <option value="GQ" label="Equatorial Guinea">Equatorial Guinea</option>
    <option value="ER" label="Eritrea">Eritrea</option>
    <option value="EE" label="Estonia">Estonia</option>
    <option value="ET" label="Ethiopia">Ethiopia</option>
    <option value="FK" label="Falkland Islands">Falkland Islands</option>
    <option value="FO" label="Faroe Islands">Faroe Islands</option>
    <option value="FJ" label="Fiji">Fiji</option>
    <option value="FI" label="Finland">Finland</option>
    <option value="FR" label="France">France</option>
    <option value="GF" label="French Guiana">French Guiana</option>
    <option value="PF" label="French Polynesia">French Polynesia</option>
    <option value="TF" label="French Southern Territories">French Southern Territories</option>
    <option value="FQ" label="French Southern and Antarctic Territories">French Southern and Antarctic Territories</option>
    <option value="GA" label="Gabon">Gabon</option>
    <option value="GM" label="Gambia">Gambia</option>
    <option value="GE" label="Georgia">Georgia</option>
    <option value="DE" label="Germany">Germany</option>
    <option value="GH" label="Ghana">Ghana</option>
    <option value="GI" label="Gibraltar">Gibraltar</option>
    <option value="GR" label="Greece">Greece</option>
    <option value="GL" label="Greenland">Greenland</option>
    <option value="GD" label="Grenada">Grenada</option>
    <option value="GP" label="Guadeloupe">Guadeloupe</option>
    <option value="GU" label="Guam">Guam</option>
    <option value="GT" label="Guatemala">Guatemala</option>
    <option value="GG" label="Guernsey">Guernsey</option>
    <option value="GN" label="Guinea">Guinea</option>
    <option value="GW" label="Guinea-Bissau">Guinea-Bissau</option>
    <option value="GY" label="Guyana">Guyana</option>
    <option value="HT" label="Haiti">Haiti</option>
    <option value="HM" label="Heard Island and McDonald Islands">Heard Island and McDonald Islands</option>
    <option value="HN" label="Honduras">Honduras</option>
    <option value="HK" label="Hong Kong SAR China">Hong Kong SAR China</option>
    <option value="HU" label="Hungary">Hungary</option>
    <option value="IS" label="Iceland">Iceland</option>
    <option value="IN" label="India">India</option>
    <option value="ID" label="Indonesia">Indonesia</option>
    <option value="IR" label="Iran">Iran</option>
    <option value="IQ" label="Iraq">Iraq</option>
    <option value="IE" label="Ireland">Ireland</option>
    <option value="IM" label="Isle of Man">Isle of Man</option>
    <option value="IL" label="Israel">Israel</option>
    <option value="IT" label="Italy">Italy</option>
    <option value="JM" label="Jamaica">Jamaica</option>
    <option value="JP" label="Japan">Japan</option>
    <option value="JE" label="Jersey">Jersey</option>
    <option value="JT" label="Johnston Island">Johnston Island</option>
    <option value="JO" label="Jordan">Jordan</option>
    <option value="KZ" label="Kazakhstan">Kazakhstan</option>
    <option value="KE" label="Kenya">Kenya</option>
    <option value="KI" label="Kiribati">Kiribati</option>
    <option value="KW" label="Kuwait">Kuwait</option>
    <option value="KG" label="Kyrgyzstan">Kyrgyzstan</option>
    <option value="LA" label="Laos">Laos</option>
    <option value="LV" label="Latvia">Latvia</option>
    <option value="LB" label="Lebanon">Lebanon</option>
    <option value="LS" label="Lesotho">Lesotho</option>
    <option value="LR" label="Liberia">Liberia</option>
    <option value="LY" label="Libya">Libya</option>
    <option value="LI" label="Liechtenstein">Liechtenstein</option>
    <option value="LT" label="Lithuania">Lithuania</option>
    <option value="LU" label="Luxembourg">Luxembourg</option>
    <option value="MO" label="Macau SAR China">Macau SAR China</option>
    <option value="MK" label="Macedonia">Macedonia</option>
    <option value="MG" label="Madagascar">Madagascar</option>
    <option value="MW" label="Malawi">Malawi</option>
    <option value="MY" label="Malaysia">Malaysia</option>
    <option value="MV" label="Maldives">Maldives</option>
    <option value="ML" label="Mali">Mali</option>
    <option value="MT" label="Malta">Malta</option>
    <option value="MH" label="Marshall Islands">Marshall Islands</option>
    <option value="MQ" label="Martinique">Martinique</option>
    <option value="MR" label="Mauritania">Mauritania</option>
    <option value="MU" label="Mauritius">Mauritius</option>
    <option value="YT" label="Mayotte">Mayotte</option>
    <option value="FX" label="Metropolitan France">Metropolitan France</option>
    <option value="MX" label="Mexico">Mexico</option>
    <option value="FM" label="Micronesia">Micronesia</option>
    <option value="MI" label="Midway Islands">Midway Islands</option>
    <option value="MD" label="Moldova">Moldova</option>
    <option value="MC" label="Monaco">Monaco</option>
    <option value="MN" label="Mongolia">Mongolia</option>
    <option value="ME" label="Montenegro">Montenegro</option>
    <option value="MS" label="Montserrat">Montserrat</option>
    <option value="MA" label="Morocco">Morocco</option>
    <option value="MZ" label="Mozambique">Mozambique</option>
    <option value="MM" label="Myanmar [Burma]">Myanmar [Burma]</option>
    <option value="NA" label="Namibia">Namibia</option>
    <option value="NR" label="Nauru">Nauru</option>
    <option value="NP" label="Nepal">Nepal</option>
    <option value="NL" label="Netherlands">Netherlands</option>
    <option value="AN" label="Netherlands Antilles">Netherlands Antilles</option>
    <option value="NT" label="Neutral Zone">Neutral Zone</option>
    <option value="NC" label="New Caledonia">New Caledonia</option>
    <option value="NZ" label="New Zealand">New Zealand</option>
    <option value="NI" label="Nicaragua">Nicaragua</option>
    <option value="NE" label="Niger">Niger</option>
    <option value="NG" label="Nigeria">Nigeria</option>
    <option value="NU" label="Niue">Niue</option>
    <option value="NF" label="Norfolk Island">Norfolk Island</option>
    <option value="KP" label="North Korea">North Korea</option>
    <option value="VD" label="North Vietnam">North Vietnam</option>
    <option value="MP" label="Northern Mariana Islands">Northern Mariana Islands</option>
    <option value="NO" label="Norway">Norway</option>
    <option value="OM" label="Oman">Oman</option>
    <option value="PC" label="Pacific Islands Trust Territory">Pacific Islands Trust Territory</option>
    <option value="PK" label="Pakistan">Pakistan</option>
    <option value="PW" label="Palau">Palau</option>
    <option value="PS" label="Palestinian Territories">Palestinian Territories</option>
    <option value="PA" label="Panama">Panama</option>
    <option value="PZ" label="Panama Canal Zone">Panama Canal Zone</option>
    <option value="PG" label="Papua New Guinea">Papua New Guinea</option>
    <option value="PY" label="Paraguay">Paraguay</option>
    <option value="YD" label="People's Democratic Republic of Yemen">People's Democratic Republic of Yemen</option>
    <option value="PE" label="Peru">Peru</option>
    <option value="PH" label="Philippines">Philippines</option>
    <option value="PN" label="Pitcairn Islands">Pitcairn Islands</option>
    <option value="PL" label="Poland">Poland</option>
    <option value="PT" label="Portugal">Portugal</option>
    <option value="PR" label="Puerto Rico">Puerto Rico</option>
    <option value="QA" label="Qatar">Qatar</option>
    <option value="RO" label="Romania">Romania</option>
    <option value="RU" label="Russia">Russia</option>
    <option value="RW" label="Rwanda">Rwanda</option>
    <option value="RE" label="Réunion">Réunion</option>
    <option value="BL" label="Saint Barthélemy">Saint Barthélemy</option>
    <option value="SH" label="Saint Helena">Saint Helena</option>
    <option value="KN" label="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
    <option value="LC" label="Saint Lucia">Saint Lucia</option>
    <option value="MF" label="Saint Martin">Saint Martin</option>
    <option value="PM" label="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
    <option value="VC" label="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
    <option value="WS" label="Samoa">Samoa</option>
    <option value="SM" label="San Marino">San Marino</option>
    <option value="SA" label="Saudi Arabia">Saudi Arabia</option>
    <option value="SN" label="Senegal">Senegal</option>
    <option value="RS" label="Serbia">Serbia</option>
    <option value="CS" label="Serbia and Montenegro">Serbia and Montenegro</option>
    <option value="SC" label="Seychelles">Seychelles</option>
    <option value="SL" label="Sierra Leone">Sierra Leone</option>
    <option value="SG" label="Singapore">Singapore</option>
    <option value="SK" label="Slovakia">Slovakia</option>
    <option value="SI" label="Slovenia">Slovenia</option>
    <option value="SB" label="Solomon Islands">Solomon Islands</option>
    <option value="SO" label="Somalia">Somalia</option>
    <option value="ZA" label="South Africa">South Africa</option>
    <option value="GS" label="South Georgia and the South Sandwich Islands">South Georgia and the South Sandwich Islands</option>
    <option value="KR" label="South Korea">South Korea</option>
    <option value="ES" label="Spain">Spain</option>
    <option value="LK" label="Sri Lanka">Sri Lanka</option>
    <option value="SD" label="Sudan">Sudan</option>
    <option value="SR" label="Suriname">Suriname</option>
    <option value="SJ" label="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
    <option value="SZ" label="Swaziland">Swaziland</option>
    <option value="SE" label="Sweden">Sweden</option>
    <option value="CH" label="Switzerland">Switzerland</option>
    <option value="SY" label="Syria">Syria</option>
    <option value="ST" label="São Tomé and Príncipe">São Tomé and Príncipe</option>
    <option value="TW" label="Taiwan">Taiwan</option>
    <option value="TJ" label="Tajikistan">Tajikistan</option>
    <option value="TZ" label="Tanzania">Tanzania</option>
    <option value="TH" label="Thailand">Thailand</option>
    <option value="TL" label="Timor-Leste">Timor-Leste</option>
    <option value="TG" label="Togo">Togo</option>
    <option value="TK" label="Tokelau">Tokelau</option>
    <option value="TO" label="Tonga">Tonga</option>
    <option value="TT" label="Trinidad and Tobago">Trinidad and Tobago</option>
    <option value="TN" label="Tunisia">Tunisia</option>
    <option value="TR" label="Turkey">Turkey</option>
    <option value="TM" label="Turkmenistan">Turkmenistan</option>
    <option value="TC" label="Turks and Caicos Islands">Turks and Caicos Islands</option>
    <option value="TV" label="Tuvalu">Tuvalu</option>
    <option value="UM" label="U.S. Minor Outlying Islands">U.S. Minor Outlying Islands</option>
    <option value="PU" label="U.S. Miscellaneous Pacific Islands">U.S. Miscellaneous Pacific Islands</option>
    <option value="VI" label="U.S. Virgin Islands">U.S. Virgin Islands</option>
    <option value="UG" label="Uganda">Uganda</option>
    <option value="UA" label="Ukraine">Ukraine</option>
    <option value="SU" label="Union of Soviet Socialist Republics">Union of Soviet Socialist Republics</option>
    <option value="AE" label="United Arab Emirates">United Arab Emirates</option>
    <option value="GB" label="United Kingdom">United Kingdom</option>
    <option value="US" label="United States">United States</option>
    <option value="ZZ" label="Unknown or Invalid Region">Unknown or Invalid Region</option>
    <option value="UY" label="Uruguay">Uruguay</option>
    <option value="UZ" label="Uzbekistan">Uzbekistan</option>
    <option value="VU" label="Vanuatu">Vanuatu</option>
    <option value="VA" label="Vatican City">Vatican City</option>
    <option value="VE" label="Venezuela">Venezuela</option>
    <option value="VN" label="Vietnam">Vietnam</option>
    <option value="WK" label="Wake Island">Wake Island</option>
    <option value="WF" label="Wallis and Futuna">Wallis and Futuna</option>
    <option value="EH" label="Western Sahara">Western Sahara</option>
    <option value="YE" label="Yemen">Yemen</option>
    <option value="ZM" label="Zambia">Zambia</option>
    <option value="ZW" label="Zimbabwe">Zimbabwe</option>
    <option value="AX" label="Åland Islands">Åland Islands</option>
</select></p>
<?php include 'citiesselection.php';?>
 <p><select onblur="validateFields()" onclick="validateFields()" name="current_city" id="country_city" value ="<?php echo $current_country;?>">
 <?php 
 foreach ($data as $value)
 {
 	if ($value=="Current City")
 	{
 		echo "<option value=\""."0"."\""."label=\"".$value."\""."selected=\"selected\"".">".$value."</option>";
 	}
 }
 foreach ($data as $value)
 {
 	if ($value!="Current City")
 	{
 		echo "<option value=\"".$value."\""."label=\"".$value."\">".$value."</option>";
 	}
 }
?> 
</select></p>




	<p><input  type="submit" value="Next" name="updatesubmit"></p>
	</form>
</div>
</div>


