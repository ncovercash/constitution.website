<?php

namespace WeTheFuture\Form\Field;

use \WeTheFuture\Form\Form;

/**
 * Represents a radio field
 */
class RadioField extends AbstractField {
	use LabelTrait, SupportsAutocompleteAttributeTrait, SupportsPrefilledValueTrait;
	/**
	 * Options, [value, label]
	 * 
	 * @var string[][]
	 */
	protected $options = [];

	/**
	 * Get the current options
	 * 
	 * @return string[][] Current option array
	 */
	public function getOptions() : array {
		return $this->options;
	}

	/**
	 * Set the current option set
	 * 
	 * @param string[][] $options New options
	 */
	public function setOptions(array $options) : void {
		$this->options = $options;
	}

	/**
	 * Return the field's HTML input
	 * 
	 * @return string The HTML to display
	 */
	public function getHtml() : string {
		$str = '';

		$str .= $this->getLabelHtml();

		foreach ($this->getOptions() as list($val, $text)) {
			$str .= '<p>';

			$id = uniqid();

			$str .= '<label for='.$id.'>';

			$str .= '<input id="'.$id.'" name="'.$this->getDistinguisher().'" type="radio"';

			if ($this->isRequired()) {
				$str .= ' required="required"';
			}
			if ($this->isFieldPrefilled()) {
				if ($this->getPrefilledValue() == $val) {
					$str .= ' selected="selected"';
				}
			}
			$str .= ' value="'.htmlspecialchars($val).'"';
			$str .= ' class="with-gap"';
			$str .= '>';
			$str .= '<span>';
			$str .= htmlspecialchars($text);
			$str .= '</span>';
			$str .= '</label>';
			$str .= '</p>';
		}
		
		return $str;
	}

	/**
	 * Full JS validation code, including if statement and all
	 * 
	 * @return string The JS to validate the field
	 */
	public function getJsValidator() : string {
		$str = '';

		if ($this->isRequired()) {
			$str .= 'if (';
			$str .= '$('.json_encode("input[name=\"".str_replace(["[", "]"], ["\\[", "\\]"], $this->getDistinguisher())."\"]:checked").').length === 0';
			$str .= ') {';
			$str .= 'window.log('.json_encode(basename(__CLASS__)).', '.json_encode($this->getId()." - field is required, but empty").', true);';
			$str .= 'markInputInvalid('.json_encode('#'.$this->getId()).', '.json_encode($this->getErrorMessage($this->getMissingErrorCode())).');';
			$str .= Form::CANCEL_SUBMISSION_JS;
			$str .= '}';
		}

		return $str;
	}

	/**
	 * Return JS code to store the field's value in $formDataName
	 * 
	 * @param string $formDataName The name of the FormData variable
	 * @return string Code to use to store field in $formDataName
	 */
	public function getJsAggregator(string $formDataName) : string {
		return $formDataName.'.append('.json_encode($this->getDistinguisher()).', $('.json_encode("input[name=\"".str_replace(["[", "]"], ["\\[", "\\]"], $this->getDistinguisher())."\"]:checked").').val());';
	}

	/**
	 * Check the field's forms on the servers side
	 * 
	 * @param array $requestArr Array to find the form data in
	 */
	public function checkServerSide(?array &$requestArr=null) : void {
		if (is_null($requestArr)) {
			if ($this->getForm()->getMethod() == Form::POST) {
				$requestArr = &$_POST;
			} else {
				$requestArr = &$_GET;
			}
		}
		if (!array_key_exists($this->getDistinguisher(), $requestArr)) {
			$this->throwMissingError();
		}
		if ($this->isRequired()) {
			if (empty($requestArr[$this->getDistinguisher()])) {
				$this->throwMissingError();
			}
		} else {
			if (empty($requestArr[$this->getDistinguisher()])) {
				return;
			}
		}
		foreach ($this->getOptions() as list($value, $text)) {
			if ($requestArr[$this->getDistinguisher()] == $value) {
				return;
			}
		}
		$this->throwInvalidError();
	}

	/**
	 * Get the default autocomplete attribute value
	 *
	 * @return string
	 */
	public static function getDefaultAutocompleteAttribute() : string {
		return AutocompleteValues::ON;
	}
}
