<?php

namespace WeTheFuture\User;

use \WeTheFuture\API\ErrorCodes;
use \WeTheFuture\Form\CompletionAction\ConcreteRedirectCompletionAction;
use \WeTheFuture\Form\Field\{AutocompleteValues, SelectField, CaptchaField, CheckboxField, ColorField, ConfirmPasswordField, EmailField, ImageField, PasswordField, StaticHTMLField, TextField};
use \WeTheFuture\Form\Form;
use \WeTheFuture\Secrets;

/**
 * registration form
 */
trait RegisterFormTrait {
	/**
	 * Register form
	 * 
	 * See /Register for form usage
	 * @return Form Form for registering a new user
	 */
	public static function getRegisterForm() : Form {
		$form = new Form();

		$form->setDistinguisher(self::getDistinguisherFromFunctionName(__FUNCTION__)); // get-dash-case from camelCase
		$form->setMethod(Form::POST);
		$form->setEndpoint("internal/register/");
		$form->setButtonText("REGISTER");
		$form->setPrimary(true);

		$completionAction = new ConcreteRedirectCompletionAction();
		$completionAction->setRedirectUrl("Profile");
		$form->setCompletionAction($completionAction);

		$usernameField = new TextField();
		$usernameField->setDistinguisher("username");
		$usernameField->setLabel("Username");
		$usernameField->setRequired(true);
		$usernameField->setMaxLength(64);
		$usernameField->setPattern('^([A-Za-z0-9._-]){2,64}$');
		$usernameField->setHelperText("2-64 characters of letters, numbers, period, dashes, and underscores only.");
		$usernameField->setAutocompleteAttribute(AutocompleteValues::USERNAME);
		$usernameField->addError(90301, ErrorCodes::ERR_90301);
		$usernameField->setMissingErrorCode(90301);
		$usernameField->addError(90302, ErrorCodes::ERR_90302);
		$usernameField->setInvalidErrorCode(90302);
		$usernameField->addError(90303, ErrorCodes::ERR_90303);
		$form->addField($usernameField);

		$nicknameField = new TextField();
		$nicknameField->setDistinguisher("nickname");
		$nicknameField->setLabel("Name");
		$nicknameField->setRequired(false);
		$nicknameField->setMaxLength(100);
		$nicknameField->setPattern('^.{2,100}$');
		$nicknameField->setAutocompleteAttribute(AutocompleteValues::NICKNAME);
		$nicknameField->addError(90304, ErrorCodes::ERR_90304);
		$nicknameField->setMissingErrorCode(90304);
		$nicknameField->addError(90305, ErrorCodes::ERR_90305);
		$nicknameField->setInvalidErrorCode(90305);
		$form->addField($nicknameField);

		$schoolField = new TextField();
		$schoolField->setDistinguisher("school");
		$schoolField->setLabel("School");
		$schoolField->setRequired(false);
		$schoolField->setAutocompleteAttribute(AutocompleteValues::ON);
		$schoolField->addError(90329, ErrorCodes::ERR_90329);
		$schoolField->setMissingErrorCode(90329);
		$schoolField->addError(90330, ErrorCodes::ERR_90330);
		$schoolField->setInvalidErrorCode(90330);
		$form->addField($schoolField);

		$cityField = new TextField();
		$cityField->setDistinguisher("city");
		$cityField->setLabel("City");
		$cityField->setRequired(true);
		$cityField->setAutocompleteAttribute(AutocompleteValues::ON);
		$cityField->addError(90331, ErrorCodes::ERR_90331);
		$cityField->setMissingErrorCode(90331);
		$cityField->addError(90332, ErrorCodes::ERR_90332);
		$cityField->setInvalidErrorCode(90332);
		$form->addField($cityField);

		$stateProvinceField = new SelectField();
		$stateProvinceField->setDistinguisher("state-provinces");
		$stateProvinceField->setLabel("State/Province");
		$stateProvinceField->setRequired(true);
		$stateProvinceField->setOptions([
			["--", "N/A"],
			["AL", "Alabama"],
			["AK", "Alaska"],
			["AZ", "Arizona"],
			["AR", "Arkansas"],
			["CA", "California"],
			["CO", "Colorado"],
			["CT", "Connecticut"],
			["DE", "Delaware"],
			["DC", "District of Columbia"],
			["FL", "Florida"],
			["GA", "Georgia"],
			["HI", "Hawaii"],
			["ID", "Idaho"],
			["IL", "Illinois"],
			["IN", "Indiana"],
			["IA", "Iowa"],
			["KS", "Kansas"],
			["KY", "Kentucky"],
			["LA", "Louisiana"],
			["ME", "Maine"],
			["MD", "Maryland"],
			["MA", "Massachusetts"],
			["MI", "Michigan"],
			["MN", "Minnesota"],
			["MS", "Mississippi"],
			["MO", "Missouri"],
			["MT", "Montana"],
			["NE", "Nebraska"],
			["NV", "Nevada"],
			["NH", "New Hampshire"],
			["NJ", "New Jersey"],
			["NM", "New Mexico"],
			["NY", "New York"],
			["NC", "North Carolina"],
			["ND", "North Dakota"],
			["OH", "Ohio"],
			["OK", "Oklahoma"],
			["OR", "Oregon"],
			["PA", "Pennsylvania"],
			["RI", "Rhode Island"],
			["SC", "South Carolina"],
			["SD", "South Dakota"],
			["TN", "Tennessee"],
			["TX", "Texas"],
			["UT", "Utah"],
			["VT", "Vermont"],
			["VA", "Virginia"],
			["WA", "Washington"],
			["WV", "West Virginia"],
			["WI", "Wisconsin"],
			["WY", "Wyoming"],
			["AB", "Alberta"],
			["BC", "British Columbia"],
			["MB", "Manitoba"],
			["NB", "New Brunswick"],
			["NL", "Newfoundland and Labrador"],
			["NT", "Northwest Territories"],
			["NS", "Nova Scotia"],
			["NU", "Nunavut"],
			["ON", "Ontario"],
			["PE", "Prince Edward Island"],
			["QC", "Québec"],
			["SK", "Saskatchewan"],
			["YT", "Yukon Territory"],
		]);
		$stateProvinceField->addError(90333, ErrorCodes::ERR_90333);
		$stateProvinceField->setMissingErrorCode(90333);
		$stateProvinceField->addError(90334, ErrorCodes::ERR_90334);
		$stateProvinceField->setInvalidErrorCode(90334);
		$form->addField($stateProvinceField);

		$countryField = new SelectField();
		$countryField->setDistinguisher("country");
		$countryField->setLabel("Country");
		$countryField->setRequired(true);
		$countryField->setOptions([
			["United States", "United States"],
			["Canada", "Canada"],
			["Afghanistan", "Afghanistan"],
			["Åland Islands", "Åland Islands"],
			["Albania", "Albania"],
			["Algeria", "Algeria"],
			["American Samoa", "American Samoa"],
			["Andorra", "Andorra"],
			["Angola", "Angola"],
			["Anguilla", "Anguilla"],
			["Antarctica", "Antarctica"],
			["Antigua and Barbuda", "Antigua and Barbuda"],
			["Argentina", "Argentina"],
			["Armenia", "Armenia"],
			["Aruba", "Aruba"],
			["Australia", "Australia"],
			["Austria", "Austria"],
			["Azerbaijan", "Azerbaijan"],
			["Bahamas", "Bahamas"],
			["Bahrain", "Bahrain"],
			["Bangladesh", "Bangladesh"],
			["Barbados", "Barbados"],
			["Belarus", "Belarus"],
			["Belgium", "Belgium"],
			["Belize", "Belize"],
			["Benin", "Benin"],
			["Bermuda", "Bermuda"],
			["Bhutan", "Bhutan"],
			["Plurinational State of Bolivia", "Bolivia, Plurinational State of"],
			["Sint Eustatius and Saba Bonaire", "Bonaire, Sint Eustatius and Saba"],
			["Bosnia and Herzegovina", "Bosnia and Herzegovina"],
			["Botswana", "Botswana"],
			["Bouvet Island", "Bouvet Island"],
			["Brazil", "Brazil"],
			["British Indian Ocean Territory", "British Indian Ocean Territory"],
			["Brunei Darussalam", "Brunei Darussalam"],
			["Bulgaria", "Bulgaria"],
			["Burkina Faso", "Burkina Faso"],
			["Burundi", "Burundi"],
			["Cambodia", "Cambodia"],
			["Cameroon", "Cameroon"],
			["Cape Verde", "Cape Verde"],
			["Cayman Islands", "Cayman Islands"],
			["Central African Republic", "Central African Republic"],
			["Chad", "Chad"],
			["Chile", "Chile"],
			["China", "China"],
			["Christmas Island", "Christmas Island"],
			["Cocos (Keeling) Islands", "Cocos (Keeling) Islands"],
			["Colombia", "Colombia"],
			["Comoros", "Comoros"],
			["Congo", "Congo"],
			["The Democratic Republic of the Congo", "Congo, the Democratic Republic of the"],
			["Cook Islands", "Cook Islands"],
			["Costa Rica", "Costa Rica"],
			["Côte d'Ivoire", "Côte d'Ivoire"],
			["Croatia", "Croatia"],
			["Cuba", "Cuba"],
			["Curaçao", "Curaçao"],
			["Cyprus", "Cyprus"],
			["Czech Republic", "Czech Republic"],
			["Denmark", "Denmark"],
			["Djibouti", "Djibouti"],
			["Dominica", "Dominica"],
			["Dominican Republic", "Dominican Republic"],
			["Ecuador", "Ecuador"],
			["Egypt", "Egypt"],
			["El Salvador", "El Salvador"],
			["Equatorial Guinea", "Equatorial Guinea"],
			["Eritrea", "Eritrea"],
			["Estonia", "Estonia"],
			["Ethiopia", "Ethiopia"],
			["Falkland Islands (Malvinas)", "Falkland Islands (Malvinas)"],
			["Faroe Islands", "Faroe Islands"],
			["Fiji", "Fiji"],
			["Finland", "Finland"],
			["France", "France"],
			["French Guiana", "French Guiana"],
			["French Polynesia", "French Polynesia"],
			["French Southern Territories", "French Southern Territories"],
			["Gabon", "Gabon"],
			["Gambia", "Gambia"],
			["Georgia", "Georgia"],
			["Germany", "Germany"],
			["Ghana", "Ghana"],
			["Gibraltar", "Gibraltar"],
			["Greece", "Greece"],
			["Greenland", "Greenland"],
			["Grenada", "Grenada"],
			["Guadeloupe", "Guadeloupe"],
			["Guam", "Guam"],
			["Guatemala", "Guatemala"],
			["Guernsey", "Guernsey"],
			["Guinea", "Guinea"],
			["Guinea-Bissau", "Guinea-Bissau"],
			["Guyana", "Guyana"],
			["Haiti", "Haiti"],
			["Heard Island and McDonald Islands", "Heard Island and McDonald Islands"],
			["Holy See (Vatican City State)", "Holy See (Vatican City State)"],
			["Honduras", "Honduras"],
			["Hong Kong", "Hong Kong"],
			["Hungary", "Hungary"],
			["Iceland", "Iceland"],
			["India", "India"],
			["Indonesia", "Indonesia"],
			["Islamic Republic of Iran", "Iran, Islamic Republic of"],
			["Iraq", "Iraq"],
			["Ireland", "Ireland"],
			["Isle of Man", "Isle of Man"],
			["Israel", "Israel"],
			["Italy", "Italy"],
			["Jamaica", "Jamaica"],
			["Japan", "Japan"],
			["Jersey", "Jersey"],
			["Jordan", "Jordan"],
			["Kazakhstan", "Kazakhstan"],
			["Kenya", "Kenya"],
			["Kiribati", "Kiribati"],
			["Democratic People's Republic of Korea", "Korea, Democratic People's Republic of"],
			["Republic of of", "Korea, Republic of"],
			["Kuwait", "Kuwait"],
			["Kyrgyzstan", "Kyrgyzstan"],
			["Lao People's Democratic Republic", "Lao People's Democratic Republic"],
			["Latvia", "Latvia"],
			["Lebanon", "Lebanon"],
			["Lesotho", "Lesotho"],
			["Liberia", "Liberia"],
			["Libya", "Libya"],
			["Liechtenstein", "Liechtenstein"],
			["Lithuania", "Lithuania"],
			["Luxembourg", "Luxembourg"],
			["Macao", "Macao"],
			["The former Yugoslav Republic of Macedonia", "Macedonia, the former Yugoslav Republic of"],
			["Madagascar", "Madagascar"],
			["Malawi", "Malawi"],
			["Malaysia", "Malaysia"],
			["Maldives", "Maldives"],
			["Mali", "Mali"],
			["Malta", "Malta"],
			["Marshall Islands", "Marshall Islands"],
			["Martinique", "Martinique"],
			["Mauritania", "Mauritania"],
			["Mauritius", "Mauritius"],
			["Mayotte", "Mayotte"],
			["Mexico", "Mexico"],
			["Federated States of Micronesia", "Micronesia, Federated States of"],
			["Republic of Moldova", "Moldova, Republic of"],
			["Monaco", "Monaco"],
			["Mongolia", "Mongolia"],
			["Montenegro", "Montenegro"],
			["Montserrat", "Montserrat"],
			["Morocco", "Morocco"],
			["Mozambique", "Mozambique"],
			["Myanmar", "Myanmar"],
			["Namibia", "Namibia"],
			["Nauru", "Nauru"],
			["Nepal", "Nepal"],
			["Netherlands", "Netherlands"],
			["New Caledonia", "New Caledonia"],
			["New Zealand", "New Zealand"],
			["Nicaragua", "Nicaragua"],
			["Niger", "Niger"],
			["Nigeria", "Nigeria"],
			["Niue", "Niue"],
			["Norfolk Island", "Norfolk Island"],
			["Northern Mariana Islands", "Northern Mariana Islands"],
			["Norway", "Norway"],
			["Oman", "Oman"],
			["Pakistan", "Pakistan"],
			["Palau", "Palau"],
			["Occupied Palestinian Territory", "Palestinian Territory, Occupied"],
			["Panama", "Panama"],
			["Papua New Guinea", "Papua New Guinea"],
			["Paraguay", "Paraguay"],
			["Peru", "Peru"],
			["Philippines", "Philippines"],
			["Pitcairn", "Pitcairn"],
			["Poland", "Poland"],
			["Portugal", "Portugal"],
			["Puerto Rico", "Puerto Rico"],
			["Qatar", "Qatar"],
			["Réunion", "Réunion"],
			["Romania", "Romania"],
			["Russian Federation", "Russian Federation"],
			["Rwanda", "Rwanda"],
			["Saint Barthélemy", "Saint Barthélemy"],
			["Ascension and Tristan da Cunha Saint Helena", "Saint Helena, Ascension and Tristan da Cunha"],
			["Saint Kitts and Nevis", "Saint Kitts and Nevis"],
			["Saint Lucia", "Saint Lucia"],
			["Saint Martin (French part)", "Saint Martin (French part)"],
			["Saint Pierre and Miquelon", "Saint Pierre and Miquelon"],
			["Saint Vincent and the Grenadines", "Saint Vincent and the Grenadines"],
			["Samoa", "Samoa"],
			["San Marino", "San Marino"],
			["Sao Tome and Principe", "Sao Tome and Principe"],
			["Saudi Arabia", "Saudi Arabia"],
			["Senegal", "Senegal"],
			["Serbia", "Serbia"],
			["Seychelles", "Seychelles"],
			["Sierra Leone", "Sierra Leone"],
			["Singapore", "Singapore"],
			["Sint Maarten (Dutch part)", "Sint Maarten (Dutch part)"],
			["Slovakia", "Slovakia"],
			["Slovenia", "Slovenia"],
			["Solomon Islands", "Solomon Islands"],
			["Somalia", "Somalia"],
			["South Africa", "South Africa"],
			["South Georgia and the South Sandwich Islands", "South Georgia and the South Sandwich Islands"],
			["South Sudan", "South Sudan"],
			["Spain", "Spain"],
			["Sri Lanka", "Sri Lanka"],
			["Sudan", "Sudan"],
			["Suriname", "Suriname"],
			["Svalbard and Jan Mayen", "Svalbard and Jan Mayen"],
			["Swaziland", "Swaziland"],
			["Sweden", "Sweden"],
			["Switzerland", "Switzerland"],
			["Syrian Arab Republic", "Syrian Arab Republic"],
			["Taiwan, Province of China", "Taiwan, Province of China"],
			["Tajikistan", "Tajikistan"],
			["United Republic of Tanzania", "Tanzania, United Republic of"],
			["Thailand", "Thailand"],
			["Timor-Leste", "Timor-Leste"],
			["Togo", "Togo"],
			["Tokelau", "Tokelau"],
			["Tonga", "Tonga"],
			["Trinidad and Tobago", "Trinidad and Tobago"],
			["Tunisia", "Tunisia"],
			["Turkey", "Turkey"],
			["Turkmenistan", "Turkmenistan"],
			["Turks and Caicos Islands", "Turks and Caicos Islands"],
			["Tuvalu", "Tuvalu"],
			["Uganda", "Uganda"],
			["Ukraine", "Ukraine"],
			["United Arab Emirates", "United Arab Emirates"],
			["United Kingdom", "United Kingdom"],
			["United States Minor Outlying Islands", "United States Minor Outlying Islands"],
			["Uruguay", "Uruguay"],
			["Uzbekistan", "Uzbekistan"],
			["Vanuatu", "Vanuatu"],
			["Bolivarian Republic of Venezuela", "Venezuela, Bolivarian Republic of"],
			["Viet Nam", "Viet Nam"],
			["British Virgin Islands", "Virgin Islands, British"],
			["U.S. Virgin Islands", "Virgin Islands, U.S."],
			["Wallis and Futuna", "Wallis and Futuna"],
			["Western Sahara", "Western Sahara"],
			["Yemen", "Yemen"],
			["Zambia", "Zambia"],
			["Zimbabwe", "Zimbabwe"],
		]);
		$countryField->addError(90335, ErrorCodes::ERR_90335);
		$countryField->setMissingErrorCode(90335);
		$countryField->addError(90336, ErrorCodes::ERR_90336);
		$countryField->setInvalidErrorCode(90336);
		$form->addField($countryField);

		$emailField = new EmailField();
		$emailField->setDistinguisher("email");
		$emailField->setLabel("Email");
		$emailField->setRequired(false);
		$emailField->setAutocompleteAttribute(AutocompleteValues::EMAIL);
		$emailField->addError(90306, ErrorCodes::ERR_90306);
		$emailField->setMissingErrorCode(90306);
		$emailField->addError(90307, ErrorCodes::ERR_90307);
		$emailField->setInvalidErrorCode(90307);
		$emailField->addError(90308, ErrorCodes::ERR_90308);
		$form->addField($emailField);

		$passwordField = new PasswordField();
		$passwordField->setDistinguisher("password");
		$passwordField->setLabel("Password");
		$passwordField->setRequired(true);
		$passwordField->setMinLength(8);
		$passwordField->setAutocompleteAttribute(AutocompleteValues::NEW_PASSWORD);
		$passwordField->addError(90309, ErrorCodes::ERR_90309);
		$passwordField->setMissingErrorCode(90309);
		$passwordField->addError(90310, ErrorCodes::ERR_90310);
		$passwordField->setInvalidErrorCode(90310);
		$form->addField($passwordField);

		$passwordMinimumMessage = new StaticHTMLField();
		$passwordMinimumMessage->setHtml('<p class="no-top-margin col s12">Please use at least 8 characters, however, a longer, random generated one is suggested.  You may easily generate one <a target="_blank" tabindex="-1" href="https://passwordsgenerator.net/?length=60&symbols=1&numbers=1&lowercase=1&uppercase=1&similar=0&ambiguous=0&client=1&autoselect=1">here</a>.</p>');
		$form->addField($passwordMinimumMessage);

		$confirmPasswordField = new ConfirmPasswordField();
		$confirmPasswordField->setDistinguisher("confirm-password");
		$confirmPasswordField->setLabel("Confirm Password");
		$confirmPasswordField->setRequired(true);
		$confirmPasswordField->setMinLength(8);
		$confirmPasswordField->setAutocompleteAttribute(AutocompleteValues::NEW_PASSWORD);
		$confirmPasswordField->addError(90311, ErrorCodes::ERR_90311);
		$confirmPasswordField->setMissingErrorCode(90311);
		$confirmPasswordField->addError(90312, ErrorCodes::ERR_90312);
		$confirmPasswordField->setInvalidErrorCode(90312);
		$confirmPasswordField->setLinkedField($passwordField);
		$form->addField($confirmPasswordField);

		$profilePictureField = new ImageField();
		$profilePictureField->setDistinguisher("profile-picture");
		$profilePictureField->setLabel("Profile Picture");
		$profilePictureField->setRequired(false);
		$profilePictureField->setMaxHumanSize('10MB');
		$profilePictureField->setAutocompleteAttribute(AutocompleteValues::PHOTO);
		// these lost some clarity as what means what due to ImageField
		$profilePictureField->addError(90317, ErrorCodes::ERR_90317);
		$profilePictureField->setMissingErrorCode(90317);
		$profilePictureField->addError(90316, ErrorCodes::ERR_90316);
		$profilePictureField->setInvalidErrorCode(90316);
		$profilePictureField->addError(90315, ErrorCodes::ERR_90315);
		$profilePictureField->setTooLargeErrorCode(90315);
		$form->addField($profilePictureField);

		$minimumAgeField = new CheckboxField();
		$minimumAgeField->setDistinguisher("age");
		$minimumAgeField->setLabel("I am above 13 years old, or 16 if I am in the EU");
		$minimumAgeField->setRequired(true);
		$minimumAgeField->addError(90327, ErrorCodes::ERR_90327);
		$minimumAgeField->setMissingErrorCode(90327);
		$minimumAgeField->addError(90328, ErrorCodes::ERR_90328);
		$minimumAgeField->setInvalidErrorCode(90328);
		$form->addField($minimumAgeField);

		$captchaField = new CaptchaField();
		$captchaField->setDistinguisher("captcha");
		$captchaField->setRequired(true);
		$captchaField->setSiteKey("6Lf7A0EUAAAAAM7naF_3NGWGVAxMUK-qPQABEdAl");
		$captchaField->setSecretKey(Secrets::REGISTER_CAPTCHA_SECRET);
		$captchaField->addError(90322, ErrorCodes::ERR_90322);
		$captchaField->setMissingErrorCode(90322);
		$captchaField->addError(90323, ErrorCodes::ERR_90323);
		$captchaField->setInvalidErrorCode(90323);
		$form->addField($captchaField);

		return $form;
	}
}
