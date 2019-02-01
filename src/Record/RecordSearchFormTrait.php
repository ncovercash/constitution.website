<?php

namespace WeTheFuture\Record;

use \WeTheFuture\API\ErrorCodes;
use \WeTheFuture\Form\CompletionAction\DynamicRedirectCompletionAction;
use \WeTheFuture\Form\Field\{AutocompleteValues, SelectField, CaptchaField, CheckboxField, ColorField, ConfirmPasswordField, EmailField, ImageField, PasswordField, StaticHTMLField, NumberField, TextField, WrappedField};
use \WeTheFuture\Form\Form;
use \WeTheFuture\Quiz\Quiz;

/**
 * all this really does is package
 */
trait RecordSearchFormTrait {
	/**
	 * @return Form 
	 */
	public static function getRecordSearchForm() : Form {
		$form = new Form();

		$form->setDistinguisher(self::getDistinguisherFromFunctionName(__FUNCTION__)); // get-dash-case from camelCase
		$form->setMethod(Form::POST);
		$form->setEndpoint("internal/search/");
		$form->setButtonText("SEARCH");
		$form->setPrimary(true);

		$completionAction = new DynamicRedirectCompletionAction();
		$form->setCompletionAction($completionAction);

		$usernameField = new TextField();
		$usernameField->setDistinguisher("username");
		$usernameField->setLabel("Username");
		$usernameField->setRequired(false);
		$usernameField->setHelperText("Exact match only");
		$usernameField->setAutocompleteAttribute(AutocompleteValues::USERNAME);
		$usernameField->addError(99999, ErrorCodes::ERR_99999);
		$usernameField->setMissingErrorCode(99999);
		$usernameField->addError(99999, ErrorCodes::ERR_99999);
		$usernameField->setInvalidErrorCode(99999);
		$form->addField(new WrappedField($usernameField, "col s12 m6"));

		$schoolField = new TextField();
		$schoolField->setDistinguisher("school");
		$schoolField->setLabel("School");
		$schoolField->setRequired(false);
		$schoolField->setAutocompleteAttribute(AutocompleteValues::ON);
		$schoolField->addError(99999, ErrorCodes::ERR_99999);
		$schoolField->setMissingErrorCode(99999);
		$schoolField->addError(99999, ErrorCodes::ERR_99999);
		$schoolField->setInvalidErrorCode(99999);
		$form->addField(new WrappedField($schoolField, "col s12 m6"));

		$cityField = new TextField();
		$cityField->setDistinguisher("city");
		$cityField->setLabel("City");
		$cityField->setRequired(false);
		$cityField->setAutocompleteAttribute(AutocompleteValues::ON);
		$cityField->addError(99999, ErrorCodes::ERR_99999);
		$cityField->setMissingErrorCode(99999);
		$cityField->addError(99999, ErrorCodes::ERR_99999);
		$cityField->setInvalidErrorCode(99999);
		$form->addField(new WrappedField($cityField, "col s12 m6"));

		$stateProvinceField = new SelectField();
		$stateProvinceField->setDistinguisher("state-provinces");
		$stateProvinceField->setLabel("State/Province");
		$stateProvinceField->setRequired(false);
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
		$stateProvinceField->addError(99999, ErrorCodes::ERR_99999);
		$stateProvinceField->setMissingErrorCode(99999);
		$stateProvinceField->addError(99999, ErrorCodes::ERR_99999);
		$stateProvinceField->setInvalidErrorCode(99999);
		$form->addField(new WrappedField($stateProvinceField, "col s12 m3"));

		$countryField = new SelectField();
		$countryField->setDistinguisher("country");
		$countryField->setLabel("Country");
		$countryField->setRequired(false);
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
		$countryField->addError(99999, ErrorCodes::ERR_99999);
		$countryField->setMissingErrorCode(99999);
		$countryField->addError(99999, ErrorCodes::ERR_99999);
		$countryField->setInvalidErrorCode(99999);
		$form->addField(new WrappedField($countryField, "col s12 m3"));

		$s = new StaticHTMLField();
		$s->setHtml('</div><div class="row">');
		$form->addField($s);

		$minGradeField = new NumberField();
		$minGradeField->setDistinguisher("min-grade");
		$minGradeField->setLabel("Min Grade (%)");
		$minGradeField->setRequired(false);
		$minGradeField->addError(99999, ErrorCodes::ERR_99999);
		$minGradeField->setMissingErrorCode(99999);
		$minGradeField->addError(99999, ErrorCodes::ERR_99999);
		$minGradeField->setInvalidErrorCode(99999);
		$form->addField(new WrappedField($minGradeField, "col s12 m6 l3"));

		$maxGradeField = new NumberField();
		$maxGradeField->setDistinguisher("max-grade");
		$maxGradeField->setLabel("Max Grade (%)");
		$maxGradeField->setRequired(false);
		$maxGradeField->addError(99999, ErrorCodes::ERR_99999);
		$maxGradeField->setMissingErrorCode(99999);
		$maxGradeField->addError(99999, ErrorCodes::ERR_99999);
		$maxGradeField->setInvalidErrorCode(99999);
		$form->addField(new WrappedField($maxGradeField, "col s12 m6 l3"));

		$minTimeField = new NumberField();
		$minTimeField->setDistinguisher("min-time");
		$minTimeField->setLabel("Min Grade (s)");
		$minTimeField->setRequired(false);
		$minTimeField->addError(99999, ErrorCodes::ERR_99999);
		$minTimeField->setMissingErrorCode(99999);
		$minTimeField->addError(99999, ErrorCodes::ERR_99999);
		$minTimeField->setInvalidErrorCode(99999);
		$form->addField(new WrappedField($minTimeField, "col s12 m6 l3"));

		$maxTimeField = new NumberField();
		$maxTimeField->setDistinguisher("max-time");
		$maxTimeField->setLabel("Max Time (s)");
		$maxTimeField->setRequired(false);
		$maxTimeField->addError(99999, ErrorCodes::ERR_99999);
		$maxTimeField->setMissingErrorCode(99999);
		$maxTimeField->addError(99999, ErrorCodes::ERR_99999);
		$maxTimeField->setInvalidErrorCode(99999);
		$form->addField(new WrappedField($maxTimeField, "col s12 m6 l3"));

		$s = new StaticHTMLField();
		$s->setHtml('</div><div class="row">');
		$form->addField($s);

		$quizField = new SelectField();
		$quizField->setDistinguisher("quiz");
		$quizField->setLabel("Quiz");
		$quizField->setRequired(false);
		$options = [];
		foreach (Quiz::getAll() as $quiz) {
			$options[] = [$quiz->getId()."", $quiz->getName()];
		}
		$quizField->setOptions($options);
		$quizField->addError(99999, ErrorCodes::ERR_99999);
		$quizField->setMissingErrorCode(99999);
		$quizField->addError(99999, ErrorCodes::ERR_99999);
		$quizField->setInvalidErrorCode(99999);
		$form->addField(new WrappedField($quizField, "col s12"));

		return $form;
	}
}
