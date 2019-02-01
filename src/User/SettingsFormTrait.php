<?php

namespace WeTheFuture\User;

use \WeTheFuture\API\ErrorCodes;
use \WeTheFuture\Form\CompletionAction\{ConcreteRedirectCompletionAction, ConditionalCompletionAction};
use \WeTheFuture\Form\Field\{AutocompleteValues, CaptchaField, CheckboxField, ColorField, ConfirmPasswordField, EmailField, ImageField, PasswordField, StaticHTMLField, SelectField, TextField};
use \WeTheFuture\Form\Form;
use \WeTheFuture\Secrets;

/**
 * settings form
 */
trait SettingsFormTrait {
	/**
	 * Settings form
	 * 
	 * See /Settings for form usage
	 * 
	 * @param User $user User to edit settings for
	 * Used to pre-fill field values.  We don't use session directly as there's no reason to interrogate the database for like JS
	 * @return Form Form for editing a user's settings
	 */
	public static function getSettingsForm(?User $user=null) : Form {
		$form = new Form();

		$form->setDistinguisher(self::getDistinguisherFromFunctionName(__FUNCTION__)); // get-dash-case from camelCase
		$form->setMethod(Form::POST);
		$form->setEndpoint("internal/settings/");
		$form->setButtonText("SAVE");
		$form->setPrimary(true);

		$completionAction = new ConditionalCompletionAction();
		$completionAction->addCondition('data.data["redirect_to_totp"] == true', new ConcreteRedirectCompletionAction("Settings/TOTP"));
		$completionAction->setElse(new ConcreteRedirectCompletionAction("Profile"));
		$form->setCompletionAction($completionAction);

		$usernameField = new TextField();
		$usernameField->setDistinguisher("username");
		$usernameField->setLabel("Username");
		$usernameField->setRequired(true);
		$usernameField->setMaxLength(64);
		$usernameField->setPattern('^([A-Za-z0-9._-]){2,64}$');
		$usernameField->setHelperText("2-64 characters of letters, numbers, period, dashes, and underscores only.");
		$usernameField->setAutocompleteAttribute(AutocompleteValues::USERNAME);
		$usernameField->addError(90501, ErrorCodes::ERR_90501);
		$usernameField->setMissingErrorCode(90501);
		$usernameField->addError(90502, ErrorCodes::ERR_90502);
		$usernameField->setInvalidErrorCode(90502);
		$usernameField->addError(90503, ErrorCodes::ERR_90503);
		if (!is_null($user)) {
			$usernameField->setPrefilledValue($user->getUsername());
		}
		$form->addField($usernameField);

		$nicknameField = new TextField();
		$nicknameField->setDistinguisher("nickname");
		$nicknameField->setLabel("Name");
		$nicknameField->setRequired(false);
		$nicknameField->setMaxLength(100);
		$nicknameField->setPattern('^.{2,100}$');
		$nicknameField->setAutocompleteAttribute(AutocompleteValues::NICKNAME);
		$nicknameField->addError(90504, ErrorCodes::ERR_90504);
		$nicknameField->setMissingErrorCode(90504);
		$nicknameField->addError(90505, ErrorCodes::ERR_90505);
		$nicknameField->setInvalidErrorCode(90505);
		if (!is_null($user)) {
			$nicknameField->setPrefilledValue($user->getNickname());
		}
		$form->addField($nicknameField);

		$schoolField = new TextField();
		$schoolField->setDistinguisher("school");
		$schoolField->setLabel("School");
		$schoolField->setRequired(false);
		$schoolField->setAutocompleteAttribute(AutocompleteValues::ON);
		$schoolField->addError(90529, ErrorCodes::ERR_90529);
		$schoolField->setMissingErrorCode(90529);
		$schoolField->addError(90530, ErrorCodes::ERR_90530);
		$schoolField->setInvalidErrorCode(90530);
		if (!is_null($user)) {
			$schoolField->setPrefilledValue($user->getSchool());
		}
		$form->addField($schoolField);

		$cityField = new TextField();
		$cityField->setDistinguisher("city");
		$cityField->setLabel("City");
		$cityField->setRequired(true);
		$cityField->setAutocompleteAttribute(AutocompleteValues::ON);
		$cityField->addError(90531, ErrorCodes::ERR_90531);
		$cityField->setMissingErrorCode(90531);
		$cityField->addError(90532, ErrorCodes::ERR_90532);
		$cityField->setInvalidErrorCode(90532);
		if (!is_null($user)) {
			$cityField->setPrefilledValue($user->getCity());
		}
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
		$stateProvinceField->addError(90533, ErrorCodes::ERR_90533);
		$stateProvinceField->setMissingErrorCode(90533);
		$stateProvinceField->addError(90534, ErrorCodes::ERR_90534);
		$stateProvinceField->setInvalidErrorCode(90534);
		if (!is_null($user)) {
			$stateProvinceField->setPrefilledValue($user->getStateProvince());
		}
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
		$countryField->addError(90535, ErrorCodes::ERR_90535);
		$countryField->setMissingErrorCode(90535);
		$countryField->addError(90536, ErrorCodes::ERR_90536);
		$countryField->setInvalidErrorCode(90536);
		if (!is_null($user)) {
			$countryField->setPrefilledValue($user->getCountry());
		}
		$form->addField($countryField);

		$emailField = new EmailField();
		$emailField->setDistinguisher("email");
		$emailField->setLabel("Email");
		$emailField->setRequired(false);
		$emailField->setAutocompleteAttribute(AutocompleteValues::EMAIL);
		$emailField->addError(90506, ErrorCodes::ERR_90506);
		$emailField->setMissingErrorCode(90506);
		$emailField->addError(90507, ErrorCodes::ERR_90507);
		$emailField->setInvalidErrorCode(90507);
		$emailField->addError(90508, ErrorCodes::ERR_90508);
		if (!is_null($user) && !is_null($user->getEmail())) {
			$emailField->setPrefilledValue($user->getEmail());
		}
		$form->addField($emailField);

		$newPasswordField = new PasswordField();
		$newPasswordField->setDistinguisher("new-password");
		$newPasswordField->setLabel("New Password");
		$newPasswordField->setHelperText('Only use this field if you wish to change your password.');
		$newPasswordField->setRequired(false);
		$newPasswordField->setMinLength(8);
		$newPasswordField->setAutocompleteAttribute(AutocompleteValues::NEW_PASSWORD);
		$newPasswordField->addError(90509, ErrorCodes::ERR_90509);
		$newPasswordField->setMissingErrorCode(90509);
		$newPasswordField->addError(90510, ErrorCodes::ERR_90510);
		$newPasswordField->setInvalidErrorCode(90510);
		$form->addField($newPasswordField);

		$confirmNewPasswordField = new ConfirmPasswordField();
		$confirmNewPasswordField->setDistinguisher("confirm-new-password");
		$confirmNewPasswordField->setLabel("Confirm New Password");
		$confirmNewPasswordField->setRequired(false);
		$confirmNewPasswordField->setMinLength(8);
		$confirmNewPasswordField->setAutocompleteAttribute(AutocompleteValues::NEW_PASSWORD);
		$confirmNewPasswordField->addError(90511, ErrorCodes::ERR_90511);
		$confirmNewPasswordField->setMissingErrorCode(90511);
		$confirmNewPasswordField->addError(90512, ErrorCodes::ERR_90512);
		$confirmNewPasswordField->setInvalidErrorCode(90512);
		$confirmNewPasswordField->setLinkedField($newPasswordField);
		$form->addField($confirmNewPasswordField);

		$twoFactorField = new CheckboxField();
		$twoFactorField->setDistinguisher("two-factor");
		$twoFactorField->setLabel("Enable two-factor authentication (Google Authenticator or similar required)");
		$twoFactorField->setRequired(false);
		$twoFactorField->addError(90513, ErrorCodes::ERR_90513);
		$twoFactorField->setMissingErrorCode(90513);
		$twoFactorField->addError(90513, ErrorCodes::ERR_90513);
		$twoFactorField->setInvalidErrorCode(90513);
		if (!is_null($user)) {
			$twoFactorField->setPrefilledValue($user->isTotpEnabled());
		}
		$form->addField($twoFactorField);

		$profilePictureField = new ImageField();
		$profilePictureField->setDistinguisher("profile-picture");
		$profilePictureField->setLabel("Profile Picture");
		$profilePictureField->setRequired(false);
		$profilePictureField->setMaxHumanSize('10MB');
		$profilePictureField->setAutocompleteAttribute(AutocompleteValues::PHOTO);
		// these lost some clarity as what means what due to ImageField
		$profilePictureField->addError(90518, ErrorCodes::ERR_90518);
		$profilePictureField->setMissingErrorCode(90518);
		$profilePictureField->addError(90517, ErrorCodes::ERR_90517);
		$profilePictureField->setInvalidErrorCode(90517);
		$profilePictureField->addError(90516, ErrorCodes::ERR_90516);
		$profilePictureField->setTooLargeErrorCode(90516);
		$form->addField($profilePictureField);

		$passwordField = new PasswordField();
		$passwordField->setDistinguisher("password");
		$passwordField->setLabel("Old Password");
		$passwordField->setRequired(true);
		$passwordField->setMinLength(8);
		$passwordField->setAutocompleteAttribute(AutocompleteValues::CURRENT_PASSWORD);
		$passwordField->addError(90521, ErrorCodes::ERR_90521);
		$passwordField->setMissingErrorCode(90521);
		$passwordField->addError(90522, ErrorCodes::ERR_90522);
		$passwordField->setInvalidErrorCode(90522);
		$form->addField($passwordField);

		return $form;
	}
}
